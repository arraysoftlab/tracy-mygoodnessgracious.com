<?php

/* ==================================================

This is where *some* the magic happens! If you NEED to edit this then
be VERY careful. Things can get terribly messy if this gets messed up!

================================================== */

define('SF_TEMPLATE_PATH', TEMPLATEPATH);
define('SF_INCLUDES_PATH', SF_TEMPLATE_PATH . '/includes');
define('SF_WIDGETS_PATH', SF_INCLUDES_PATH . '/widgets');

/* INCLUDES
================================================== */

/* Add custom post types */
require_once(SF_TEMPLATE_PATH . '/portfolio-type.php');
require_once(SF_TEMPLATE_PATH . '/showcase-type.php');

/* Add shortcodes */
include(SF_INCLUDES_PATH . '/shortcodes.php');

/* Dropdown Menu Support */
include(SF_INCLUDES_PATH . '/dropdown-menus.php');

/* Include Plugins */
include(SF_INCLUDES_PATH . '/ambrosite-post-link-plus.php');

/* Add widgets */
include(SF_WIDGETS_PATH . '/widget-flickr.php');
include(SF_WIDGETS_PATH . '/widget-twitter.php');
include(SF_WIDGETS_PATH . '/widget-video.php');

/* Add theme updater */
require_once(SF_INCLUDES_PATH . '/wp-updates-theme.php');
new WPUpdatesThemeUpdater( 'http://wp-updates.com/api/1/theme', 82, basename(get_template_directory()) );


/* THEME OPTIONS FRAMEWORK
================================================== */  

// Paths to admin functions
define('ADMIN_PATH', STYLESHEETPATH . '/admin/');
define('ADMIN_DIR', get_template_directory_uri() . '/admin/');
define('LAYOUT_PATH', ADMIN_PATH . '/layouts/');

// You can mess with these 2 if you wish.
$theme_version = '';
	    
if( function_exists( 'wp_get_theme' ) ) {
	if( is_child_theme() ) {
		$temp_obj = wp_get_theme();
		$theme_obj = wp_get_theme( $temp_obj->get('Template') );
	} else {
		$theme_obj = wp_get_theme();    
	}

	$theme_version = $theme_obj->get('Version');
	$theme_name = $theme_obj->get('Name');
	$theme_uri = $theme_obj->get('ThemeURI');
	$author_uri = $theme_obj->get('AuthorURI');
}
define( 'THEMENAME', $theme_name );
define('OPTIONS', 'of_options'); // Name of the database row where your options are stored
define('BACKUPS','of_backups'); // Name of the database row for options backup


// Build Options
require_once (ADMIN_PATH . 'admin-interface.php');      // Admin Interfaces 
require_once (ADMIN_PATH . 'theme-options.php');        // Options panel settings and custom settings
require_once (ADMIN_PATH . 'admin-functions.php');  // Theme actions based on options settings
require_once (ADMIN_PATH . 'medialibrary-uploader.php'); // Media Library Uploader


/* THEME SUPPORT
================================================== */  

add_theme_support( 'post-formats', array( 'aside', 'audio', 'gallery', 'image', 'link', 'quote', 'video' ) );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 220, 150, true );
add_image_size( 'cover-art-image', 80, 80, true );
add_image_size( 'four-column-image', 420, 290, true );
add_image_size( 'blog-image', 460, 220, true );
add_image_size( 'detail-image', 640, 330, true);
add_image_size( 'portfolio-detail-image', 800, 9999);
add_image_size( 'portfolio-gal-image', 800, 374, true);
add_image_size( 'showcase-image', 1680, 805, true);
add_image_size( 'spa-image', 400, 240, true);

/* CONTENT WIDTH
================================================== */

if ( ! isset( $content_width ) ) $content_width = 940;


/* LOAD SCRIPTS
================================================== */

