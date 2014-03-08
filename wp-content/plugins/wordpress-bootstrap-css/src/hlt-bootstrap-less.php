<?php

/**
 * Copyright (c) 2013 iControlWP <support@icontrolwp.com>
 * All rights reserved.
 *
 * "WordPress Twitter Bootstrap CSS" (formerly "WordPress Bootstrap CSS") is
 * distributed under the GNU General Public License, Version 2,
 * June 1991. Copyright (C) 1989, 1991 Free Software Foundation, Inc., 51 Franklin
 * St, Fifth Floor, Boston, MA 02110, USA
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR
 * ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON
 * ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 */

require_once( dirname(__FILE__).'/hlt-bootstrap-less-base.php' );

if ( !class_exists('HLT_BootstrapLess') ):

class HLT_BootstrapLess extends HLT_BootstrapLess_Base {

	public function handleUpgrade( $insCurrentVersion ) {
		if ( version_compare( $insCurrentVersion, '3.0.0-5', '<' ) ) {
			delete_option( $this->m_sOptionsKey ); //force it to regenerate the less options completely with new variables
		}
	}

	/**
	 * @param $insCompileTarget - currently only 'bootstrap'
	 * @return boolean
	 */
	public function compileLess( $insCompileTarget = 'bootstrap' ) {
	
		if ( empty( $this->m_sBsDir ) ) {
			return false;
		}
		$this->includeLessLibrary();

		$sFilePathToLess = $this->m_sLessSourceDir.$insCompileTarget.'.less';
	
		// Write normal CSS
		$oLessCompiler = new Less_Parser();
		$oLessCompiler->parseFile( $sFilePathToLess );
		$sCompiledCss = $oLessCompiler->getCss();
		$sTargetCssFile = $this->m_sCssBaseDir.'bootstrap.less.css';
		file_put_contents( $sTargetCssFile, $sCompiledCss );
		
		// Write compressed CSS - it doesn't work to use the SetOption and recompile
//		$oLessCompiler->SetOption( 'compress', true );
		$aCompileOptions = array( 'compress' => true );
		$oLessCompiler = new Less_Parser( $aCompileOptions );
		$oLessCompiler->parseFile( $sFilePathToLess );
		$sCompiledCss = $oLessCompiler->getCss();

		$sTargetCssFile = $this->m_sCssBaseDir.'bootstrap.less.min.css';
		return file_put_contents( $sTargetCssFile, $sCompiledCss );
	}
	
	protected function includeLessLibrary() {
		require_once ( dirname(__FILE__).'/../inc/Less.php/Autoloader.php' );
		Less_Autoloader::register();
//		$sRoot = dirname(__FILE__).'/../inc/Less.php/';
//		$this->includeLibrary( $sRoot, true );
	}
	
	/**
	 * Given a directory, will include all PHP files found within it, with a recursive option.
	 * @param string $insDir
	 * @param boolean $infRecursive
	 */
	protected function includeLibrary( $insDir, $infRecursive = true ) {
		
		if ( !is_dir( $insDir ) ) {
			return;
		}
	
		$aFiles = scandir( $insDir );
		usort( $aFiles, array( $this, 'sortFiles' ) );
		
		$aDirs = array();
		foreach( $aFiles as $sFile ){
			if( $sFile == '.' || $sFile == '..' ){
				continue;
			}

			$sFullPath = $insDir.'/'.$sFile;
			if( is_dir( $sFullPath ) ){
				$aDirs[] = $sFullPath;
				continue;
			}

			if( strpos( $sFile,'.php' ) !== ( strlen($sFile) - 4) ){
				continue;
			}
			include_once( $sFullPath );
		}

		if ( $infRecursive ) {
			foreach( $aDirs as $sSubDir ){
				$this->includeLibrary( $sSubDir, $infRecursive );
			}
		}
	}
	
	/**
	 * taken from the test lib for the php less compiler
	 * @param unknown_type $a
	 * @param unknown_type $b
	 * @return number
	 */
	public function sortFiles( $a, $b ) {
		return strlen( $a ) - strlen( $b );
	}
}
endif;
