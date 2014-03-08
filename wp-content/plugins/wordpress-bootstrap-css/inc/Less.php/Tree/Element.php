<?php

//less.js : lib/less/tree/element.js

class Less_Tree_Element extends Less_Tree{

	public $combinator;
	public $value = '';
	public $index;
	public $currentFileInfo;
	public $type = 'Element';

	public function __construct($combinator, $value, $index = null, $currentFileInfo = null ){
		if( ! ($combinator instanceof Less_Tree_Combinator)) {
			$combinator = new Less_Tree_Combinator($combinator);
		}

		if( !is_null($value) ){
			$this->value = $value;
		}

		$this->combinator = $combinator;
		$this->index = $index;
		$this->currentFileInfo = $currentFileInfo;
	}

	function accept( $visitor ){
		$this->combinator = $visitor->visitObj( $this->combinator );
		if( is_object($this->value) ){ //object or string
			$this->value = $visitor->visitObj( $this->value );
		}
	}

	public function compile($env) {
		return new Less_Tree_Element($this->combinator,
				is_string($this->value) ? $this->value : $this->value->compile($env),
				$this->index,
				$this->currentFileInfo
		);
	}

    /**
     * @see Less_Tree::genCSS
     */
	public function genCSS( $output ){
		$output->add( $this->toCSS(), $this->currentFileInfo, $this->index );
	}

	public function toCSS(){

		$value = $this->value;
		if( !is_string($value) ){
			$value = $value->toCSS();
		}

		if( $value === '' && $this->combinator->value[0] === '&' ){
			return '';
		}
		return $this->combinator->toCSS() . $value;
	}

}
