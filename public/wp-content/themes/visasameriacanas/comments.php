<?php
/**
 * The template for displaying Comments.
 */
?>
		
<div id="comments">
	<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'betheme' ); ?></p>
		</div>
		<?php return;
	endif; ?>
	<?php if ( have_comments() ) : ?>
	<div class="comments-title-show" >
		<h3>Nuestros clientes nos recomiendan, estos son algunos de sus comentarios.</h3>
		<!--<h4 id="comments-title">
			<?php
				/**
				if( get_comments_number() == 1 ){
					echo get_comments_number() .' '. __('Comentario','betheme');
				} else {
					echo get_comments_number() .' '. __('Comentarios','betheme');
				}
				**/
			?>
		</h4> -->

		<ol class="commentlist">
			<?php

				$defaults = array(
				    'walker'            => null,
				    'max_depth'         => '',
				    'style'             => 'ul',
				    'callback'          => custom_comments,
				    'end-callback'      => null,
				    'type'              => 'all',
				    'page'              => '',
				    'per_page'          => '15',
				    'avatar_size'       => 96,
				    'reverse_top_level' => true,
				    'reverse_children'  => '',
				    'format'            => 'xhtml', /* or html5 added in 3.6  */
				    'short_ping'        => false, /* Added in 3.6 */
				);
				wp_list_comments( $defaults ); ?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav">
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Comentarios Anteriores', 'betheme' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Nuevos Comentarios &rarr;', 'betheme' ) ); ?></div>
		</nav>
		<?php endif; ?>
	</div>
	<?php
		elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="nocomments"><?php _e( 'Comments are closed.', 'betheme' ); ?></p>
	<?php endif; ?>
	
	<?php comment_form(); ?>

</div><!-- #comments -->
