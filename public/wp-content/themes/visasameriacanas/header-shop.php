<?php
/**
 * The Header for our theme.
 *
 * @package Betheme
 * @author Muffin group
 * @link http://muffingroup.com
 */
?><!DOCTYPE html>
<?php 
	if( $_GET && key_exists('mfn-rtl', $_GET) ):
		echo '<html class="no-js" lang="ar" dir="rtl">';
	else:
?>
<html class="no-js" <?php language_attributes(); ?>>
<?php endif; ?>

<!-- head -->
<head>

<!-- meta -->
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<?php if( mfn_opts_get('responsive') ) echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">'; ?>

<title itemprop="name"><?php
if( mfn_title() ){
	echo mfn_title();
} else {
	global $page, $paged;
	wp_title( '|', true, 'right' );
	bloginfo( 'name' );
	if ( $paged >= 2 || $page >= 2 ) echo ' | ' . sprintf( __( 'Page %s', 'betheme' ), max( $paged, $page ) );
}
?></title>

<?php do_action('wp_seo'); ?>

<link rel="apple-touch-icon" sizes="57x57" href="wp-content/themes/visasameriacanas/images/favs/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="wp-content/themes/visasameriacanas/images/favs/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="wp-content/themes/visasameriacanas/images/favs/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="wp-content/themes/visasameriacanas/images/favs/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="wp-content/themes/visasameriacanas/images/favs/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="wp-content/themes/visasameriacanas/images/favs/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="wp-content/themes/visasameriacanas/images/favs/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="wp-content/themes/visasameriacanas/images/favs/apple-touch-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="wp-content/themes/visasameriacanas/images/favs/apple-touch-icon-180x180.png">
<link rel="icon" type="image/png" href="wp-content/themes/visasameriacanas/images/favs/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="wp-content/themes/visasameriacanas/images/favs/android-chrome-192x192.png" sizes="192x192">
<link rel="icon" type="image/png" href="wp-content/themes/visasameriacanas/images/favs/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="wp-content/themes/visasameriacanas/images/favs/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="wp-content/themes/visasameriacanas/images/favs/manifest.json">
<link rel="mask-icon" href="wp-content/themes/visasameriacanas/images/favs/safari-pinned-tab.svg" color="#5bbad5">
<link rel="shortcut icon" href="wp-content/themes/visasameriacanas/images/favs/favicon.ico">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-TileImage" content="wp-content/themes/visasameriacanas/images/favs/mstile-144x144.png">
<meta name="msapplication-config" content="wp-content/themes/visasameriacanas/images/favs/browserconfig.xml">
<meta name="theme-color" content="#ffffff">

<!--
<link rel="shortcut icon" href="<?php // mfn_opts_show( 'favicon-img', THEME_URI .'/images/favicon.ico' ); ?>" />	
<?php // if( mfn_opts_get('apple-touch-icon') ): ?>
<link rel="apple-touch-icon" href="<?php // mfn_opts_show( 'apple-touch-icon' ); ?>" />
<?php // endif; ?>
-->

<!-- wp_head() -->
<?php wp_head(); ?>
</head>

