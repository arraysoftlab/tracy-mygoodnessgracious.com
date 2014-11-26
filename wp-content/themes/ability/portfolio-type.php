<?php

/* ==================================================

Portfolio Post Type Functions

================================================== */

$labels = array(
    'name'                          => 'Skills',
    'singular_name'                 => 'Skill',
    'search_items'                  => 'Search Skills',
    'popular_items'                 => 'Popular Skills',
    'all_items'                     => 'All Skills',
    'parent_item'                   => 'Parent Skill',
    'edit_item'                     => 'Edit Skill',
    'update_item'                   => 'Update Skill',
    'add_new_item'                  => 'Add New Skill',
    'new_item_name'                 => 'New Skill',
    'separate_items_with_commas'    => 'Separate Skills with commas',
    'add_or_remove_items'           => 'Add or remove Skills',
    'choose_from_most_used'         => 'Choose from most used Skills'
    );

$args = array(
    'label'                         => 'Skills',
    'labels'                        => $labels,
    'public'                        => true,
    'hierarchical'                  => true,
    'show_ui'                       => true,
    'show_in_nav_menus'             => true,
    'args'                          => array( 'orderby' => 'term_order' ),
    'rewrite'                       => false,
    'query_var'                     => true,
);

register_taxonomy( 'skills', 'portfolio', $args );

    
add_action('init', 'portfolio_register');  
  
function portfolio_register() {  

    $labels = array(
        'name' => _x('Portfolio', 'post type general name'),
        'singular_name' => _x('Portfolio Item', 'post type singular name'),
        'add_new' => _x('Add New', 'portfolio item'),
        'add_new_item' => __('Add New Portfolio Item'),
        'edit_item' => __('Edit Portfolio Item'),
        'new_item' => __('New Portfolio Item'),
        'view_item' => __('View Portfolio Item'),
        'search_items' => __('Search Portfolio'),
        'not_found' =>  __('Nothing found'),
        'not_found_in_trash' => __('Nothing found in Trash'),
        'parent_item_colon' => ''
    );

    $args = array(  
        'labels' => $labels,  
        'public' => true,  
        'show_ui' => true,
        'show_in_menu' => true, 
        'rewrite' => false,
        'supports' => array('title', 'editor', 'thumbnail'),
        'has_archive' => true,
        'taxonomies' => array('skills', 'post_tag')
       );  
  
    register_post_type( 'portfolio' , $args );  
}  

add_filter("manage_edit-portfolio_columns", "portfolio_edit_columns");   
  
function portfolio_edit_columns($columns){  
        $columns = array(  
            "cb" => "<input type=\"checkbox\" />",  
            "title" => "Portfolio Item",
            "description" => "Description",
            "skills" => "Skills"  
        );  
  
        return $columns;  
}  

add_action("manage_posts_custom_column",  "portfolio_custom_columns"); 
  
function portfolio_custom_columns($column){  
        global $post;  
        switch ($column)  
        {  
            case "description":  
                the_excerpt();  
                break;
            case "skills":
                echo get_the_term_list($post->ID, 'skills', '', ', ','');
                break;
        }  
}  

?>