function sf_load_js() {
    
    if ( ! is_admin() ) {
        wp_deregister_script('jquery');
    }

    wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js');
    wp_register_script('smoothscroll', get_stylesheet_directory_uri() . '/js/jquery.smooth-scroll.min.js', 'jquery', '1.0', TRUE);
    wp_register_script('flexslider', get_stylesheet_directory_uri() . '/js/jquery.flexslider.js', 'jquery', '1.0', TRUE);
    wp_register_script('quicksand', get_stylesheet_directory_uri() . '/js/jquery.quicksand.js', 'jquery', '1.0', TRUE);
    wp_register_script('easing', get_stylesheet_directory_uri() . '/js/jquery.easing.1.3.js', 'jquery', '1.3', TRUE);
    wp_register_script('jqueryUI', get_stylesheet_directory_uri() . '/js/jquery-ui-1.9.2.custom.min.js', 'jquery', '1.9.2', TRUE);
    wp_register_script('prettyPhoto', get_stylesheet_directory_uri() . '/js/jquery.prettyPhoto.js', 'jquery', '1.0', TRUE);
    wp_register_script('jplayer', get_stylesheet_directory_uri() . '/js/jquery.jplayer.min.js', 'jquery', '1.0', TRUE);
	wp_register_script('imagesloaded', get_stylesheet_directory_uri() . '/js/jquery.imagesloaded.min.js', 'jquery', '1.0', TRUE);	    
    wp_register_script('respond', get_stylesheet_directory_uri() . '/js/respond.min.js', 'respond', '1.0', TRUE);
    wp_register_script('viewport', get_stylesheet_directory_uri() . '/js/jquery.viewport.mini.js', 'viewport', '1.0', TRUE);
    wp_register_script('cycle', get_stylesheet_directory_uri() . '/js/jquery.cycle.all.js', 'cycle', '1.0', TRUE);
    wp_register_script('fitvids', get_stylesheet_directory_uri() . '/js/jquery.fitvids.js', 'cycle', '1.0', TRUE);
    wp_register_script('functions', get_stylesheet_directory_uri() . '/js/functions.js.php', 'jquery', '1.0', TRUE);

    wp_enqueue_script('jquery');
    wp_enqueue_script('smoothscroll');
    wp_enqueue_script('flexslider');
    wp_enqueue_script('quicksand');
    wp_enqueue_script('easing');
    wp_enqueue_script('jqueryUI');
    wp_enqueue_script('prettyPhoto');
    wp_enqueue_script('jplayer');
    wp_enqueue_script('imagesloaded');
    wp_enqueue_script('respond');
    wp_enqueue_script('viewport');
    wp_enqueue_script('cycle');
	wp_enqueue_script('fitvids');
	 
    if ( ! is_admin() ) {
        wp_enqueue_script('functions');
    }
}

add_action('init', 'sf_load_js');


/* ADMIN CUSTOM POST TYPE ICONS
================================================== */

add_action( 'admin_head', 'cpt_icons' );
function cpt_icons() {
    ?>
    <style type="text/css" media="screen">
        #menu-posts-portfolio .wp-menu-image {
            background: url(<?php bloginfo('template_url') ?>/admin/images/portfolio.png) no-repeat 6px 6px!important;
        }
        #menu-posts-portfolio:hover .wp-menu-image, #menu-posts-portfolio.wp-has-current-submenu .wp-menu-image {
            background-position:6px 6px!important;
        }
        #menu-posts-showcase .wp-menu-image {
            background: url(<?php bloginfo('template_url') ?>/admin/images/showcase.png) no-repeat 6px 6px!important;
        }
        #menu-posts-showcase:hover .wp-menu-image, #menu-posts-showcase.wp-has-current-submenu .wp-menu-image {
            background-position:6px 6px!important;
        }
    </style>
<?php }


/* FEATURED IMAGE TITLE
================================================== */

function the_post_thumbnail_title() {
  global $post;

  $thumbnail_id    = get_post_thumbnail_id($post->ID);
  $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

  if ($thumbnail_image && isset($thumbnail_image[0])) {
    echo $thumbnail_image[0]->post_title;
  }
}


/* SHORTCODE PANEL SETUP
================================================== */

// Create TinyMCE's editor button & plugin for Swift Framework Shortcodes
add_action('init', 'sf_sc_button'); 

function sf_sc_button() {  
   if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )  
   {  
     add_filter('mce_external_plugins', 'add_tinymce_plugin');  
     add_filter('mce_buttons', 'register_button');  
   }  
} 

function register_button($button) {  
    array_push($button, 'separator', 'swiftframework_shortcodes' );  
    return $button;  
}

function add_tinymce_plugin($plugins) {  
    $plugins['swiftframework_shortcodes'] = get_template_directory_uri() . '/includes/sf_shortcodes/tinymce.editor.plugin.js';  
    return $plugins;  
} 


/* WORDPRESS GALLERY MODS
================================================== */

add_filter( 'wp_get_attachment_link', 'sant_prettyadd');
 
function sant_prettyadd ($content) {
    $content = preg_replace("/<a/","<a data-gal=\"prettyPhoto[pp_gal]\"",$content,1);
    return $content;
}

add_filter( 'gallery_style', 'custom_gallery_styling', 99 );

function custom_gallery_styling() {
    return "<div class='gallery'>";
}


/* TIME AGO FUNCTION
================================================== */

function time_ago( $type = 'post' ) {
    $d = 'comment' == $type ? 'get_comment_time' : 'get_post_time';
    return human_time_diff($d('U'), current_time('timestamp')) . " " . __('ago');
}

/* META BOX ADDITION
================================================== */


add_action( 'add_meta_boxes', 'meta_box_add' );

function meta_box_add()  {  
    add_meta_box( 'post-meta', 'Post Meta', 'post_meta_box_data', 'post', 'normal', 'high' );
    add_meta_box( 'video-link', 'Portfolio Item Meta', 'portfolio_meta_box_data', 'portfolio', 'normal', 'high' );
    add_meta_box( 'slide-info-meta', 'Slide Meta', 'showcase_meta_box_data', 'showcase', 'normal', 'high');  

    $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
    $template_file = get_post_meta($post_id,'_wp_page_template',TRUE);

    if ($template_file == 'default') {
        add_meta_box( 'page-meta', 'Page Meta', 'page_meta_box_data', 'page', 'normal', 'high');
    } else if ($template_file == 'template-fullwidth.php') {
        add_meta_box( 'page-meta', 'Page Meta', 'page_meta_box_data_two', 'page', 'normal', 'high');
    }
    
}

