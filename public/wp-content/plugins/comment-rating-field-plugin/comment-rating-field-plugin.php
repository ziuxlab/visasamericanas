<?php
/**
* Plugin Name: Comment Rating Field Plugin
* Plugin URI: https://www.wpzinc.com/plugins/comment-rating-field-pro-plugin
* Version: 2.1.3
* Author: WP Zinc
* Author URI: https://www.wpzinc.com
* Description: Adds a 5 star rating field to the comments form in WordPress.
* License: GPL2
*/

/**
 * Comment Rating Field Plugin Class
 * 
 * @package Comment Rating Field Plugin
 * @author  Tim Carr
 * @version 2.1.0
 */
class CommentRatingFieldPlugin {

    /**
     * Holds the class object.
     *
     * @since   2.1.1
     *
     * @var     object
     */
    public static $instance;

    /**
     * Plugin
     *
     * @since   2.1.1
     *
     * @var     object
     */
    public $plugin = '';

    /**
     * Dashboard
     *
     * @since   2.1.1
     *
     * @var     object
     */
    public $dashboard = '';

    /**
     * Constructor.
     *
     * @since   1.0.0
     */
    public function __construct() {

        // Plugin Details
        $this->plugin                   = new stdClass;
        $this->plugin->name             = 'comment-rating-field-plugin';
        $this->plugin->displayName      = 'Comment Rating Field';
        $this->plugin->version          = '2.1.3';
        $this->plugin->buildDate        = '2017-03-03 18:00:00';
        $this->plugin->requires         = 3.6;
        $this->plugin->tested           = '4.7.2';
        $this->plugin->folder           = plugin_dir_path( __FILE__ );
        $this->plugin->url              = plugin_dir_url( __FILE__ );
        $this->plugin->documentation_url= 'https://www.wpzinc.com/documentation/comment-rating-field-pro';
        $this->plugin->support_url      = 'https://www.wpzinc.com/support';
        $this->plugin->upgrade_url      = 'https://www.wpzinc.com/plugins/comment-rating-field-pro';
        $this->plugin->review_name      = 'image-lazy-load';
        $this->plugin->review_notice = sprintf( __( 'Thanks for using %s to collect review ratings from web site visitors!', $this->plugin->name ), $this->plugin->displayName );

        // Upgrade Reasons
        $this->plugin->upgrade_reasons = array(
            array(
                __( 'Choose Maximum Rating Scale', $this->plugin->name), 
                __( 'You\'re not restricted to a 5 star rating scale; choose a maximum between 3 and 10', $this->plugin->name ),
            ),
            array(
                __( 'Unlimited Rating Fields for any Post Type', $this->plugin->name), 
                __( 'Add more than one rating field to your comment forms for Pages, Posts and/or Custom Post Types', $this->plugin->name ),
            ),
            array(
                __( 'Different Rating Fields by Post Type and Taxonomy', $this->plugin->name), 
                __( 'Each rating field group can be targeted to a specific Post Type and/or Taxonomy, allowing different fields for different sections of your web site.', $this->plugin->name ),
            ),
            array(
                __( 'Google Rich Snippet Support', $this->plugin->name), 
                __( 'Choose a schema (e.g. Review, Product, Place, Person) for your Ratings.  Visitors can see the average rating on your Google search results.', $this->plugin->name ),
            ),
            array(
                __( 'Retina Ready, Any Color and Size', $this->plugin->name), 
                __( 'Editable styling options include star/bar foreground and background colors, as well as star size.', $this->plugin->name ),
            ),
            array(
                __( 'Rating Field Placement', $this->plugin->name), 
                __( 'Rating fields on your comment form can display before all fields, before the comment field or after the comment field.', $this->plugin->name ),
            ),
            array(
                __( 'Rating Control', $this->plugin->name), 
                __( 'Disable ratings on replies, limit the number of ratings per User per Post.', $this->plugin->name ),
            ),
            array(
                __( 'Manage Reviews', $this->plugin->name), 
                __( 'View and edit ratings in the WordPress Admin when editing a Comment.', $this->plugin->name ),
            ),
            array(
                __( 'Jetpack, WooCommerce and Simple Comment Editing Support', $this->plugin->name), 
                __( 'Pro is compatible with Jetpack, WooCommerce and SCE.', $this->plugin->name ),
            ),
            array(
                __( 'Rating Output', $this->plugin->name), 
                __( 'Average ratings can be displayed in excerpts, content and/or RSS feeds.  Choose to display average rating, rating breakdown, number of ratings.', $this->plugin->name ),
            ),
            array(
                __( 'Amazon Bar Chart Style', $this->plugin->name), 
                __( 'Ratings can be output in a bar chart breakdown style, similar to Amazon.', $this->plugin->name ),
            ),
            array(
                __( 'Filter Comments', $this->plugin->name), 
                __( 'Users can click an average rating breakdown (e.g. 5 stars), to see all comments with a 5 star review.', $this->plugin->name ),
            ),
            array(
                __( 'Shortcodes', $this->plugin->name), 
                __( 'Use a shortcode to display the rating output anywhere within your content, for any Post ID.', $this->plugin->name ),
            ),
            array(
                __( 'Widgets', $this->plugin->name), 
                __( 'Use a shortcode to display the rating output anywhere within your content, for any Post ID.', $this->plugin->name ),
            ),
            array(
                __( 'Functions', $this->plugin->name), 
                __( 'For developers not using comment_form() and wp_list_comments(), PHP functions are supplied to easily output average ratings, ratings on comments and rating fields within your custom implementation.', $this->plugin->name ),
            ),
        );             	
        
        // Dashboard Submodule
        if ( ! class_exists( 'WPZincDashboardWidget' ) ) {
            require_once( $this->plugin->folder . '_modules/dashboard/dashboard.php' );
        }
        $this->dashboard = new WPZincDashboardWidget( $this->plugin );

        // Admin
        if ( is_admin() ) {
            // Required class
            require_once( $this->plugin->folder . 'includes/admin/admin.php' );
        }

        // Global
        require_once( $this->plugin->folder . 'includes/global/rating-input.php' );
        require_once( $this->plugin->folder . 'includes/global/rating-output.php' );
        require_once( $this->plugin->folder . 'includes/global/settings.php' );

    }

    /**
     * Returns the singleton instance of the class.
     *
     * @since   2.1.1
     *
     * @return  object Class.
     */
    public static function get_instance() {

        if ( ! isset( self::$instance ) && ! ( self::$instance instanceof self ) ) {
            self::$instance = new self;
        }

        return self::$instance;

    }
}

// Initialise class
$comment_rating_field_plugin = CommentRatingFieldPlugin::get_instance();