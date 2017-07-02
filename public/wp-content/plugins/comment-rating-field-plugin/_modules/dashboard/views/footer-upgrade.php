<?php
if ( isset( $this->base->plugin->upgrade_reasons ) && is_array( $this->base->plugin->upgrade_reasons ) && count( $this->base->plugin->upgrade_reasons ) > 0 ) {
	?>
	<div class="postbox">
	    <h3 class="hndle">
	    	<?php _e( 'Upgrade to Pro', $this->base->plugin->name ); ?>
	    	
	    	<a href="<?php echo $this->base->plugin->upgrade_url; ?>?utm_source=wordpress&utm_medium=link&utm_content=settings&utm_campaign=general" class="button button-primary" target="_blank" style="float:right;"><?php _e( 'Upgrade Now', $this->base->plugin->name ); ?></a>
	    </h3>
		
		<div class="option">
	    	<ul>
		    	<?php
		    	foreach ( $this->base->plugin->upgrade_reasons as $reasons ) {
		    		?>
		    		<li><strong><?php echo $reasons[0]; ?>:</strong> <?php echo $reasons[1]; ?></li>
		    		<?php	
		    	}
		    	?>
		    	<li><strong><?php _e( 'Support', $this->base->plugin->name ); ?>: </strong><?php _e( 'Access to one on one email support', $this->base->plugin->name ); ?></li>
		    	<li><strong><?php _e( 'Documentation', $this->base->plugin->name ); ?>: </strong><?php _e( 'Detailed documentation on how to install and configure the plugin', $this->base->plugin->name ); ?></li>
		    	<li><strong><?php _e( 'Updates', $this->base->plugin->name ); ?>: </strong><?php _e( 'Receive one click update notifications, right within your WordPress Adminstration panel', $this->base->plugin->name ); ?></li>
		    	<li><strong><?php _e( 'Seamless Upgrade', $this->base->plugin->name ); ?>: </strong><?php _e( 'Retain all current settings when upgrading to Pro', $this->base->plugin->name ); ?></li>
		    </ul>
	    </div>
	    
	    <div class="option">
	    	<a href="<?php echo $this->base->plugin->upgrade_url; ?>?utm_source=wordpress&utm_medium=link&utm_content=settings&utm_campaign=general" class="button button-primary" target="_blank"><?php _e( 'Upgrade Now', $this->base->plugin->name ); ?></a>
	    </div>
	</div>
	<?php
}