function post_meta_box_data( $post )  {  
    $values = get_post_custom( $post->ID );  
    $youtube_id = isset( $values['youtube-id'] ) ? esc_attr( $values['youtube-id'][0] ) : '';
    $vimeo_id = isset( $values['vimeo-id'] ) ? esc_attr( $values['vimeo-id'][0] ) : '';
    $m4v_url = isset( $values['m4v-url'] ) ? esc_attr( $values['m4v-url'][0] ) : '';
    $ogv_url = isset( $values['ogv-url'] ) ? esc_attr( $values['ogv-url'][0] ) : '';
    $link_url = isset( $values['link-url'] ) ? esc_attr( $values['link-url'][0] ) : '';
    $quote_cite = isset( $values['quote-cite'] ) ? esc_attr( $values['quote-cite'][0] ) : '';
    $audio_url = isset( $values['audio-url'] ) ? esc_attr( $values['audio-url'][0] ) : '';
    $audio_name = isset( $values['audio-name'] ) ? esc_attr( $values['audio-name'][0] ) : '';

    wp_nonce_field( 'post_meta_box_nonce', 'meta_box_nonce' ); 
    ?>  
        <p>  
            <label style="display: block; float: left; padding-top: 3px; width: 120px;" for="youtube-id">YouTube ID:</label>  
            <input type="text" name="youtube-id" id="youtube-id" value="<?php echo $youtube_id; ?>" style="width: 300px;" />  
        </p>
        <p>  
            <label style="display: block; float: left; padding-top: 3px; width: 120px;" for="vimeo-id">Vimeo ID:</label>  
            <input type="text" name="vimeo-id" id="vimeo-id" value="<?php echo $vimeo_id; ?>" style="width: 300px;" />  
        </p>
        <p>  
            <label style="display: block; float: left; padding-top: 3px; width: 120px;" for="m4v-url">M4V Video URL:</label>  
            <input type="text" name="m4v-url" id="m4v-url" value="<?php echo $m4v_url; ?>" style="width: 300px;" />  
        </p>
        <p>  
            <label style="display: block; float: left; padding-top: 3px; width: 120px;" for="ogv-url">OGV Video URL:</label>  
            <input type="text" name="ogv-url" id="ogv-url" value="<?php echo $ogv_url; ?>" style="width: 300px;" />  
        </p>
        <p>  
            <label style="display: block; float: left; padding-top: 3px; width: 120px;" for="audio-url">Audio MP3 URL:</label>  
            <input type="text" name="audio-url" id="audio-url" value="<?php echo $audio_url; ?>" style="width: 300px;" />  
        </p>
        <p>  
            <label style="display: block; float: left; padding-top: 3px; width: 120px;" for="audio-name">Audio Track Name:</label>  
            <input type="text" name="audio-name" id="audio-name" value="<?php echo $audio_name; ?>" style="width: 300px;" />  
        </p>
        <p>  
            <label style="display: block; float: left; padding-top: 3px; width: 120px;" for="link-url">Link URL:</label>  
            <input type="text" name="link-url" id="link-url" value="<?php echo $link_url; ?>" style="width: 300px;" />  
        </p>
        <p>  
            <label style="display: block; float: left; padding-top: 3px; width: 120px;" for="quote-cite">Quote Cite:</label>  
            <input type="text" name="quote-cite" id="quote-cite" value="<?php echo $quote_cite; ?>" style="width: 300px;" />  
        </p>

<?php  }

function portfolio_meta_box_data( $post )  {  
    $values = get_post_custom( $post->ID );  
	$all_images = isset( $values['all-images'] ) ? esc_attr( $values['all-images'][0] ) : '';
    $external_link = isset( $values['external-link'] ) ? esc_attr( $values['external-link'][0] ) : '';
    $youtube_id = isset( $values['youtube-id'] ) ? esc_attr( $values['youtube-id'][0] ) : '';
    $vimeo_id = isset( $values['vimeo-id'] ) ? esc_attr( $values['vimeo-id'][0] ) : '';

    wp_nonce_field( 'portfolio_meta_box_nonce', 'meta_box_nonce' ); 
    ?>  
    	<p>  
    	    <label style="display: block; float: left; padding-top: 3px; width: 200px;" for="all-images">Disable attached images gallery:</label>  
    	    <input type="checkbox" name="all-images" id="all-images" <?php if( $all_images == "on" ) { ?>checked="checked"<?php } ?> style="margin-top:6px;" />  
    	</p>
        <p>  
            <label style="display: block; float: left; padding-top: 3px; width: 120px;" for="external-link">External Link:</label>  
            <input type="text" name="external-link" id="external-link" value="<?php echo $external_link; ?>" style="width: 300px;" />  
        </p>
        <p>  
            <label style="display: block; float: left; padding-top: 3px; width: 120px;" for="youtube-id">YouTube ID:</label>  
            <input type="text" name="youtube-id" id="youtube-id" value="<?php echo $youtube_id; ?>" style="width: 300px;" />  
        </p>
        <p>  
            <label style="display: block; float: left; padding-top: 3px; width: 120px;" for="vimeo-id">Vimeo ID:</label>  
            <input type="text" name="vimeo-id" id="vimeo-id" value="<?php echo $vimeo_id; ?>" style="width: 300px;" />  
        </p>
<?php  }

