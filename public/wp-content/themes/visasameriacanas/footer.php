<?php
/**
 * The template for displaying the footer.
 *
 * @package Betheme
 * @author Muffin group
 * @link http://muffingroup.com
 */
?>

<?php do_action( 'mfn_hook_content_after' ); ?>

<!-- #Footer -->		
<footer id="Footer" class="clearfix">
	
	<?php if ( $footer_call_to_action = mfn_opts_get('footer-call-to-action') ): ?>
	<div class="footer_action">
		<div class="container">
			<div class="column one column_column">
				<?php echo do_shortcode( $footer_call_to_action ); ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	
	<?php 
		$sidebars_count = 0;
		for( $i = 1; $i <= 4; $i++ ){
			if ( is_active_sidebar( 'footer-area-'. $i ) ) $sidebars_count++;
		}
		
		if( $sidebars_count > 0 ){
			
			$footer_style = '';
				
			if( mfn_opts_get( 'footer-padding' ) ){
				$footer_style .= 'padding:'. mfn_opts_get( 'footer-padding' ) .';';
			}
			
			echo '<div class="widgets_wrapper" style="'. $footer_style .'">';
				echo '<div class="container">';
						
					if( $footer_layout = mfn_opts_get( 'footer-layout' ) ){
						// Theme Options

						$footer_layout 	= explode( ';', $footer_layout );
						$footer_cols 	= $footer_layout[0];
		
						for( $i = 1; $i <= $footer_cols; $i++ ){
							if ( is_active_sidebar( 'footer-area-'. $i ) ){
								echo '<div class="column '. $footer_layout[$i] .'">';
									dynamic_sidebar( 'footer-area-'. $i );
								echo '</div>';
							}
						}						
						
					} else {
						// Default - Equal Width
						
						$sidebar_class = '';
						switch( $sidebars_count ){
							case 2: $sidebar_class = 'one-second'; break;
							case 3: $sidebar_class = 'one-third'; break;
							case 4: $sidebar_class = 'one-fourth'; break;
							default: $sidebar_class = 'one';
						}
						
						for( $i = 1; $i <= 4; $i++ ){
							if ( is_active_sidebar( 'footer-area-'. $i ) ){
								echo '<div class="column '. $sidebar_class .'">';
									dynamic_sidebar( 'footer-area-'. $i );
								echo '</div>';
							}
						}
						
					}

					echo '<div class="column one">';
						echo '<p style="font-size: 12px; line-height: 17px;" >Aviso legal. La información suministrada en este sitio web es de carácter informativo y está basada en la experiencia y conocimientos del autor. El uso y solicitud del servicio de asesoría es totalmente voluntario ya que los solicitantes de visa pueden realizar el proceso de manera individual. Esta página web no proporciona información legal y no se encuentra vinculada con la Embajada Americana ni con el Gobierno de Estados Unidos. Visas Americanas Colombia no se hace responsable por el contenido publicado o las opiniones de los clientes.</p>';
					echo '</div>';
				
				echo '</div>';
			echo '</div>';
		}
	?>
	
	
	<?php $back_to_top = mfn_opts_get('back-top-top'); ?>
	
	<?php if( mfn_opts_get('footer-hide') == 1 ): ?>
	
		<a id="back_to_top" class="button button_left button_js <?php echo $back_to_top; ?>" href=""><span class="button_icon"><i class="icon-up-open-big"></i></span></a>
	
	<?php else: ?>
	
		<div class="footer_copy">
			<div class="container">
				<div class="column one">

					<a id="back_to_top" class="button button_left button_js <?php echo $back_to_top; ?>" href=""><span class="button_icon"><i class="icon-up-open-big"></i></span></a>
					
					<!-- Copyrights -->
					<div class="copyright">
						<?php 
							if( mfn_opts_get('footer-copy') ){
								echo do_shortcode( mfn_opts_get('footer-copy') );
							} else {
								echo '&copy; '. date( 'Y' ) .' '. get_bloginfo( 'name' ) .'. All Rights Reserved. <a target="_blank" rel="nofollow" href="http://muffingroup.com">Muffin group</a>';
							}
						?>
					</div>
					
					<?php //
						//if( has_nav_menu( 'social-menu-bottom' ) ){
	
							// #social-menu
							//mfn_wp_social_menu_bottom();
	
						//} //else {
							
							//$target = mfn_opts_get('social-target') ? 'target="_blank"' : false;
	
							//echo '<ul class="social">';
								//if( mfn_opts_get('social-skype') ) echo '<li class="skype"><a '.$target.' href="'. mfn_opts_get('social-skype') .'" title="Skype"><i class="icon-skype"></i></a></li>';
								//if( mfn_opts_get('social-facebook') ) echo '<li class="facebook"><a '.$target.' href="'. mfn_opts_get('social-facebook') .'" title="Facebook"><i class="icon-facebook"></i></a></li>';
								//if( mfn_opts_get('social-googleplus') ) echo '<li class="googleplus"><a '.$target.' href="'. mfn_opts_get('social-googleplus') .'" title="Google+"><i class="icon-gplus"></i></a></li>';
								//if( mfn_opts_get('social-twitter') ) echo '<li class="twitter"><a '.$target.' href="'. mfn_opts_get('social-twitter') .'" title="Twitter"><i class="icon-twitter"></i></a></li>';
								//if( mfn_opts_get('social-vimeo') ) echo '<li class="vimeo"><a '.$target.' href="'. mfn_opts_get('social-vimeo') .'" title="Vimeo"><i class="icon-vimeo"></i></a></li>';
								//if( mfn_opts_get('social-youtube') ) echo '<li class="youtube"><a '.$target.' href="'. mfn_opts_get('social-youtube') .'" title="YouTube"><i class="icon-play"></i></a></li>';						
								//if( mfn_opts_get('social-flickr') ) echo '<li class="flickr"><a '.$target.' href="'. mfn_opts_get('social-flickr') .'" title="Flickr"><i class="icon-flickr"></i></a></li>';
								//if( mfn_opts_get('social-linkedin') ) echo '<li class="linkedin"><a '.$target.' href="'. mfn_opts_get('social-linkedin') .'" title="LinkedIn"><i class="icon-linkedin"></i></a></li>';
								//if( mfn_opts_get('social-pinterest') ) echo '<li class="pinterest"><a '.$target.' href="'. mfn_opts_get('social-pinterest') .'" title="Pinterest"><i class="icon-pinterest"></i></a></li>';
								//if( mfn_opts_get('social-dribbble') ) echo '<li class="dribbble"><a '.$target.' href="'. mfn_opts_get('social-dribbble') .'" title="Dribbble"><i class="icon-dribbble"></i></a></li>';
								//if( mfn_opts_get('social-instagram') ) echo '<li class="instagram"><a '.$target.' href="'. mfn_opts_get('social-instagram') .'" title="Instagram"><i class="icon-instagram"></i></a></li>';
								//if( mfn_opts_get('social-behance') ) echo '<li class="behance"><a '.$target.' href="'. mfn_opts_get('social-behance') .'" title="Behance"><i class="icon-behance"></i></a></li>';
								//if( mfn_opts_get('social-tumblr') ) echo '<li class="tumblr"><a '.$target.' href="'. mfn_opts_get('social-tumblr') .'" title="Tumblr"><i class="icon-tumblr"></i></a></li>';
								//if( mfn_opts_get('social-vkontakte') ) echo '<li class="vkontakte"><a '.$target.' href="'. mfn_opts_get('social-vkontakte') .'" title="VKontakte"><i class="icon-vkontakte"></i></a></li>';
								//if( mfn_opts_get('social-viadeo') ) echo '<li class="viadeo"><a '.$target.' href="'. mfn_opts_get('social-viadeo') .'" title="Viadeo"><i class="icon-viadeo"></i></a></li>';
								//if( mfn_opts_get('social-xing') ) echo '<li class="xing"><a '.$target.' href="'. mfn_opts_get('social-xing') .'" title="Xing"><i class="icon-xing"></i></a></li>';
								//if( mfn_opts_get('social-rss') ) echo '<li class="rss"><a '.$target.' href="'. get_bloginfo('rss2_url') .'" title="RSS"><i class="icon-rss"></i></a></li>';
							//echo '</ul>';}
					?>
							
				</div>
			</div>
		</div>
	
	<?php endif; ?>
	
	
</footer>

</div><!-- #Wrapper -->

<?php if( mfn_opts_get('popup-contact-form') ): ?>
	<div id="popup_contact">
		<a class="button button_js" href="#"><i class="<?php mfn_opts_show( 'popup-contact-form-icon', 'icon-mail-line' ); ?>"></i></a>
		<div class="popup_contact_wrapper">
			<?php echo do_shortcode( mfn_opts_get('popup-contact-form') ); ?>
			<span class="arrow"></span>
		</div>
	</div>
<?php endif; ?>

<?php do_action( 'mfn_hook_bottom' ); ?>
	
<!-- wp_footer() -->
<?php wp_footer(); ?>

<!-- Google Code para etiquetas de remarketing -->
<!--------------------------------------------------
Es posible que las etiquetas de remarketing todavía no estén asociadas a la información de identificación personal o que estén en páginas relacionadas con las categorías delicadas. Para obtener más información e instrucciones sobre cómo configurar la etiqueta, consulte http://google.com/ads/remarketingsetup.
--------------------------------------------------->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 951639274;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/951639274/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

</body>
</html>
