<?php

/* ==================================================

Showcase Post Type Functions

================================================== */

    
add_action('init', 'showcase_register');  
  
function showcase_register() {  
    $args = array(  
        'label' => __('Showcase'),  
        'singular_label' => __('slide'),  
        'public' => true,  
        'show_ui' => true,  
        'capability_type' => 'post',  
        'hierarchical' => false,  
        'rewrite' => true,  
        'supports' => array('title', 'editor', 'thumbnail')  
       );  
  
    register_post_type( 'showcase' , $args );  
}  
    
add_filter("manage_edit-showcase_columns", "slide_edit_columns");   
  
function slide_edit_columns($columns){  
        $columns = array(  
            "cb" => "<input type=\"checkbox\" />",  
            "title" => "Slide",
            "link" => "Link",
            "caption" => "Caption",
            "youtube" => "YouTube",
            "vimeo" => "Vimeo"
        );  
  
        return $columns;  
}  

add_action("manage_posts_custom_column",  "slide_custom_columns"); 
  
function slide_custom_columns($column){  
        global $post;  
        switch ($column)  
        {  
        	case "link":  
                $custom = get_post_custom();  
                echo $custom["slide-link"][0];  
                break;
            case "caption":  
                $custom = get_post_custom();  
                echo $custom["caption-text"][0];  
                break;
            case "youtube":  
                $custom = get_post_custom();  
                echo $custom["youtube-id"][0];  
                break;
            case "vimeo":  
                $custom = get_post_custom();  
                echo $custom["vimeo-id"][0];  
                break;  
        }  
}  

?>