function showcase_meta_box_data( $post )  {  
    $values = get_post_custom( $post->ID );  
    $slide_link = isset( $values['slide-link'] ) ? esc_attr( $values['slide-link'][0] ) : '';
    $youtube_id = isset( $values['youtube-id'] ) ? esc_attr( $values['youtube-id'][0] ) : '';
    $vimeo_id = isset( $values['vimeo-id'] ) ? esc_attr( $values['vimeo-id'][0] ) : '';
    $caption_text = isset( $values['caption-text'] ) ? esc_attr( $values['caption-text'][0] ) : '';

    wp_nonce_field( 'showcase_meta_box_nonce', 'meta_box_nonce' ); 
    ?>  
        <p>  
            <label style="display: block; float: left; padding-top: 3px; width: 120px;" for="external-link">Slide Link:</label>  
            <input type="text" name="slide-link" id="slide-link" value="<?php echo $slide_link; ?>" style="width: 300px;" />  
        </p>
        <p>  
            <label style="display: block; float: left; padding-top: 3px; width: 120px;" for="youtube-id">YouTube ID:</label>  
            <input type="text" name="youtube-id" id="youtube-id" value="<?php echo $youtube_id; ?>" style="width: 300px;" />  
        </p>
        <p>  
            <label style="display: block; float: left; padding-top: 3px; width: 120px;" for="vimeo-id">Vimeo ID:</label>  
            <input type="text" name="vimeo-id" id="vimeo-id" value="<?php echo $vimeo_id; ?>" style="width: 300px;" />  
        </p>
        <p>  
            <label style="display: block; float: left; padding-top: 3px; width: 120px;" for="caption-text">Caption Text:</label>  
            <input type="text" name="caption-text" id="caption-text" value="<?php echo $caption_text; ?>" style="width: 300px;" />  
        </p>
<?php  }  

function page_meta_box_data( $post )  {  
    $values = get_post_custom( $post->ID );
    $page_tagline = isset( $values['page-tagline'] ) ? esc_attr( $values['page-tagline'][0] ) : '';
    $youtube_id = isset( $values['youtube-id'] ) ? esc_attr( $values['youtube-id'][0] ) : '';
    $vimeo_id = isset( $values['vimeo-id'] ) ? esc_attr( $values['vimeo-id'][0] ) : '';
    $m4v_url = isset( $values['m4v-url'] ) ? esc_attr( $values['m4v-url'][0] ) : '';
    $ogv_url = isset( $values['ogv-url'] ) ? esc_attr( $values['ogv-url'][0] ) : '';
    $audio_url = isset( $values['audio-url'] ) ? esc_attr( $values['audio-url'][0] ) : '';
    $audio_name = isset( $values['audio-name'] ) ? esc_attr( $values['audio-name'][0] ) : '';

    wp_nonce_field( 'page_meta_box_nonce', 'meta_box_nonce' ); 
    ?>  
        <p>  
            <label style="display: block; float: left; padding-top: 3px; width: 120px;" for="page-tagline">Page Tagline:</label>  
            <input type="text" name="page-tagline" id="page-tagline" value="<?php echo $page_tagline; ?>" style="width: 300px;" />  
        </p>
        <p>  
            <label style="display: block; float: left; padding-top: 3px; width: 120px;" for="youtube-id">YouTube ID:</label>  
            <input type="text" name="youtube-id" id="youtube-id" value="<?php echo $youtube_id; ?>" style="width: 300px;" />  
        </p>
        <p>  
            <label style="display: block; float: left; padding-top: 3px; width: 120px;" for="vimeo-id">Vimeo ID:</label>  
            <input type="text" name="vimeo-id" id="vimeo-id" value="<?php echo $vimeo_id; ?>" style="width: 300px;" />  
        </p>
        <p>  
            <label style="display: block; float: left; padding-top: 3px; width: 120px;" for="m4v-url">M4V Video URL:</label>  
            <input type="text" name="m4v-url" id="m4v-url" value="<?php echo $m4v_url; ?>" style="width: 300px;" />  
        </p>
        <p>  
            <label style="display: block; float: left; padding-top: 3px; width: 120px;" for="ogv-url">OGV Video URL:</label>  
            <input type="text" name="ogv-url" id="ogv-url" value="<?php echo $ogv_url; ?>" style="width: 300px;" />  
        </p>
        <p>  
            <label style="display: block; float: left; padding-top: 3px; width: 120px;" for="audio-url">Audio MP3 URL:</label>  
            <input type="text" name="audio-url" id="audio-url" value="<?php echo $audio_url; ?>" style="width: 300px;" />  
        </p>
        <p>  
            <label style="display: block; float: left; padding-top: 3px; width: 120px;" for="audio-name">Audio Track Name:</label>  
            <input type="text" name="audio-name" id="audio-name" value="<?php echo $audio_name; ?>" style="width: 300px;" />  
        </p>
<?php  }

