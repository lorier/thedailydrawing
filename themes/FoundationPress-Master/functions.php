<?php
/*
----------------------------------------------
LR - Add custom post types to ARchive page
----------------------------------------------
 */
function add_post_types($query) {
  if ( $query->is_archive() && $query->is_main_query() ) {
      $query->set('post_type', array( 'post', 'dailies' ) );
  }
}

add_action('pre_get_posts','add_post_types');



/*
---------------------------------------------
LR Add custom post types to main RSS feed.
---------------------------------------------
*/ 
function mycustomfeed_cpt_feed( $query ) {
        if ( $query->is_feed() )
            $query->set( 'post_type', array( 'post', 'dailies' ) ); 
        return $query;
}
add_filter( 'pre_get_posts', 'mycustomfeed_cpt_feed' );


/*
---------------------------------------------
LR New Dailies Post Type
---------------------------------------------
*/
/* - create the new post type -*/

add_action( 'init', 'create_posttype' );
function create_posttype() {
  register_post_type( 'dailies',
    array(
      'labels' => array(
        'name' => __( 'Dailies' ),
        'singular_name' => __( 'Daily' )
      ),
      'menu-position' => 5,
      'taxonomies' => array('category', 'post_tag'), 
      'supports' => array('title','editor', 'comments', 'post-formats', 'thumbnail', 'revisions'),
      'public' => true,
      'has_archive' => true)
  );
}
// Show posts of 'post', 'page' and 'movie' post types on home page
add_action( 'pre_get_posts', 'add_my_post_types_to_query' );

function add_my_post_types_to_query( $query ) {
  if ( is_home() && $query->is_main_query() )
    $query->set( 'post_type', array( 'post', 'dailies' ) );
  return $query;
}
/*
---------------------------------------------
LR Remove <br> from shortcoded content
Adapted from http://charlesforster.com/shortcodes-and-line-breaks-in-wordpress/
---------------------------------------------
*/
function parse_shortcode_content( $content ) { 
 
    /* Parse nested shortcodes */ 
    $content = trim(do_shortcode( $content ) ); 
 
    /* Remove any instances of '<p></p>'. */ 
    $content = str_replace( array( '<p></p>' ), '', $content ); 
     /* Remove any instances of 'br'. */ 
    $content = str_replace( array( '<br />' ), '', $content ); 

    return $content; 
} 

/*
---------------------------------------------
LR Added shortcodes
---------------------------------------------
*/

// illustration page grid

function add_illustration_row( $atts, $content = null){
	return do_shortcode(parse_shortcode_content($content));
}
add_shortcode( 'illustration_row', 'add_illustration_row' );

function add_illustration_panel($atts, $content = null){
	$a = shortcode_atts( array(
		 	'image' => '',
		 	'description' => ''
		), $atts);
	$uploads = wp_upload_dir();
	$basedir = $uploads['baseurl'];
	$imageurl = $basedir.'/'.$a['image'];

	$content = 
	'<div class="outer-block panel" >
			<div class="inner-block" >
				<a href="'.$imageurl.'" rel="lightbox">
					<img src="'.$basedir.'/'.$a['image'].'" alt=""/> 
				</a>
			</div>
			<div class="info">
				<h5>'.$a['description'].'</h5>
			</div>
		</div>';
	return $content;
}

add_shortcode( 'illustration_panel', 'add_illustration_panel' );


// PAGE STORE GRID

function add_grid_row( $atts, $content = null){
	// $a = shortcode_atts();
	return '<div class="shop-grid row" >'.do_shortcode(parse_shortcode_content($content)).'</div>
		<div style="clear:left"></div>';
}
add_shortcode( 'grid', 'add_grid_row' );

function add_panel($atts, $content = null){
	$a = shortcode_atts( array(
			'title' => '',
		 	'image' => '',
		 	'description' => '',
		 	'shop_single_link' => ''
		), $atts);
	$url = home_url();
	$dir = get_template_directory_uri();
	return
		'<div class="large-3 medium-6 columns" >
			<div class="panel" >
				<a href="'. $url.'/'. esc_attr($a['shop_single_link']).'">
					<img src="'.$dir.'/assets/img/'.$a['image'].'" alt=""/> 
					</a>
				<div class="info">
					<h4>'.$a['title'].'</h4>
					<p>'.$a['description'].'</p>
					<a href="'.$url.'/'.$a['shop_single_link'].'">View Details</a>
					<div class="social"></div>
				</div>
			</div>
		</div>';
}

add_shortcode( 'panel', 'add_panel' );



//	PAGE STORE SINGLE
// [shop linkname="retail_outlet" url="url"]
function add_shopping_link( $atts ){
	$a = shortcode_atts( array(
			'linkname' => '',
			'url' =>''), $atts
		);
	return '<button class="button"><a target="_blank" href="'.esc_attr($a['url']).'">'.esc_attr($a['linkname']).'</a></button>';
}
add_shortcode( 'shop', 'add_shopping_link' );

