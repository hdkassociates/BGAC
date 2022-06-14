<?php

class bd_sidebar_button extends WP_Widget
{
  function bd_sidebar_button()
  {
    $widget_ops = array('classname' => 'bd_sidebar_button', 'description' => 'Simply Displays bow with text and button widget' );
    $this->WP_Widget('bd_sidebar_button', 'Sidebar button Widget', $widget_ops);
  }
 
function form($instance) {  

  $linkb = esc_attr($instance['linkb']);
  $title = esc_attr($instance['title']);
  $desc = esc_attr($instance['desc']);
  $btntxt = esc_attr($instance['btntxt']);

    ?>

    <p>
    	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title'); ?></label>
    	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
	</p>
	<p>   
    	<label for="<?php echo $this->get_field_id('desc'); ?>"><?php _e('Text'); ?></label>
    	<textarea class="widefat" rows="5" cols="20" id="<?php echo $this->get_field_id('desc'); ?>" name="<?php echo $this->get_field_name('desc'); ?>"><?php echo $desc; ?></textarea>
    </p>
    <p>
    	<label for="<?php echo $this->get_field_id('linkb'); ?>"><?php _e('URL'); ?></label>
    	<input class="widefat" id="<?php echo $this->get_field_id('linkb'); ?>" name="<?php echo $this->get_field_name('linkb'); ?>" type="text" value="<?php echo $linkb; ?>" />
    </p>
    <p>
    	<label for="<?php echo $this->get_field_id('btntxt'); ?>"><?php _e('Button Text'); ?></label>
    	<input class="widefat" id="<?php echo $this->get_field_id('btntxt'); ?>" name="<?php echo $this->get_field_name('btntxt'); ?>" type="text" value="<?php echo $btntxt; ?>" />
 	</p>
    <?php
}

 
  function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['linkb'] = strip_tags($new_instance['linkb']);
    $instance['title'] = $new_instance['title'];
    $instance['desc'] = $new_instance['desc'];
    $instance['btntxt'] = $new_instance['btntxt'];
    return $instance;
    }

 
  /** @see WP_Widget::widget */
  function widget($args, $instance) {
      extract( $args );

  // these are our widget options
  $link = $instance['linkb'];
  $title = $instance['title'];
  $desc = $instance['desc'];
  $buttontxt = $instance['btntxt'];

    echo $before_widget;

  // if the title is set
  if ( $link ) { ?>
    <div class="bd-box-widget">
	  <div class="bd-bg-wrapper">
	    <h1><?php echo $title; ?></h1>
	    <p><?php echo $desc; ?></p>
	    <a href="<?php echo $link; ?>" class="btn btn-default"><?php echo $buttontxt; ?></a>
	  </div><!-- end of bd-bg-wrapper -->
	</div><!-- end of bd-box-widget -->
	<div class="gap-20 clearfix"></div>
  <?php }
  
    echo $after_widget;
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("bd_sidebar_button");') );?>