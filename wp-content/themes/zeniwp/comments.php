<!-- comments list -->
<div id="comments-wrap">
	<h3 class="heading"><?php comments_number('Sem comentário', 'Um comentário', '% comentários'); ?></h3>
	<ol class="commentlist">
	    <?php if ( have_comments() ) : ?>       
			<?php wp_list_comments(); ?>
		<?php else: ?>
			<p>Seja o primeiro a comentar!</p>
		<?php endif; ?>
	   
		
	</ol>
</div>
<!-- ENDS comments list -->

<?php 
	
	$commenter 	= wp_get_current_commenter();
	$req 		= get_option('require_name_email');

	comment_form(
		array(
			'fields' => array(
				'author' => '<input type="text" name="author" id="author" value="' . esc_attr( $commenter['comment_author'] ) . '" tabindex="1" />
							<label for="author">Name ' . ( $req ? '<small>*</small>' : '' ) . '</label><br/>',
				'email' => '<input type="text" name="email" id="email" value="' . esc_attr( $commenter['comment_author_email']) . '" tabindex="2" />
							<label for="email">Email ' . ( $req ? '<small>*</small>' : '' ) . '<span>(não será publicado)</span></label><br/>',
				'url'   => '<input type="text" name="url" id="url" value="' . esc_attr( $cammenter['comment_author_url']) . '" tabindex="3" />
							<label for="url">Website</label>'

			)
		)
	); 
?>
<div class="clearfix"></div>
<!-- ENDS Respond -->