/*
---------------------------------------------
End LR Functions
---------------------------------------------
*/


/*
Author: Ole Fredrik Lie
URL: http://olefredrik.com
*/


// Various clean up functions
require_once('library/cleanup.php'); 

// Required for Foundation to work properly
require_once('library/foundation.php');

// Register all navigation menus
require_once('library/navigation.php');

// Add menu walker
require_once('library/menu-walker.php');

// Create widget areas in sidebar and footer
require_once('library/widget-areas.php');

// Return entry meta information for posts
require_once('library/entry-meta.php');

// Enqueue scripts
require_once('library/enqueue-scripts.php');

// Add theme support
require_once('library/theme-support.php');

?>
<?php
/**
 * Improves the caption shortcode with HTML5 figure & figcaption; microdata & wai-aria attributes
 * 
 * @param  string $val     Empty
 * @param  array  $attr    Shortcode attributes
 * @param  string $content Shortcode content
 * @return string          Shortcode output
 */
function jk_img_caption_shortcode_filter($val, $attr, $content = null)
{
	extract(shortcode_atts(array(
		'id'      => '',
		'align'   => 'aligncenter',
		'width'   => '',
		'caption' => ''
	), $attr));
	
	// No caption, no dice... But why width? 
	if ( 1 > (int) $width || empty($caption) )
		return $val;
 
	if ( $id )
		$id = esc_attr( $id );
     
	// Add itemprop="contentURL" to image - Ugly hack
	$content = str_replace('<img', '<img itemprop="contentURL"', $content);

	return '<figure id="' . $id . '" aria-describedby="figcaption_' . $id . '" class="wp-caption ' . esc_attr($align) . '" itemscope itemtype="http://schema.org/ImageObject" style="width: ' . (0 + (int) $width) . 'px">' . do_shortcode( $content ) . '<figcaption id="figcaption_'. $id . '" class="wp-caption-text" itemprop="description">' . $caption . '</figcaption></figure>';
}
add_filter( 'img_caption_shortcode', 'jk_img_caption_shortcode_filter', 10, 3 );
?>
<?php
	// Register Custom Post Type
function custom_post_type() {

	$labels = array(
		'name'                => _x( 'SEO Friendly', 'Post Type General', 'text_domain' ),
		'singular_name'       => _x( 'SEO Friendly ', 'Post Type Singular', 'text_domain' ),
		'menu_name'           => __( 'Post Type', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Items', 'text_domain' ),
		'view_item'           => __( 'View Item', 'text_domain' ),
		'add_new_item'        => __( 'Add New Item', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Item', 'text_domain' ),
		'update_item'         => __( 'Update Item', 'text_domain' ),
		'search_items'        => __( 'Search Item', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'seo_friendly_post_type', 'text_domain' ),
		'description'         => __( 'Moving the Day number to metadata', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'comments', 'trackbacks', 'revisions', 'custom-fields', ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'seo_friendly', $args );

}

// Hook into the 'init' action
// add_action( 'init', 'custom_post_type', 0 );
?>
<?php

///// http://codex.wordpress.org/Function_Reference/add_meta_box#Examples


/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function myplugin_add_meta_box() {

	$screens = array( 'dailies', 'page' );

	foreach ( $screens as $screen ) {

		add_meta_box(
			'myplugin_sectionid',
			__( 'Which Day is This?', 'myplugin_textdomain' ),
			'myplugin_meta_box_callback',
			$screen
		);
	}
}
add_action( 'add_meta_boxes', 'myplugin_add_meta_box' );

/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function myplugin_meta_box_callback( $post ) {

	// Add an nonce field so we can check for it later.
	wp_nonce_field( 'myplugin_meta_box', 'myplugin_meta_box_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$value = get_post_meta( $post->ID, '_day', true );

	echo '<label for="myplugin_new_field">';
	_e( 'Enter the day:', 'myplugin_textdomain' );
	echo '</label> ';
	echo '<input type="text" id="myplugin_new_field" name="myplugin_new_field" value="' . esc_attr( $value ) . '" size="25" />';
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function myplugin_save_meta_box_data( $post_id ) {

	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */

	// Check if our nonce is set.
	if ( ! isset( $_POST['myplugin_meta_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['myplugin_meta_box_nonce'], 'myplugin_meta_box' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	/* OK, it's safe for us to save the data now. */
	
	// Make sure that it is set.
	if ( ! isset( $_POST['myplugin_new_field'] ) ) {
		return;
	}

	// Sanitize user input.
	$my_data = sanitize_text_field( $_POST['myplugin_new_field'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, '_day', $my_data );
}
add_action( 'save_post', 'myplugin_save_meta_box_data' );
 ?>