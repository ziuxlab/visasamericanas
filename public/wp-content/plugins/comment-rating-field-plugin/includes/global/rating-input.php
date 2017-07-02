<?php
/**
 * Rating Input class
 * 
 * @package Comment_Rating_Field_Plugin
 * @author 	Tim Carr
 * @version 2.1.1
 */
class Comment_Rating_Field_Plugin_Rating_Input {

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

		if ( is_admin() ) {
            add_action( 'wp_set_comment_status', array( $this, 'update_post_rating_by_comment_id' ) ); // Recalculate average rating on comment approval / hold / spam
            add_action( 'deleted_comment', array( $this, 'update_post_rating_by_comment_id' ) ); // Recalculate average rating on comment delete
        }

        add_action( 'comment_form_logged_in_after', array( $this, 'display_rating_field' ) ); // Logged in
        add_action( 'comment_form_after_fields', array( $this, 'display_rating_field' ) ); // Guest
        add_action( 'comment_post', array( $this, 'save_rating' ) ); // Save Rating Field on Comment Post
        
	}

    /**
     * Displays the rating field on the comments form
     *
     * @since   2.1.1
     */
    public function display_rating_field() {

        // Bail if Post cannot have a rating
        if ( ! $this->post_can_have_rating() ) {
            return;
        }
        ?>
        <!-- CRFP Fields: Start -->
        <p class="crfp-field">
            <?php
            if ( isset( $this->settings['ratingFieldLabel'] ) && ! empty( $this->settings['ratingFieldLabel'] ) ) {
                ?>
                <label for="rating-star"><?php echo $this->settings['ratingFieldLabel']; ?></label>
                <?php   
            }
            ?>
            <input name="rating-star" type="radio" class="star" value="1" />
            <input name="rating-star" type="radio" class="star" value="2" />
            <input name="rating-star" type="radio" class="star" value="3" />
            <input name="rating-star" type="radio" class="star" value="4" />
            <input name="rating-star" type="radio" class="star" value="5" />
            <input type="hidden" name="crfp-rating" value="0" />
        </p>
        <!-- CRFP Fields: End -->
        <?php

    }

    /**
     * Saves the POSTed rating for the given comment ID to the comment meta table,
     * as well as storing the total ratings and average on the post itself.
     *
     * @since   2.1.1
     *
     * @param   int     $comment_id     Comment ID
     */
    public function save_rating( $comment_id ) {

        // Exit if no rating given
        if ( ! isset( $_POST['crfp-rating'] ) ) {
            return;
        }

        // Save rating against comment
        add_comment_meta( $comment_id, 'crfp-rating', $_POST['crfp-rating'], true );

        // Request that the user review the plugin. Notification displayed later,
        // can be called multiple times and won't re-display the notification if dismissed.
        CommentRatingFieldPlugin::get_instance()->dashboard->request_review();
        
        // Get post ID from comment and store total and average ratings against post
        // Run here in case comments are set to always be approved
        $this->update_post_rating_by_comment_id( $comment_id ); 

    }

    /**
     * Checks if a Post can have a rating
     *
     * @since   2.1.1
     *
     * @return  bool    Post can have rating
     */
    public function post_can_have_rating() {

        global $post;

        // Reset to default loop query so we can test if a single Page or Post
        wp_reset_query();

        // Bail if comments aren't open
        if ( $post->comment_status != 'open' ) {
            return false;
        }

        // Bail if not a singular Post
        if ( ! is_singular() ) {
            return false;
        }

        // Get settings
        if ( empty( $this->settings ) ) {
            $this->settings = Comment_Rating_Field_Plugin_Settings::get_instance()->get_settings();
        }

        // Check if Post Type is enabled
        $post_type = get_post_type( $post->ID );
        if ( is_array( $this->settings['enabled'] ) && isset( $this->settings['enabled'][ $post_type ] ) && $this->settings['enabled'][ $post_type ] == 1 ) {
            return true;
        }

        // Check if Taxonomy is enabled
        if ( is_array( $this->settings['taxonomies'] ) ) {
            $taxonomies = get_taxonomies();
            $ignored_taxonomies = array( 'post_tag', 'nav_menu', 'link_category', 'post_format' );

            foreach ( $taxonomies as $key => $taxonomy_prog_name ) {
                // Skip ignored taxonomies
                if ( in_array( $taxonomy_prog_name, $ignored_taxonomies ) ) {
                    continue;
                }

                // Skip this taxonomy if it's not enabled
                if ( ! is_array( $this->settings['taxonomies'][ $taxonomy_prog_name ] ) ) {
                    continue;
                }

                // Get terms and build array of term IDs
                unset( $terms, $term_ids );
                $terms = wp_get_post_terms( $post->ID, $taxonomy_prog_name );
                $term_ids = array();
                foreach ( $terms as $key => $term ) {
                    $term_ids[] = $term->term_id;
                }

                // Skip if no Term IDs exist
                if ( count( $term_ids ) == 0 ) {
                    continue;
                }

                // Check if any of the post term IDs have been selected within the plugin
                foreach ( $this->settings['taxonomies'][ $taxonomy_prog_name ] as $term_id => $int_val ) {
                    if ( in_array( $term_id, $term_ids ) ) {
                        return true;
                    }   
                }
                
            }
        }

        // If here, post cannot have rating
        return false;

    }

    /**
     * Passes on the request to calculate the average rating and total number of ratings
     * for the comment's Post.
     *
     * @since   2.1.1
     *
     * @param   int     $comment_id     Comment ID
     */
    public function update_post_rating_by_comment_id( $comment_id ) {

        // Get comment
        $comment = get_comment( $comment_id );

        // Bail if no comment found
        if ( ! $comment || is_wp_error( $comment ) ) {
            return;
        }

        // Update post rating by Post ID
        $this->update_post_rating_by_post_id( $comment->comment_post_ID );

    }

     /**
     * Calculates the average rating and total number of ratings
     * for the given post ID, storing it in the post meta.
     *
     * @since   2.1.1
     * @param   int     $post_id    Post ID
     */
    public function update_post_rating_by_post_id( $post_id ) {

        // Cast Post ID
        $post_id = absint( $post_id );

        // Get all approved comments and total the number of ratings and rating values for fields
        $comments = get_comments( array(
            'post_id'   => absint( $post_id ),
            'status'    => 'approve',
        ) );
        
        // Calculate
        $total_rating   = 0;
        $total_ratings  = 0;
        $average_rating = 0;

        if ( is_array( $comments ) && count( $comments ) > 0 ) {
            // Iterate through comments
            foreach ( $comments as $comment ) { 
                $rating = get_comment_meta( $comment->comment_ID, 'crfp-rating', true );
                if ( $rating > 0 ) {
                    $total_ratings++;
                    $total_rating += $rating;
                }
            }
            
            // Calculate average rating
            $average_rating = ( ( $total_ratings == 0 || $total_rating == 0 ) ? 0 : round( ( $total_rating / $total_ratings ), 0 ) );
        }

        // Update post meta
        update_post_meta( $post_id, 'crfp-total-ratings', $total_ratings );
        update_post_meta( $post_id, 'crfp-average-rating', $average_rating );

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
$comment_rating_field_plugin_rating_input = Comment_Rating_Field_Plugin_Rating_Input::get_instance();