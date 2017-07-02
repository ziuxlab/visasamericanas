<div class="wrap">
    <h2 class="wpzinc">
    	<?php echo $this->base->plugin->displayName; ?> 
    	&raquo;
    	<?php _e( 'Settings', $this->base->plugin->name ); ?>
    </h2>
           
    <?php
    // Notices
    foreach ( $this->notices as $type => $notices_type ) {
        if ( count( $notices_type ) == 0 ) {
            continue;
        }
        ?>
        <div class="<?php echo ( ( $type == 'success' ) ? 'updated' : $type ); ?> notice">
            <?php
            foreach ( $notices_type as $notice ) {
                ?>
                <p><?php echo $notice; ?></p>
                <?php
            }
            ?>
        </div>
        <?php
    }
    ?> 
    
    <div id="poststuff">
    	<div id="post-body" class="metabox-holder columns-2">
    		<!-- Content -->
    		<div id="post-body-content">
    		
    			<!-- Form Start -->
		        <form id="post" name="post" method="post" action="admin.php?page=<?php echo $this->base->plugin->name; ?>">
		            <div id="normal-sortables" class="meta-box-sortables ui-sortable">                        
		                <div class="postbox">
		                    <h3 class="hndle"><?php _e( 'Display Settings', $this->base->plugin->name ); ?></h3>
		                    
		                    <div class="option">
		                    	<label for="enable_pages">
			                    	<div class="left">
			                    		<strong><?php _e( 'Enable on Pages', $this->base->plugin->name ); ?></strong>
			                    	</div>
			                    	<div class="right">
			                    	    <input type="checkbox" id="enable_pages" name="<?php echo $this->base->plugin->name; ?>[enabled][page]" value="1"<?php echo ( ( isset( $settings['enabled']['page'] ) && $settings['enabled']['page'] ) ? ' checked' : '' ); ?> />   
			                    	</div>
		                    	</label>
		                    </div>
		                    
		                    <div class="option">
		                    	<div class="left">
		                    		<strong><?php _e( 'Enable on Posts', $this->base->plugin->name ); ?></strong>
		                    	</div>
		                    	<div class="right">
		                    	    <input type="checkbox" name="<?php echo $this->base->plugin->name; ?>[enabled][post]" value="1"<?php echo ( ( isset( $settings['enabled']['post'] ) && $settings['enabled']['post'] ) ? ' checked' : '' ); ?> />   
		                    	</div>
		                    </div>
		                    
		                    <div class="option">
		                    	<div class="left">
		                    		<strong><?php _e( 'Enable on Categories', $this->base->plugin->name ); ?></strong>
		                    	</div>
		                    	<div class="right">
		                    		<?php    
                                    $categories = get_categories( 'hide_empty=0&taxonomy=category' );
                                    foreach ( $categories as $key => $category ) {
                                    	// Skip Uncategorized
                                        if ( $category->slug == 'uncategorized' ) {
                                        	continue; 
                                        }
                                        ?>
                                        <label for="cat-<?php echo $category->slug; ?>">
			                    			<input type="checkbox" name="<?php echo $this->base->plugin->name; ?>[taxonomies][category][<?php echo $category->term_id; ?>]" id="cat-<?php echo $category->slug; ?>" value="1"<?php echo ( isset( $settings['taxonomies']['category'][ $category->term_id ] ) ? ' checked' : '' ); ?> />      
                                        	<?php echo $category->name; ?>
			                    		</label>
		                    		    <?php
                                    }
                                    ?>
		                    	
			                    	<p class="description">
			                    		<?php _e( 'Displays ratings and the rating field on Posts with comments enabled that are assigned to the selected categories.', $this->base->plugin->name ); ?>
	                                </p>
                                </div>
		                    </div>
		                    
		                    <div class="option">
		                    	<div class="left">
		                    		<strong><?php _e( 'Display Average', $this->base->plugin->name ); ?></strong>
		                    	</div>
		                    	<div class="right">
		                    	    <input type="checkbox" name="<?php echo $this->base->plugin->name; ?>[enabled][average]" value="1"<?php echo ( ( isset( $settings['enabled']['average'] ) && $settings['enabled']['average'] ) ? ' checked' : '' ); ?> />   
		                    	
	                                <p class="description">
	                                	<?php _e('Displays the average rating based on the average of all ratings for the given Page or Post.'); ?>
	                                </p>
	                            </div>
                            </div>
                            
                            <div class="option">
		                    	<div class="left">
		                    		<strong><?php _e( 'Average Rating Text', $this->base->plugin->name ); ?></strong>
		                    	</div>
		                    	<div class="right">
		                    		<input type="text" name="<?php echo $this->base->plugin->name; ?>[averageRatingText]" value="<?php echo ( isset( $settings['averageRatingText'] ) ? $settings['averageRatingText'] : '' ); ?>" class="widefat" />
		                    	
			                        <p class="description">
			                        	<?php _e('If Display Average Rating above is selected, optionally define text to appear before the average rating stars are displayed.'); ?>
			                        </p>
		                        </div>
                            </div>
                            
                            <div class="option">
		                    	<div class="left">
		                    		<strong><?php _e( 'Rating Field Label', $this->base->plugin->name ); ?></strong>
		                    	</div>
		                    	<div class="right">
		                    		<input type="text" name="<?php echo $this->base->plugin->name; ?>[ratingFieldLabel]" value="<?php echo ( isset( $settings['ratingFieldLabel']) ? $settings['ratingFieldLabel'] : '' ); ?>" class="widefat" />
		                    	
			                        <p class="description">
			                        	<?php _e('The text to display for the rating form field label. If blank, no label is displayed.'); ?>
			                        </p>
		                        </div>
                            </div>
                            
                            <div class="option">
                            	<?php wp_nonce_field( $this->base->plugin->name, $this->base->plugin->name . '_nonce' ); ?>
                            	<input type="submit" name="submit" value="<?php _e( 'Save', $this->base->plugin->name ); ?>" class="button button-primary" /> 
                            </div>
		                </div>
		                <!-- /postbox -->
					</div>
					<!-- /normal-sortables -->
			    </form>
			    <!-- /form end -->
    			
    		</div>
    		<!-- /post-body-content -->
    		
    		<!-- Sidebar -->
    		<div id="postbox-container-1" class="postbox-container">
    			<?php require_once( $this->base->plugin->folder.'/_modules/dashboard/views/sidebar-upgrade.php' ); ?>		
    		</div>
    		<!-- /postbox-container -->
    	</div>
	</div> 
	
	<!-- If this plugin has a pro/premium version, include this + change sidebar-donate = sidebar-upgrade -->
	<div id="poststuff">
    	<div id="post-body" class="metabox-holder columns-1">
    		<div id="post-body-content">
    			<?php require_once( $this->base->plugin->folder.'/_modules/dashboard/views/footer-upgrade.php' ); ?>
    		</div>
    	</div>
    </div>        
</div>