function page_meta_box_data_two( $post )  {  
    $values = get_post_custom( $post->ID );
    $page_tagline = isset( $values['page-tagline'] ) ? esc_attr( $values['page-tagline'][0] ) : '';

    wp_nonce_field( 'page_meta_box_two_nonce', 'meta_box_nonce' ); 
    ?>  
        <p>  
            <label style="display: block; float: left; padding-top: 3px; width: 120px;" for="page-tagline">Page Tagline:</label>  
            <input type="text" name="page-tagline" id="page-tagline" value="<?php echo $page_tagline; ?>" style="width: 300px;" />  
        </p>
<?php  }

add_action( 'save_post', 'post_meta_box_save' );
add_action( 'save_post', 'portfolio_meta_box_save' );
add_action( 'save_post', 'showcase_meta_box_save');
add_action( 'save_post', 'page_meta_box_save' );
add_action( 'save_post', 'page_meta_box_two_save' );

function post_meta_box_save( $post_id )  
{  
    // Bail if we're doing an auto save  
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return; 
 
    // if our nonce isn't there, or we can't verify it, bail 
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'post_meta_box_nonce' ) ) return; 
 
    // if our current user can't edit this post, bail  
    if( !current_user_can( 'edit_post' ) ) return;  
  
    // now we can actually save the data  
    $allowed = array(  
        'a' => array( // on allow a tags  
            'href' => array() // and those anchors can only have href attribute  
        )  
    );  
  
    // Make sure your data is set before trying to save it  
    if( isset( $_POST['youtube-id'] ) )  
        update_post_meta( $post_id, 'youtube-id', wp_kses( $_POST['youtube-id'], $allowed ) );
    
    if( isset( $_POST['vimeo-id'] ) )  
        update_post_meta( $post_id, 'vimeo-id', wp_kses( $_POST['vimeo-id'], $allowed ) );
    
    if( isset( $_POST['m4v-url'] ) )  
        update_post_meta( $post_id, 'm4v-url', wp_kses( $_POST['m4v-url'], $allowed ) );
    
    if( isset( $_POST['ogv-url'] ) )  
        update_post_meta( $post_id, 'ogv-url', wp_kses( $_POST['ogv-url'], $allowed ) );
    
    if( isset( $_POST['link-url'] ) )  
        update_post_meta( $post_id, 'link-url', wp_kses( $_POST['link-url'], $allowed ) );  

    if( isset( $_POST['quote-cite'] ) )  
        update_post_meta( $post_id, 'quote-cite', wp_kses( $_POST['quote-cite'], $allowed ) );   
    
    if( isset( $_POST['audio-url'] ) )  
        update_post_meta( $post_id, 'audio-url', wp_kses( $_POST['audio-url'], $allowed ) );  
    
    if( isset( $_POST['audio-name'] ) )  
        update_post_meta( $post_id, 'audio-name', wp_kses( $_POST['audio-name'], $allowed ) );  

}

function portfolio_meta_box_save( $post_id )  
{  
    // Bail if we're doing an auto save  
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return; 
 
    // if our nonce isn't there, or we can't verify it, bail 
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'portfolio_meta_box_nonce' ) ) return; 
 
    // if our current user can't edit this post, bail  
    if( !current_user_can( 'edit_post' ) ) return;  
  
    // now we can actually save the data  
    $allowed = array(  
        'a' => array( // on allow a tags  
            'href' => array() // and those anchors can only have href attribute  
        )  
    );  
  
    // Make sure your data is set before trying to save it  
    
    if( isset( $_POST['all-images'] ) ) {
        update_post_meta( $post_id, 'all-images', "on" );
    } else {
        update_post_meta( $post_id, 'all-images', "off" );
    }
    
    if( isset( $_POST['external-link'] ) )  
        update_post_meta( $post_id, 'external-link', wp_kses( $_POST['external-link'], $allowed ) );    

    if( isset( $_POST['youtube-id'] ) )  
        update_post_meta( $post_id, 'youtube-id', wp_kses( $_POST['youtube-id'], $allowed ) );
    
    if( isset( $_POST['vimeo-id'] ) )  
        update_post_meta( $post_id, 'vimeo-id', wp_kses( $_POST['vimeo-id'], $allowed ) );

}

