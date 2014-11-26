<?php
/*
 * Plugin Name: Fluid PintePress
 * Plugin URI: http://labs.arraysoftlab.com/fluid-pintepress
 * Description: An WordPress plugin to show your pinterest images in sideber using widget or in post/page using shortcode.
 * Version: 1.0
 * Author: akter@arraysoftlab
 * Author URI: http://akter.arraysoftlab.com
 * Tested up to: 3.5
*/

class Fluid_PintePress_Widget extends WP_Widget{
	
	function Fluid_PintePress_Widget() {
		$widget_options = array( 	
			'classname' => 'widget_thisismyurl_easy_pinterest',
			'description' => __( "A WordPress widget to add your recent Pinterest posts to your WordPress website. Learn more at http://thisismyurl.com" ) 
		);
		$control_options = array( 
			'width' => 300, 
			'height' => 300 
		);
		$this->WP_Widget( 'Fluid_PintePress_Widget', __( 'Fluid PintePress Widget' ), $widget_options, $control_options );
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( stripslashes( $new_instance['title'] ) );
		$instance['fpp_pinterest_uri'] = strip_tags( stripslashes( $new_instance['fpp_pinterest_uri'] ) );
		$instance['fpp_image_quantity'] = strip_tags( stripslashes( $new_instance['fpp_image_quantity'] ) );
		$instance['fpp_image_width'] = strip_tags( stripslashes( $new_instance['fpp_image_width'] ) );

		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( ( array ) $instance, array( 'title'=>'Me in Pinterest', 'fpp_pinterest_uri'=>'my_pinterest_uri', 'fpp_image_quantity'=>'9' ) );

		$title = htmlspecialchars( $instance['title'] );
		$fpp_pinterest_uri = ( $instance['fpp_pinterest_uri'] );
		$fpp_image_quantity = ( $instance['fpp_image_quantity'] );
		$fpp_image_width = ( $instance['fpp_image_width'] );

		echo '<p style="text-align:left;"><label for="' . $this->get_field_name( 'title' ) . '">' . __( 'Widget Title' ) . '</label><br />
				<input style="width: 300px;" id="' . $this->get_field_id( 'title' ) . '" name="' . $this->get_field_name( 'title' ) . '" type="text" value="' . $title . '" /></p>';

		echo '<p style="text-align:left;"><label for="' . $this->get_field_name( 'fpp_pinterest_uri' ) . '">' . __( 'Pinterest URI/Username' ) . '</label><br />
				<input style="width: 300px;" id="' . $this->get_field_id( 'fpp_pinterest_uri' ) . '" name="' . $this->get_field_name( 'fpp_pinterest_uri' ) . '" type="text" value="' . $fpp_pinterest_uri . '" /></p>';

		echo '<p style="text-align:left;"><label for="' . $this->get_field_name( 'fpp_image_quantity' ) . '">' . __( 'Image Quantity to Show' ) . '</label><br />
				<input style="width: 300px;" id="' . $this->get_field_id( 'fpp_image_quantity' ) . '" name="' . $this->get_field_name( 'fpp_image_quantity' ) . '" type="text" value="' . $fpp_image_quantity . '" /></p>';
		
		echo '<p style="text-align:left;"><label for="' . $this->get_field_name( 'fpp_image_width' ) . '">' . __( 'Image Width (px)' ) . '</label><br />
				<input style="width: 300px;" id="' . $this->get_field_id( 'fpp_image_width' ) . '" name="' . $this->get_field_name( 'fpp_image_width' ) . '" type="text" value="' . $fpp_image_width . '" /><br/><span style="font-style:italic;">Only number allowed</span></p>';

	}


	function widget( $args, $instance ) {

		extract( $args );
		$instance = wp_parse_args( ( array ) $instance, array( 'title'=>'Me in Pinterest', 'fpp_pinterest_uri'=>'my_pinterest_uri', 'fpp_image_quantity'=>'9') );

		$pinterest_feed = fetch_feed( "http://pinterest.com/" . $instance['fpp_pinterest_uri'] . "/feed.rss" );

		if (!is_wp_error( $pinterest_feed ) ) :
			$maxitems = $pinterest_feed->get_item_quantity( $instance['fpp_image_quantity'] );
			$pinterest_feed = $pinterest_feed->get_items(0, $maxitems);
		endif;

		if ( !empty( $pinterest_feed ) ) {

			echo $before_widget;

			echo $before_title . $instance['title'] . $after_title;

			echo '<div class="content"><div class="textwidget">';
			echo '<ul class="fluid-pintepress">';
			foreach ( $pinterest_feed as $item ) {
				$pinterest_content = $item->get_content();
				$pinterest_content = str_replace( '&gt;','>',$pinterest_content );
				$pinterest_content = str_replace( '&lt;','<',$pinterest_content );
				$pinterest_content = str_replace( '<a','<a target="_blank"',$pinterest_content );
				$pinterest_content = str_replace( 'href="','href="http://www.pinterest.com', $pinterest_content );

				$pinterest_content = strip_tags( $pinterest_content, "<a>,<img>" );
				$pinterest_content_array = explode( '</a>', $pinterest_content );
				$pinterest_content = $pinterest_content_array[0];

				?><ol><a href='<?php echo esc_url( $item->get_permalink() ); ?>'
					title='<?php echo 'Posted '.$item->get_date('j F Y | g:i a'); ?>'><?php echo $pinterest_content; ?></a></ol><?php
			}

			echo "</ul>";

			echo $after_widget;
			
			echo "<style type='text/css'>
					ul.fluid-pintepress ol {float:left; width: ".$instance['fpp_image_width']."px; height: ".$instance['fpp_image_width']."px; overflow: hidden; margin:0px; background: #efefef; display:table-cell; vertical-align:middle;}
					ul.fluid-pintepress ol img {max-width: 100%; height: auto; overflow:hidden;}
					ul.fluid-pintepress ol p {display: none;}
				</style>";
		}
	}

} //End of Fluid_PintePress_Widget Class

function fpp_widget_init() {
	register_widget( 'Fluid_PintePress_Widget' );
}
add_action( 'widgets_init', 'fpp_widget_init' );

?>