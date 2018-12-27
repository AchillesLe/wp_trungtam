<?php 

/*
Plugin Name: Footer block widget
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page.
Author: Achilles
Version: 1.7.1
Author URI: http://ma.tt/
*/
    add_action('widgets_init','create_Footer_block_widget');

    function create_Footer_block_widget(){
        register_widget('Footer_block_widget');
    }

    class Footer_block_widget extends WP_Widget{

        function __construct( )
        {
            parent::__construct(
                'Footer_widget',
                'Footer widget',
                array(
                    'description'=>'widget dành cho footer',

                )
            );
        }

        public function form($instance)
        {
            parent::form( $instance );
            $default = array(
                'title'=>'tiêu đề widget',
                'content'=>'nội dung của widget'
            );
            $instance = wp_parse_args( $instance , $default);
            $title = esc_attr(  $instance['title'] );
            $content = esc_attr(  $instance['content'] );
            echo ( "Title: <input type='text' class ='widefat' name=".$this->get_field_name('title')." value='$title' />");
            echo ( "Nhập nội dung : <textarea class='widefat' name=".$this->get_field_name('content').">$content</textarea>");
        }

        public function update($new_instance, $old_instance)
        {
            $instance['title'] = $new_instance['title'];
            $instance['content'] = $new_instance['content'];
            return $instance;
        }

        public function widget($args, $instance)
        {
            extract($args);
            echo $before_widget ;
            echo $before_title.$instance['title'].$after_title;
            echo "<div class='content-item'>".$instance['content']."</div>";
            echo $after_widget;
        }
    }
?>