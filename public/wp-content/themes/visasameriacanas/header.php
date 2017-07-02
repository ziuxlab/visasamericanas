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
<html class="no-js" <?php language_attributes(); ?> <?php mfn_tag_schema(); ?>>
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


<link rel="apple-touch-icon" sizes="57x57" href="/~visasame/wp-content/themes/visasameriacanas/images/favs/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/~visasame/wp-content/themes/visasameriacanas/images/favs/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/~visasame/wp-content/themes/visasameriacanas/images/favs/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/~visasame/wp-content/themes/visasameriacanas/images/favs/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/~visasame/wp-content/themes/visasameriacanas/images/favs/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/~visasame/wp-content/themes/visasameriacanas/images/favs/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/~visasame/wp-content/themes/visasameriacanas/images/favs/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/~visasame/wp-content/themes/visasameriacanas/images/favs/apple-touch-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/~visasame/wp-content/themes/visasameriacanas/images/favs/apple-touch-icon-180x180.png">
<link rel="icon" type="image/png" href="/~visasame/wp-content/themes/visasameriacanas/images/favs/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="/~visasame/wp-content/themes/visasameriacanas/images/favs/android-chrome-192x192.png" sizes="192x192">
<link rel="icon" type="image/png" href="/~visasame/wp-content/themes/visasameriacanas/images/favs/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="/~visasame/wp-content/themes/visasameriacanas/images/favs/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="/~visasame/wp-content/themes/visasameriacanas/images/favs/manifest.json">
<link rel="mask-icon" href="/~visasame/wp-content/themes/visasameriacanas/images/favs/safari-pinned-tab.svg" color="#5bbad5">
<link rel="shortcut icon" href="/~visasame/wp-content/themes/visasameriacanas/images/favs/favicon.ico">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-TileImage" content="/~visasame/wp-content/themes/visasameriacanas/images/favs/mstile-144x144.png">
<meta name="msapplication-config" content="/~visasame/wp-content/themes/visasameriacanas/images/favs/browserconfig.xml">
<meta name="theme-color" content="#ffffff">

<!-- <link rel="shortcut icon" href="<?php // mfn_opts_show( 'favicon-img', THEME_URI .'/images/favicon.ico' ); ?>" />	
<?php // if( mfn_opts_get('apple-touch-icon') ): ?>
<link rel="apple-touch-icon" href="<?php // mfn_opts_show( 'apple-touch-icon' ); ?>" />
<?php // endif; ?>	 -->

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
			// Header Featured Image ----------
			$header_style = '';
			
			// Image -----
			if( mfn_ID() && ! is_search() ){
				if( ( ( mfn_ID() == get_option( 'page_for_posts' ) ) || ( get_post_type() == 'page' ) ) && has_post_thumbnail( mfn_ID() ) ){
					
					// Pages & Blog Page ---
					$subheader_image = wp_get_attachment_image_src( get_post_thumbnail_id( mfn_ID() ), 'full' );
					$header_style .= ' style="background-image:url('. $subheader_image[0] .');"';

				} elseif( get_post_meta( mfn_ID(), 'mfn-post-header-bg', true ) ){

					// Single Post ---
					$header_style .= ' style="background-image:url('. get_post_meta( mfn_ID(), 'mfn-post-header-bg', true ) .');"';

				}
			}
			
			// Attachment -----
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
		
		<?php if( mfn_header_style( true ) == 'header-below' ) echo mfn_slider(); ?>
	
		<!-- #Header_bg -->
		<div id="Header_wrapper" <?php echo $header_style; ?>>
	
			<!-- #Header -->
			<header id="Header">
				<?php if( mfn_header_style( true ) != 'header-creative' ) get_template_part( 'includes/header', 'top-area' ); ?>	
				<?php if( mfn_header_style( true ) != 'header-below' ) echo mfn_slider(); ?>
			</header>
				
			<?php 
				if( ( mfn_opts_get('subheader') != 'all' ) && ! get_post_meta( mfn_ID(), 'mfn-post-hide-title', true ) ){
					
					
					$subheader_advanced = mfn_opts_get( 'subheader-advanced' );
					
					$subheader_style = '';
					
					if( mfn_opts_get( 'subheader-padding' ) ){
						$subheader_style .= 'padding:'. mfn_opts_get( 'subheader-padding' ) .';';
					}				
					
					
					if( is_search() ){
						// Page title -------------------------
						
						echo '<div id="Subheader" style="'. $subheader_style .'">';
							echo '<div class="container">';
								echo '<div class="column one">';
								
									global $wp_query;
									$total_results = $wp_query->found_posts;
									
									$translate['search-results'] = mfn_opts_get('translate') ? mfn_opts_get('translate-search-results','results found for:') : __('results found for:','betheme');								
									echo '<h1 class="title">'. $total_results .' '. $translate['search-results'] .' '. esc_html( $_GET['s'] ) .'</h1>';
									
								echo '</div>';
							echo '</div>';
						echo '</div>';
						
						
					} elseif( ! mfn_slider() || ( is_array( $subheader_advanced ) && isset( $subheader_advanced['slider-show'] ) ) ){
						// Page title -------------------------
						
						
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
						
						
						if( is_array( $subheader_advanced ) && isset( $subheader_advanced['breadcrumbs-link'] ) ){
							$breadcrumbs_link = 'has-link';
						} else {
							$breadcrumbs_link = 'no-link';
						}
						
						
						// Subheader | Print
						if( $subheader_show ){
							echo '<div id="Subheader" style="'. $subheader_style .'">';
								echo '<div class="container">';
									echo '<div class="column one">';
										
										// Title
										echo '<h1 class="title"><b>'. mfn_page_title() .'</b></h1>';
										
										// Breadcrumbs
										if( $breadcrumbs_show ) mfn_breadcrumbs( $breadcrumbs_link );
										
									echo '</div>';
								echo '</div>';
							echo '</div>';
						}
						
					}
					
					
				}
			?>
		
		</div>
		
		<?php do_action( 'mfn_hook_content_before' ); ?>