function showcase_meta_box_save( $post_id )  
{  
    // Bail if we're doing an auto save  
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return; 
 
    // if our nonce isn't there, or we can't verify it, bail 
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'showcase_meta_box_nonce' ) ) return; 
 
    // if our current user can't edit this post, bail  
    if( !current_user_can( 'edit_post' ) ) return;  
  
    // now we can actually save the data  
    $allowed = array(  
        'a' => array( // on allow a tags  
            'href' => array() // and those anchors can only have href attribute  
        )  
    );  
  
    // Make sure your data is set before trying to save it  
    if( isset( $_POST['slide-link'] ) )  
        update_post_meta( $post_id, 'slide-link', wp_kses( $_POST['slide-link'], $allowed ) );

    if( isset( $_POST['youtube-id'] ) )  
        update_post_meta( $post_id, 'youtube-id', wp_kses( $_POST['youtube-id'], $allowed ) );
    
    if( isset( $_POST['vimeo-id'] ) )  
        update_post_meta( $post_id, 'vimeo-id', wp_kses( $_POST['vimeo-id'], $allowed ) );
    
    if( isset( $_POST['caption-text'] ) )  
        update_post_meta( $post_id, 'caption-text', wp_kses( $_POST['caption-text'], $allowed ) );

}


function page_meta_box_save( $post_id )  
{  
    // Bail if we're doing an auto save  
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return; 
 
    // if our nonce isn't there, or we can't verify it, bail 
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'page_meta_box_nonce' ) ) return; 
 
    // if our current user can't edit this post, bail  
    if( !current_user_can( 'edit_post' ) ) return;  
  
    // now we can actually save the data  
    $allowed = array(  
        'a' => array( // on allow a tags  
            'href' => array() // and those anchors can only have href attribute  
        )  
    );  
  
    // Make sure your data is set before trying to save it
    if( isset( $_POST['page-tagline'] ) )  
        update_post_meta( $post_id, 'page-tagline', wp_kses( $_POST['page-tagline'], $allowed ) );

    if( isset( $_POST['youtube-id'] ) )  
        update_post_meta( $post_id, 'youtube-id', wp_kses( $_POST['youtube-id'], $allowed ) );
    
    if( isset( $_POST['vimeo-id'] ) )  
        update_post_meta( $post_id, 'vimeo-id', wp_kses( $_POST['vimeo-id'], $allowed ) );
    
    if( isset( $_POST['m4v-url'] ) )  
        update_post_meta( $post_id, 'm4v-url', wp_kses( $_POST['m4v-url'], $allowed ) );
    
    if( isset( $_POST['ogv-url'] ) )  
        update_post_meta( $post_id, 'ogv-url', wp_kses( $_POST['ogv-url'], $allowed ) );
    
    if( isset( $_POST['audio-url'] ) )  
        update_post_meta( $post_id, 'audio-url', wp_kses( $_POST['audio-url'], $allowed ) );  
    
    if( isset( $_POST['audio-name'] ) )  
        update_post_meta( $post_id, 'audio-name', wp_kses( $_POST['audio-name'], $allowed ) );  
}

function page_meta_box_two_save( $post_id )  
{  
    // Bail if we're doing an auto save  
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return; 
 
    // if our nonce isn't there, or we can't verify it, bail 
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'page_meta_box_two_nonce' ) ) return; 
 
    // if our current user can't edit this post, bail  
    if( !current_user_can( 'edit_post' ) ) return;  
  
    // now we can actually save the data  
    $allowed = array(  
        'a' => array( // on allow a tags  
            'href' => array() // and those anchors can only have href attribute  
        )  
    );  
  
    // Make sure your data is set before trying to save it
    if( isset( $_POST['page-tagline'] ) )  
        update_post_meta( $post_id, 'page-tagline', wp_kses( $_POST['page-tagline'], $allowed ) );

}

/* SHORTCODE FUNCTIONS
================================================== */

function ab_formatter($content) {
    $new_content = '';

    /* Matches the contents and the open and closing tags */
    $pattern_full = '{(\[raw\].*?\[/raw\])}is';

    /* Matches just the contents */
    $pattern_contents = '{\[raw\](.*?)\[/raw\]}is';

    /* Divide content into pieces */
    $pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);

    /* Loop over pieces */
    foreach ($pieces as $piece) {
        /* Look for presence of the shortcode */
        if (preg_match($pattern_contents, $piece, $matches)) {

            /* Append to content (no formatting) */
            $new_content .= $matches[1];
        } else {

            /* Format and append to content */
            $new_content .= wptexturize(wpautop($piece));
        }
    }

    return $new_content;
}

// Remove the 2 main auto-formatters
remove_filter('the_content', 'wpautop');
remove_filter('the_content', 'wptexturize');

// Before displaying for viewing, apply this function
add_filter('the_content', 'ab_formatter', 99);
add_filter('widget_text', 'ab_formatter', 99);


/* CUSTOM MENU SETUP
================================================== */

add_action( 'after_setup_theme', 'setup_menus' );
function setup_menus() {
	// This theme uses wp_nav_menu() in four locations.
	register_nav_menus( array(
	'Main_Navigation' => __( 'Main Menu' )
	) );
}
add_filter('nav_menu_css_class', 'mbudm_add_page_type_to_menu', 10, 2 );
//If a menu item is a page then add the template name to it as a css class 
function mbudm_add_page_type_to_menu($classes, $item) {
    if($item->object == 'page'){
        $template_name = get_post_meta( $item->object_id, '_wp_page_template', true );
        $new_class =str_replace(".php","",$template_name);
        array_push($classes, $new_class);
    }   
    return $classes;
}


