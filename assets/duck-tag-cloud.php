<?php
class duckdivertag_Widget extends WP_Widget {
 
    public function __construct() {
     
        parent::__construct(
            'duckdivertag_widget',
            __( 'Duck Diver Tag Cloud', 'duckdivertagdomain' ),
            array(
                'classname'   => 'duckdivertag_widget',
                'description' => __( 'Tag Cloud with Specific Options.', 'duckdivertagdomain' )
                )
        );
       
        load_plugin_textdomain( 'duckdivertagdomain', false, basename( dirname( __FILE__ ) ) . '/languages' );
       
    }
 
    public function widget( $args, $instance ) {    
         
        extract( $args );
         
        $title      = apply_filters( 'widget_title', $instance['title'] );
        $number    = $instance['number'];
         
        echo $before_widget;
         
        if ( $title ) {
            echo $before_title . $title . $after_title;
        }
                             
        ?> 
		<!-- BEGIN Tag Cloud -->
		
		<div class="tagcloud">
        
        <?php if ( function_exists( 'wp_tag_cloud' ) ) : ?>
            <ul style="list-style: none;">
            <li><?php wp_tag_cloud( array(
				'number' => $number,
				'order' => 'RAND',
				'orderby' => 'count'
				) ); ?></li>
            </ul>
            <?php endif; ?>
        </div>
		<!-- END Tag Cloud -->
		<?php
        echo $after_widget;
         
    }
 
    /**
      * Sanitize widget form values as they are saved.
      *
      * @see WP_Widget::update()
      *
      * @param array $new_instance Values just sent to be saved.
      * @param array $old_instance Previously saved values from database.
      *
      * @return array Updated safe values to be saved.
      */
    public function update( $new_instance, $old_instance ) {        
         
        $instance = $old_instance;
         
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['number'] = strip_tags( $new_instance['number'] );
         
        return $instance;
         
    }
  
    /**
      * Back-end widget form.
      *
      * @see WP_Widget::form()
      *
      * @param array $instance Previously saved values from database.
      */
    public function form( $instance ) {    
     
        $title      = esc_attr( $instance['title'] );
        $number    = esc_attr( $instance['number'] );
        ?>
         
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of Tags'); ?></label> 
            <textarea class="widefat" rows="1" cols="6" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>"><?php echo $number; ?></textarea>
        </p>
     	
    <?php 
    }
     
}
 
/* Register the widget */
add_action( 'widgets_init', function(){
     register_widget( 'duckdivertag_Widget' );
});