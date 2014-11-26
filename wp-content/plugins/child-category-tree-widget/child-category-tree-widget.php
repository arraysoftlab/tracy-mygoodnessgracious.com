<?php
/**
 * Plugin Name: Child Category Tree Widget
 * Plugin URI: http://labs.arraysoftlab.com/child-category-tree-widget
 * Description: An WordPress plugin to show child category tree of current page or a specific page.
 * Version: 1.1
 * Author: arraysoftlab.com
 * Author URI: http://arraysoftlab.com
 * Tested up to: 3.5
 */

class ChildCategoryTreeWidget extends WP_Widget {

	function ChildCategoryTreeWidget(){
		$widget_ops = array('classname' => 'widget_child_category_tree', 'description' => __('Lists of the child category tree for the current page or a given category.', 'child_category_tree') );
		$this->WP_Widget('child_category_tree_widget', __('Child Category Tree', 'child_category_tree'), $widget_ops);
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);

		$category_id = empty($instance['category_id']) ? 1 : $instance['category_id'];
		$use_cat_title = empty($instance['use_cat_title']) ? 0 : $instance['use_cat_title'];
		$hide_empty_cats = empty($instance['hide_empty_cats']) ? 0 : $instance['hide_empty_cats'];
		$show_post_count = empty($instance['show_post_count']) ? 0 : $instance['show_post_count'];
		$title_link = empty($instance['title_link']) ? 0 : $instance['title_link'];				if($category_id == 'full_tree'){			$cur_cat = get_query_var('cat');			$parent_cat = get_category_parents($cur_cat, false, '/');			$parent_cat = explode('/',$parent_cat);			$category_id = get_category_by_slug($parent_cat[0])->term_id;					} elseif ($category_id == 'current'){
			$category_id = get_query_var('cat');
		}

		if ($use_cat_title) {
			$title = apply_filters('widget_title', get_cat_name($category_id), $instance, $this->id_base);	
		} else {
			$title = apply_filters('widget_title', empty($instance['title'] ) ? __('Child Category Tree', 'child_category_tree') : $instance['title'], $instance, $this->id_base);
		}

		$childs = get_categories(array('child_of' => $category_id, 'hide_empty' => $hide_empty_cats, 'show_count' => $show_post_count));

		if (!empty($childs)) {

			echo $before_widget;
			
			if ($title_link) {
				echo $before_title.'<a href="'.get_category_link($category_id).'">'.$title.'</a>'.$after_title;
			} else {
				echo $before_title.$title.$after_title;
			}
			
			echo '<ul>';
			wp_list_categories(array('child_of' => $category_id, 'hide_empty' => $hide_empty_cats, 'show_count' => $show_post_count, 'title_li' => null));
			echo '</ul>';
			echo $after_widget;
		}
	}

	function update($new_instance, $old_instance) {

		$instance = $old_instance;

		$instance['title'] = trim(strip_tags($new_instance['title']));
		$instance['category_id'] = $new_instance['category_id'];
		$instance['use_cat_title'] = (int) $new_instance['use_cat_title'];
		$instance['hide_empty_cats'] = (int) $new_instance['hide_empty_cats'];
		$instance['show_post_count'] = (int) $new_instance['show_post_count'];
		$instance['title_link'] = (int) $new_instance['title_link'];

		return $instance;
	}

	function form($instance) {

		$instance = wp_parse_args((array) $instance, array('title' => __('Child Category Tree', 'child_category_tree'), 'category_id' => 1, 'use_cat_title' => 0, 'hide_empty_cats' => 0, 'show_post_count' => 1, 'title_link' => 0));

		?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title:', 'child_category_tree'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']) ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('category_id'); ?>"><?php _e('Parent Category:', 'child_category_tree'); ?></label>
				<select id="<?php echo $this->get_field_id('category_id'); ?>" name="<?php echo $this->get_field_name('category_id'); ?>">
					<option value="full_tree" <?php if('full_tree' == $instance['category_id']){ echo 'selected="selected"';} ?> >Full Tree</option>					<option value="current" <?php if('current' == $instance['category_id']){ echo 'selected="selected"';} ?> >Current</option>
					<?php
						$categories = get_categories(array('hide_empty' => 0));
						foreach ($categories as $cat) {
							if ($cat->cat_ID == (int)$instance['category_id']) {
								$option = '<option selected="selected" value="'.$cat->cat_ID.'">'.$cat->cat_name.'</option>';
							} else {
								$option = '<option value="'.$cat->cat_ID.'">'.$cat->cat_name.'</option>';
							}
							//$option .= $cat->cat_name.'</option>';
							echo $option;
						}
					?>
				</select>
			</p>
			<p>
				<input id="<?php echo $this->get_field_id('use_cat_title'); ?>" name="<?php echo $this->get_field_name('use_cat_title'); ?>" type="checkbox" value="1" <?php if ($instance['use_cat_title']) echo 'checked="checked"'; ?>/>
				<label for="<?php echo $this->get_field_id('use_cat_title'); ?>"><?php _e('Use Parent Cat as Title?', 'child_category_tree'); ?></label>
			</p>
			<p>
				<input id="<?php echo $this->get_field_id('show_post_count'); ?>" name="<?php echo $this->get_field_name('show_post_count'); ?>" type="checkbox" value="1" <?php if ($instance['show_post_count']) echo 'checked="checked"'; ?>/>
				<label for="<?php echo $this->get_field_id('show_post_count'); ?>"><?php _e('Show Post Count?', 'child_category_tree'); ?></label>
			</p>
			<p>
				<input id="<?php echo $this->get_field_id('hide_empty_cats'); ?>" name="<?php echo $this->get_field_name('hide_empty_cats'); ?>" type="checkbox" value="1" <?php if ($instance['hide_empty_cats']) echo 'checked="checked"'; ?>/>
				<label for="<?php echo $this->get_field_id('hide_empty_cats'); ?>"><?php _e('Hide Empty Child Categories?', 'child_category_tree'); ?></label>
			</p>
			<p>
				<input id="<?php echo $this->get_field_id('title_link'); ?>" name="<?php echo $this->get_field_name('title_link'); ?>" type="checkbox" value="1" <?php if ($instance['title_link']) echo 'checked="checked"'; ?>/>
				<label for="<?php echo $this->get_field_id('title_link'); ?>"><?php _e('Add Parent Cat Link to Title?', 'child_category_tree'); ?></label>
			</p>
			<p>
		<?php
	}
}

add_action('widgets_init', create_function('', 'return register_widget("ChildCategoryTreeWidget");'));

?>