/* CUSTOM POST TYPES ARCHIVES
================================================== */

add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
  if(is_category() || is_tag()) {
    $post_type = get_query_var('post_type');
    if($post_type)
        $post_type = $post_type;
    else
        $post_type = array('nav_menu_item','post','portfolio');
    $query->set('post_type',$post_type);
    return $query;
    }
}


/* EXCERPT
================================================== */

function new_excerpt_length($length) {
    return 60;
}
add_filter('excerpt_length', 'new_excerpt_length');

// Blog Widget Excerpt
function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt).'';
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
    }

    function content($limit) {
      $content = explode(' ', get_the_content(), $limit);
      if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
      } else {
        $content = implode(" ",$content).'';
      } 
      $content = preg_replace('/\[.+\]/','', $content);
      $content = apply_filters('the_content', $content); 
      $content = str_replace(']]>', ']]&gt;', $content);
      return $content;
}


/* REGISTER SIDEBARS
================================================== */

if ( function_exists('register_sidebar')) {
    register_sidebar(array(
        'name'=>'Default Sidebar',
        'before_widget' => '<section id="%1$s" class="widget %2$s clearfix">',
        'after_widget' => '</section>',
        'before_title' => '<div class="widget-heading clearfix"><h4>',
        'after_title' => '</h4></div>',
    ));
	register_sidebar(array(
		'name'=>'Blog Sidebar',
		'before_widget' => '<section id="%1$s" class="widget %2$s clearfix">',
		'after_widget' => '</section>',
		'before_title' => '<div class="widget-heading clearfix"><h4>',
		'after_title' => '</h4></div>',
	));
	register_sidebar(array(
		'name'=>'Category Sidebar',
		'before_widget' => '<section id="%1$s" class="widget %2$s clearfix">',
		'after_widget' => '</section>',
		'before_title' => '<div class="widget-heading clearfix"><h4>',
		'after_title' => '</h4></div>',
	));
    register_sidebar(array(
        'name'=>'Contact Sidebar',
        'before_widget' => '<section id="%1$s" class="widget %2$s clearfix">',
        'after_widget' => '</section>',
        'before_title' => '<div class="widget-heading clearfix"><h4>',
        'after_title' => '</h4></div>',
    ));

    register_sidebar(array(
        'name'=>'Spa Sidebar',
        'before_widget' => '<section id="%1$s" class="widget %2$s clearfix">',
        'after_widget' => '</section>',
        'before_title' => '<div class="widget-heading clearfix"><h4>',
        'after_title' => '</h4></div>',
    ));
    register_sidebar(array(
        'name'=>'Footer Column 1',
        'before_widget' => '<section id="%1$s" class="widget %2$s clearfix">',
        'after_widget' => '</section>',
        'before_title' => '<div class="widget-heading clearfix"><h4>',
        'after_title' => '</h4></div>',
    ));
    register_sidebar(array(
        'name'=>'Footer Column 2',
        'before_widget' => '<section id="%1$s" class="widget %2$s clearfix">',
        'after_widget' => '</section>',
        'before_title' => '<div class="widget-heading clearfix"><h4>',
        'after_title' => '</h4></div>',
    ));
    register_sidebar(array(
        'name'=>'Footer Column 3',
        'before_widget' => '<section id="%1$s" class="widget %2$s clearfix">',
        'after_widget' => '</section>',
        'before_title' => '<div class="widget-heading clearfix"><h4>',
        'after_title' => '</h4></div>',
    ));
    register_sidebar(array(
        'name'=>'Footer Column 4',
        'before_widget' => '<section id="%1$s" class="widget %2$s clearfix">',
        'after_widget' => '</section>',
        'before_title' => '<div class="widget-heading clearfix"><h4>',
        'after_title' => '</h4></div>',
    ));
} 


/* ADD SHORTCODE FUNCTIONALITY TO WIDGETS
================================================== */

add_filter('widget_text', 'do_shortcode');


/* CHECK PAGE TEMPLATE
================================================== */

add_filter( 'template_include', 'var_template_include', 1000 );
function var_template_include( $t ){
    $GLOBALS['current_theme_template'] = basename($t);
    return $t;
}

function get_current_template( $echo = false ) {
    if( !isset( $GLOBALS['current_theme_template'] ) )
        return false;
    if( $echo )
        echo $GLOBALS['current_theme_template'];
    else
        return $GLOBALS['current_theme_template'];
}


/* NAVIGATION CHECK
================================================== */

//functions tell whether there are previous or next 'pages' from the current page
//returns 0 if no 'page' exists, returns a number > 0 if 'page' does exist
//ob_ functions are used to suppress the previous_posts_link() and next_posts_link() from printing their output to the screen