<!-- body -->
<body <?php body_class(); ?>>

	<?php do_action( 'mfn_hook_top' ); ?>
	
	<?php get_template_part( 'includes/header', 'sliding-area' ); ?>
	
	<?php if( mfn_header_style( true ) == 'header-creative' ) get_template_part( 'includes/header', 'creative' ); ?>
	
	<!-- #Wrapper -->
	<div id="Wrapper">
	
		<?php 
			// Header Featured Image -----------
			$header_style = '';
			
			// Image
			if( $shop_id = woocommerce_get_page_id( 'shop' ) ){
				if( has_post_thumbnail( $shop_id ) ){
					$subheader_image = wp_get_attachment_image_src( get_post_thumbnail_id( $shop_id ), 'full' );
					$header_style .= 'style="background-image:url('. $subheader_image[0] .');"';
				}
			}
			
			// Attachment
			if( mfn_opts_get('img-subheader-attachment') == 'fixed' ){
				$header_style .= ' class="bg-fixed"';
			} elseif( mfn_opts_get('img-subheader-attachment') == 'parallax' ){
				
				if( mfn_opts_get( 'parallax' ) == 'stellar' ){
					$header_style .= ' class="bg-parallax" data-stellar-background-ratio="0.5"';
				} else {
					$header_style .= ' class="bg-parallax" data-enllax-ratio="0.3"';
				}
		
			}
		?>
		
		<?php 
			if( mfn_header_style( true ) == 'header-below' ){
				if( is_shop() || ( mfn_opts_get('shop-slider') == 'all' ) ){
					echo mfn_slider( $shop_id );
				}
			}
		?>
		
		<!-- #Header_bg -->
		<div id="Header_wrapper" <?php echo $header_style; ?>>
	
			<!-- #Header -->
			<header id="Header">
				<?php if( mfn_header_style( true ) != 'header-creative' ) get_template_part( 'includes/header', 'top-area' ); ?>	
				<?php 
					if( mfn_header_style( true ) != 'header-below' ){
						if( is_shop() || ( mfn_opts_get('shop-slider') == 'all' ) ){
							echo mfn_slider( $shop_id );
						}
					}
				?>
			</header>
			
			<?php 
				add_filter( 'woocommerce_show_page_title', create_function( false, 'return false;' ) );
				
				
				$subheader_advanced = mfn_opts_get( 'subheader-advanced' );
				
				$subheader_style = '';
					
				if( mfn_opts_get( 'subheader-padding' ) ){
					$subheader_style .= 'padding:'. mfn_opts_get( 'subheader-padding' ) .';';
				}
				
					
				if( is_product() || ! mfn_slider( $shop_id ) || ( is_array( $subheader_advanced ) && isset( $subheader_advanced['slider-show'] ) ) ){
					
					// Subheader | Options
					$subheader_options = mfn_opts_get( 'subheader' );

					if( is_array( $subheader_options ) && isset( $subheader_options['hide-subheader'] ) ){
						$subheader_show = false;
					} elseif( get_post_meta( mfn_ID(), 'mfn-post-hide-title', true ) ){
						$subheader_show = false;
					} else {
						$subheader_show = true;
					}
					
					if( is_array( $subheader_options ) && isset( $subheader_options['hide-breadcrumbs'] ) ){
						$breadcrumbs_show = false;
					} else {
						$breadcrumbs_show = true;
					}

					// Subheader | Print
					if( $subheader_show ){
						echo '<div id="Subheader" style="'. $subheader_style .'">';
							echo '<div class="container">';
								echo '<div class="column one">';
								
								
									// Title
									if( is_product() ){
										
										echo '<h2 class="title">';
										
										if( mfn_opts_get('shop-product-title') ){
											the_title();											
										} else {
											woocommerce_page_title();
										}
										
										echo '</h2>';
										
									} else {
										
										echo '<h1 class="title">';
											woocommerce_page_title();
										echo '</h1>';
										
									}	
				

									// Breadcrumbs
									if( $breadcrumbs_show ){
										$home = mfn_opts_get('translate') ? mfn_opts_get('translate-home','Home') : __('Home','betheme');
										$woo_crumbs_args = apply_filters( 'woocommerce_breadcrumb_defaults', array(
											'delimiter'   => false,
											'wrap_before' => '<ul class="breadcrumbs woocommerce-breadcrumb">',
											'wrap_after'  => '</ul>',
											'before'      => '<li>',
											'after'       => '<span><i class="icon-right-open"></i></span></li>',
											'home'        => $home,
										) );
										woocommerce_breadcrumb( $woo_crumbs_args );
									}
			
								echo '</div>';
							echo '</div>';
						echo '</div>';
					}
					
				}
			?>
			
		</div>
		
		<?php do_action( 'mfn_hook_content_before' ); ?>
