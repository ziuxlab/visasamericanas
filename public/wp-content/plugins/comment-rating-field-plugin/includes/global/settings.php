<?php
/**
 * Settings class
 * 
 * @package Comment_Rating_Field_Plugin
 * @author  Tim Carr
 * @version 2.1.1
 */
class Comment_Rating_Field_Plugin_Settings {

    /**
     * Holds the class object.
     *
     * @since   2.1.1
     *
     * @var     object
     */
    public static $instance;

     /**
     * Holds the base class object.
     *
     * @since   2.1.3
     *
     * @var     object
     */
    private $base;

    /**
     * Returns the default settings
     *
     * @since   2.1.1
     *
     * @return  array   Default Settings
     */
    private function get_default_settings() {

        // Get base instance
        $this->base = CommentRatingFieldPlugin::get_instance();

        // Define defaults
        $defaults = array(
            'enabled'   => array(
                'page'      => 0,
                'post'      => 1,
                'average'   => 1,
            ),
            'averageRatingText' => __( 'Average Rating: ', $this->base->plugin->name ),
            'ratingFieldLabel'  => __( 'Rating: ', $this->base->plugin->name ),
        );

        return $defaults;

    }

    /**
     * Returns all settings
     *
     * @since       2.1.1
     *
     * @return      array              Settings
     */
    public function get_settings() {

        // Get settings
        $settings = get_option( 'comment-rating-field-plugin' );

        // Get default settings
        $defaults = $this->get_default_settings();

        // If no settings exists, fallback to the defaults
        if ( ! $settings ) {
            $settings = $defaults;
        }

        // Return
        return $settings;

    }

    /**
     * Saves all settings
     *
     * @since   2.1.1
     *
     * @param   array   $settings   Settings
     */
    public function update_settings( $settings ) {

        delete_option( 'comment-rating-field-plugin' );
        update_option( 'comment-rating-field-plugin', $settings );

        // Request that the user review the plugin. Notification displayed later,
        // can be called multiple times and won't re-display the notification if dismissed.
        CommentRatingFieldPlugin::get_instance()->dashboard->request_review();

    }

    /**
     * Returns the singleton instance of the class.
     *
     * @since 1.0.2
     *
     * @return object Class.
     */
    public static function get_instance() {

        if ( ! isset( self::$instance ) && ! ( self::$instance instanceof self ) ) {
            self::$instance = new self;
        }

        return self::$instance;

    }

}