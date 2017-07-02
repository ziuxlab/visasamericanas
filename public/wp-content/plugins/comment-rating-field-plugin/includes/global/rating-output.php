<?php
/**
 * Rating Output class
 * 
 * @package Comment_Rating_Field_Plugin
 * @author 	Tim Carr
 * @version 2.1.1
 */
class Comment_Rating_Field_Plugin_Rating_Output {

	/**
     * Holds the class object.
     *
     * @since 	2.1.1
     *
     * @var 	object
     */
    public static $instance;

    /**
     * Holds the base class object.
     *
     * @since 	2.1.1
     *
     * @var 	object
     */
    private $base;

    /**
     * Holds the settings array
     *
     * @since   2.2.1
     *
     * @var     array
     */
    public $settings = array();

	/**
	 * Constructor
	 *
     * @since 	2.1.1
	 */
	public function __construct() {

		// Don't load any actions if we're in the admin interface.
		if ( is_admin() ) {
            return;
        }

		add_action( 'wp_enqueue_scripts', array( $this, 'scripts_css' ), 10 );
    	add_filter( 'the_content', array( $this, 'display_average_rating' ) ); // Displays Average Rating below Content
    	add_action( 'comment_text', array( $this, 'display_comment_rating' ) ); // Displays Rating on Comments 

	}

	/**
	 * Register or enqueue any JS and CSS
	 *
     * @since 	2.1.1
	 */
	public function scripts_css() {

		// Get base instance
		$this->base = CommentRatingFieldPlugin::get_instance();

		// Enqueue JS
		wp_enqueue_script( $this->base->plugin->name . '-rating', $this->base->plugin->url . 'assets/js/jquery.rating.pack.js', array( 'jquery' ), $this->base->plugin->version, true );
    	wp_enqueue_script( $this->base->plugin->name . '-frontend', $this->base->plugin->url . 'assets/js/frontend.js', array( 'jquery' ), $this->base->plugin->version, true );

		// Enqueue CSS
    	wp_enqueue_style( $this->base->plugin->name . '-rating', $this->base->plugin->url . 'assets/css/rating.css', array(), $this->base->plugin->version );

	}

    /**
     * Displays the Average Rating below the Content, if required
     *
     * @since   2.1.1
     *
     * @param   string  $content    Post Content
     * @return  string              Post Content w/ Ratings HTML
     */
	public function display_average_rating( $content ) {

        global $post;

        // Get settings
        if ( empty( $this->settings ) ) {
            $this->settings = Comment_Rating_Field_Plugin_Settings::get_instance()->get_settings();
        }

        // Bail if average isn't enabled
        if ( ! isset( $this->settings['enabled'] ) ) {
            return $content;
        }
        if ( ! isset( $this->settings['enabled']['average'] ) ) {
            return $content;
        }
        if ( $this->settings['enabled']['average'] != 1 ) {
            return $content;
        }

        // Get average rating
        $average_rating = get_post_meta( $post->ID, 'crfp-average-rating', true );

        // Calculate average rating now, if one doesn't exist, and fetch the average rating again
        if ( empty( $average_rating ) ) {
            Comment_Rating_Field_Plugin_Rating_Input::get_instance()->update_post_rating_by_post_id( $post->ID );
            $average_rating = get_post_meta( $post->ID, 'crfp-average-rating', true );
        }

        // If the average is still zero or empty, bail
        if ( empty( $average_rating ) || $average_rating == 0 ) {
            return $content;
        }

        // Build rating HTML
        $rating_html = '<div class="crfp-average-rating">' . $this->settings['averageRatingText'] . '<div class="crfp-rating crfp-rating-' . $average_rating . '"></div></div>';
        
        // Return rating HTML with content
        return $content . $rating_html;   

	}

    /**
     * Appends the rating to the end of the comment text for the given comment ID
     * 
     * @since   2.1.1
     *
     * @param   string  $comment    Comment Text
     * @return  string              Comment Text w/ Ratings HTML
     */
	public function display_comment_rating( $comment ) {

        global $post;

        // Get Comment ID
        $comment_id = get_comment_ID();

        // Check whether the Post can have ratings output
        if ( ! Comment_Rating_Field_Plugin_Rating_Input::get_instance()->post_can_have_rating() ) {
            return $comment;
        }

        // Get rating
        $rating = get_comment_meta( $comment_id, 'crfp-rating', true );
        $rating = ( empty( $rating ) ? 0 : $rating );

        // Build rating HTML
        $rating_html = '<div class="rating"><div class="crfp-rating crfp-rating-' . $rating . '">' . $rating . '</div></div>';
        
        // Return rating HTML with content
        return $comment . $rating_html; 
       
	}

    /**
     * Returns the singleton instance of the class.
     *
     * @since 	2.1.1
     *
     * @return 	object Class.
     */
    public static function get_instance() {

        if ( ! isset( self::$instance ) && ! ( self::$instance instanceof self ) ) {
            self::$instance = new self;
        }

        return self::$instance;

    }

}

// Init
$comment_rating_field_plugin_rating_output = Comment_Rating_Field_Plugin_Rating_Output::get_instance();