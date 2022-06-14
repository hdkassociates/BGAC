<?php

class bd_about_widget extends WP_Widget
{
  function bd_about_widget()
  {
    $widget_ops = array('classname' => 'bd_about_widget', 'description' => '' );
    $this->WP_Widget('bd_about_widget', 'About Widget', $widget_ops);
  }
 
function form($instance) {  

  $title = esc_attr($instance['title']);
  $desc = esc_attr($instance['desc']);
  $about = esc_attr($instance['about']);
  $link = esc_attr($instance['link']);

    ?>

    <p>
    	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Intro'); ?></label>
    	<textarea class="widefat" rows="5" cols="20" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>"><?php echo $title; ?></textarea>
	</p>
	<p>   
    	<label for="<?php echo $this->get_field_id('desc'); ?>"><?php _e('Text'); ?></label>
    	<textarea class="widefat" rows="10" cols="20" id="<?php echo $this->get_field_id('desc'); ?>" name="<?php echo $this->get_field_name('desc'); ?>"><?php echo $desc; ?></textarea>
    </p>
    <p>
    	<label for="<?php echo $this->get_field_id('about'); ?>"><?php _e('About Text'); ?></label>
    	<textarea class="widefat" rows="5" cols="20" id="<?php echo $this->get_field_id('about'); ?>" name="<?php echo $this->get_field_name('about'); ?>"><?php echo $about; ?></textarea>
 	</p>
 	<p>
    	<label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Link to Image'); ?></label>
    	<input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo $link; ?> "/>
	</p>
    <?php
}

 
  function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['link'] = strip_tags($new_instance['link']);
    $instance['title'] = $new_instance['title'];
    $instance['desc'] = $new_instance['desc'];
    $instance['about'] = $new_instance['about'];
    return $instance;
    }

 
  /** @see WP_Widget::widget */
  function widget($args, $instance) {
      extract( $args );

  // these are our widget options
  $title = $instance['title'];
  $desc = $instance['desc'];
  $about = $instance['about'];
  $link = $instance['link'];

    echo $before_widget;

  // if the title is set
  if ( $title ) { ?>
    <div class="bd-pledge-widget">
      <img src="<?php echo $link; ?>" class="pull-left" />
      <div class="clearfix visible-xs"></div>
      <div class="gap-20 visible-xs"></div>
      <p><strong><?php echo $title; ?></strong></p>
      <div class="clearfix"></div>
      <p class="bd-pledge-widget-intro"><?php echo $desc; ?><br><small><?php echo $about; ?></small></p>
    </div><!-- end of bd-pledge-widget -->
    <hr>
  <?php }
  
    echo $after_widget;
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("bd_about_widget");') );?>