function has_previous_posts() {
ob_start();
previous_posts_link();
$result = strlen(ob_get_contents());
ob_end_clean();
return $result;
}

function has_next_posts() {
ob_start();
next_posts_link();
$result = strlen(ob_get_contents());
ob_end_clean();
return $result;
}


/* REMOVE CERTAIN HEAD TAGS
================================================== */

add_action('init', 'remheadlink');
function remheadlink() {
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
}


/* CUSTOM LOGIN LOGO
================================================== */

function my_custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url('.get_bloginfo('template_directory').'/images/custom-login-logo.png) !important; height: 120px!important; }
    </style>';
}

add_action('login_head', 'my_custom_login_logo');


/* COMMENTS
================================================== */

// Custom callback to list comments in the your-theme style
function custom_comments($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment;
    $GLOBALS['comment_depth'] = $depth;
  ?>
    <li id="comment-<?php comment_ID() ?>" <?php comment_class('clearfix') ?>>
        <div class="comment-wrap">
            <a class="comment-avatar"><?php if(function_exists('get_avatar')) { echo get_avatar($comment, '50'); } ?></a>
    		<div class="comment-content">
                <div class="avatar-arrow"></div>
            	<div class="comment-meta"><?php printf(__('<a href="%2$s" class="author-link" title="Permalink to this comment">Posted by %1$s</a>', 'swiftframework'),
                        get_comment_author(),
                        '#comment-' . get_comment_ID() );
                        edit_comment_link(__('Edit', 'swiftframework'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?>
    			</div>
      			<?php if ($comment->comment_approved == '0') _e("\t\t\t\t\t<span class='unapproved'>Your comment is awaiting moderation.</span>\n", 'swiftframework') ?>
            	<div class="comment-body">
                	<?php comment_text() ?>
            	</div>
            	<?php // echo the comment reply link
                	if($args['type'] == 'all' || get_comment_type() == 'comment') :
                    	comment_reply_link(array_merge($args, array(
                        	'reply_text' => __('Reply','swiftframework'),
                        	'login_text' => __('Log in to reply.','swiftframework'),
                        	'depth' => $depth,
                        	'before' => '<div class="comment-reply">',
                        	'after' => '</div>'
                    	)));
                	endif;
            	?>
    		</div>
        </div>
<?php } // end custom_comments

// Custom callback to list pings
function custom_pings($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment;
        ?>
            <li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
                <div class="comment-author"><?php printf(__('By %1$s on %2$s at %3$s', 'swiftframework'),
                        get_comment_author_link(),
                        get_comment_date(),
                        get_comment_time() );
                        edit_comment_link(__('Edit', 'swiftframework'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div>
    <?php if ($comment->comment_approved == '0') _e('\t\t\t\t\t<span class="unapproved">Your trackback is awaiting moderation.</span>\n', 'your-theme') ?>
            <div class="comment-content">
                <?php comment_text() ?>
            </div>
<?php } // end custom_pings

// Boutique Custom Post Type
add_action( 'init', 'register_cpt_boutique' );
function register_cpt_boutique() {
    $labels = array( 
        'name' => _x( 'Boutique', 'boutique' ),
        'singular_name' => _x( 'Boutique', 'boutique' ),
        'add_new' => _x( 'Add New', 'boutique' ),
        'add_new_item' => _x( 'Add New Boutique', 'boutique' ),
        'edit_item' => _x( 'Edit Boutique', 'boutique' ),
        'new_item' => _x( 'New Boutique', 'boutique' ),
        'view_item' => _x( 'View Boutique', 'boutique' ),
        'search_items' => _x( 'Search Boutique', 'boutique' ),
        'not_found' => _x( 'No boutique found', 'boutique' ),
        'not_found_in_trash' => _x( 'No boutique found in Trash', 'boutique' ),
        'parent_item_colon' => _x( 'Parent Boutique:', 'boutique' ),
        'menu_name' => _x( 'Boutique', 'boutique' ),
    );
    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        'description' => 'Custom post type',
        'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5, 
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
    register_post_type( 'boutique', $args );
}

?>



<?php
function my_connection_types() {
	p2p_register_connection_type( array(
		'name' => 'Boutique',
		'from' => 'boutique',
		'to' => 'boutique',
		'reciprocal' => true
	) );
}
add_action( 'p2p_init', 'my_connection_types' );

function im_short_excerpt($excerpt,$length) {
	if (!$length) { $length=25;}
	
	 $words = explode(' ', $excerpt, ($length + 1));
	 if(count($words) > $length)
	  array_pop($words);
	 return implode(' ', $words);
}

//Add extra functionality
require_once( 'spas/spa-functions.php');

// order region archive by title
add_filter('pre_get_posts', 'im_order_region_archive_by_title');
function im_order_region_archive_by_title($query) {
	if ($query->is_tax('region')) {
		$query->set('nopaging', true);
		$query->set('orderby', 'menu_order title');
		$query->set('order', 'ASC');
	}
	return $query;
}//im_order_region_archive_by_title
?>