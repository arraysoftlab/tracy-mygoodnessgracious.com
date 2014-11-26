<?php
/* All functions related to Spas & Retreats
*/
//Allow our own styling in admin
function admin_register_head() {
    $template_url = get_stylesheet_directory_uri();
    $url = $template_url . '/css/im-admin.css';
    echo "<link rel='stylesheet' type='text/css' href='$url' />\n";
}
add_action('admin_head', 'admin_register_head');

//CREATE CPTs
add_action('init', 'im_spa_register');
function im_spa_register() {
	$labels = array(
		'name' => _x('Spas', 'post type general name'),
		'singular_name' => _x('Spa', 'post type singular name'),
		'add_new' => _x('Add New', 'portfolio item'),
		'add_new_item' => __('Add New Spa'),
		'edit_item' => __('Edit Spa'),
		'new_item' => __('New Spa'),
		'view_item' => __('View Spa'),
		'search_items' => __('Search Spas'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'spas'),
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'has_archive' => true,
		'supports' => array('title','editor','thumbnail', 'excerpt', 'author','page-attributes','comments')
	  ); 
 
	register_post_type( 'im_spa' , $args );
}

add_action("admin_init", "im_spa_init");
function im_spa_init(){
    add_meta_box("im_spa_data", "Spa Details", "im_spa_data", "im_spa", "normal", "high");	
}
function im_spa_data() {
	global $post;
	$custom = get_post_custom($post->ID);
    $spa_sticky = $custom["_spa_sticky"][0];
	$spa_address = $custom["_spa_address"][0];
	$spa_website = $custom["_spa_website"][0];
	$spa_phone = $custom["_spa_phone"][0];	
	
	?>
    <div class="spa-details">
        <p><label for="spa_sticky">Featured Spa:</label>
           <input type="checkbox" name="spa_sticky" id="spa_sticky" value="1" <?php if ($spa_sticky) echo "checked"; ?> /></p>
        
        <p><label for="spa_website">Website:</label><br />
        <input name="spa_website" id="spa_website" value="<?php echo $spa_website; ?>" type="text" class="large" /></p>   
       
        <p><label for="spa_address">Address:</label><br />
        <textarea id="spa_address" name="spa_address"><?php echo $spa_address;?></textarea></p>         
                   
        <p><label for="spa_phone">Phone:</label>
        <input name="spa_phone" id="spa_phone" value="<?php echo $spa_phone; ?>" type="text" /></p> 
   </div>
<?php
} //end im_spa_data


add_action('save_post', 'im_spa_save');
function im_spa_save() {
   global $post;
   
   if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
   	return $post->ID;
   }
   $post_type= get_post_type( $post ->ID );
   if ($post_type=="im_spa") {
   
	  	$spa_address=strtr($_POST["spa_address"], array("\r\n" => '<br />', "\r" => '<br />', "\n" => '<br />'));	
		update_post_meta($post->ID, "_spa_address", $spa_address);
	  	update_post_meta($post->ID, "_spa_phone", $_POST["spa_phone"]);
	  	$spa_website=$_POST["spa_website"];
	 	$parsed = parse_url($spa_website);
		if (empty($parsed['scheme'])) {
    		$spa_website = 'http://' . ltrim($spa_website, '/');
		} 
		update_post_meta($post->ID, "_spa_website", $spa_website);
		if(isset($_POST["spa_sticky"])) {
			update_post_meta($post->ID, "_spa_sticky", $_POST["spa_sticky"]);
		}
		else {
			delete_post_meta($post->ID, "_spa_sticky");  
		}
	  
   }//if spa
}//save im_spa

add_action( 'init', 'add_custom_taxonomies', 0 );
function add_custom_taxonomies() { 
  $labels = array(
    'name' => _x( 'Regions', 'taxonomy general name' ),
    'singular_name' => _x( 'Region', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Regions' ),
    'all_items' => __( 'All Regions' ),
	'popular_items' => null,
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Region' ), 
    'update_item' => __( 'Update Region' ),
    'add_new_item' => __( 'Add New Region' ),
    'new_item_name' => __( 'New Region Name' ),
    'menu_name' => __( 'Region' ),
  ); 	

  register_taxonomy('region','im_spa',array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'region' ),
  ));
}//register taxonomy



?>