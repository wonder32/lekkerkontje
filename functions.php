<?php
/************************************
 * Author: MANSON David
 * URL: http://www.david-manson.com
 ************************************/

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

function lekker_kontje_deregister_scripts() {
    if (!is_admin()) {
        wp_deregister_script('wp-embed');
    }
}
add_action('init', 'lekker_kontje_deregister_scripts');
/*********************
THEME INIT
*********************/
function theme_init() {
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links');
	add_theme_support( 'menus' );
    add_theme_support( 'title-tag' );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form'
	) );
}
add_action( 'after_setup_theme', 'theme_init' );



/************************************
  Oembed size option
*************************************/
if ( ! isset( $content_width ) ) {
	$content_width = 680;
}



/************************************
 Menu
*************************************/
register_nav_menus(array(
	'main-nav' => __( 'The Main Menu', 'monsieurpress' ),
	'footer-links' => __( 'Footer Links', 'monsieurpress' )
));



/************************************
 Sidebar
*************************************/
function theme_sidebars() {
	register_sidebar(array(
		'id' => 'main-sidebar',
		'name' => __( 'Main sidebar', 'monsieurpress' ),
		'description' => __( 'The main sidebar', 'monsieurpress' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
        'before_title' => '<div class="widgettitle">',
        'after_title' => '</div>'
	));
}
add_action( 'widgets_init', 'theme_sidebars' );



/************************************
 Apply theme's stylesheet to the visual editor.
*************************************/
function theme_add_editor_styles() {
    add_editor_style( get_stylesheet_uri() );
}
//add_action( 'init', 'theme_add_editor_styles' );



/************************************
 Assets
*************************************/
function front_assets_load() {
    if (is_admin()) return;

    /* Enqueue theme script & style */
    wp_enqueue_script( 'monsieurpress-js', get_template_directory_uri() . '/assets/javascript/dist/scripts.js#asyncload', array('jquery'), '', true);
	wp_enqueue_style('dashicons');
    /* Enqueue comment-reply script if needed */
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'front_assets_load' );

function prefix_add_footer_styles() {
    wp_enqueue_style( 'monsieurpress-stylesheet', get_stylesheet_uri()  );
};
add_action( 'get_footer', 'prefix_add_footer_styles' );


/********************
 *  No xml
 *********************/

function remove_wordpress_generator() {
	return '';
}
add_filter('the_generator', 'remove_wordpress_generator', 1);

/**
 * Remove jQuery migrate
 */

add_filter( 'wp_default_scripts', 'dequeue_jquery_migrate' );

function dequeue_jquery_migrate( &$scripts){
    if(!is_admin()){
        $scripts->remove( 'jquery');
        $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
    }
}

/***************************************
 Robots
 **************************************/

add_filter( 'robots_txt', 'puddinq_robots_txt_function', 30, 2 );
function puddinq_robots_txt_function( $robots_txt = '', $public = '' ) {
    /**
     * Don't do anything if the blog isn't public
     */
    if ( '0' == $public )
        return $robots_txt;

    $domain = $_SERVER['HTTP_HOST'];



    // .= adds extra's to a string, in this case $my_output
    $robots_txt .= 'User-agent: Googlebot-Image' . PHP_EOL;
    $robots_txt .= 'User-agent: *' . PHP_EOL;
    $robots_txt .= 'Disallow: /wp-content/uploads/*/*/*.gif$' . PHP_EOL;
    $robots_txt .= 'Disallow: /wp-content/uploads/*/*/*.bmp' . PHP_EOL;
    $robots_txt .= 'Disallow: /wp-content/uploads/*/*/*.gif$' . PHP_EOL;
    $robots_txt .= 'Disallow: /wp-content/uploads/*/*/*.jpg$' . PHP_EOL;
    $robots_txt .= 'Disallow: /wp-content/uploads/*/*/*.jpeg$' . PHP_EOL;
    $robots_txt .= 'Disallow: /wp-content/uploads/*/*/*.tif$' . PHP_EOL;

    return $robots_txt;
}

/************************************
 * head
 ************************************/
add_action('wp_head', 'pu_prerender');
function pu_prerender() {

    global $prevnext, $post, $lekkerKontje;

    if (!is_admin() && is_attachment()) {
		$next = $lekkerKontje->pu_adjacent_image_link(false);
        if (!empty($next)) {
            echo '<link rel="prerender" href="' . $next . '#entry-title">' . PHP_EOL;
        }
        $previous = $lekkerKontje->pu_adjacent_image_link(true);
        if (!empty($previous)) {
            echo '<link rel="prerender" href="' . $previous . '#entry-title">' . PHP_EOL;
        }
    }
}

/******** ****************************
 * title
 ************************************/

function lekker_kontje_title( $title, $id = null ) {

    if ( is_page('kontjes') && strpos($title, 'Kontjes') !== false ) {

    global $wp_query;

    $group = $wp_query->get('lka_image_group');
    $tag = $wp_query->get('lka_img_tag');

    $title .= !empty($group) ? ' - '. $group : '';
    $title .= !empty($tag) ? ' - '.$tag : '';
    }
    return $title;
}
add_filter( 'the_title', 'lekker_kontje_title', 10, 2 );

// gravity hide label
add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );


// check if metabox is there ( no white screen )

if ( ! function_exists( 'rwmb_get_value' ) ) {
	function rwmb_get_value( $key, $args = '', $post_id = null ) {
		return false;
	}
}

/* change permalink */

add_filter('wp_seo_get_bc_ancestors', 'lekker_change_kontje');

function lekker_change_kontje($links) {
	
	if ($links[0] === 71) {
		$links[0] = 47;
	}
	return $links;
}



/* Yoast schema weg */

add_filter('wpseo_json_ld_output', 'lekker_yoast_weg', 10, 2);

function lekker_yoast_weg($data, $context) {

	if ($context == 'person') {
		return;
	}

	$data = array(
		'@context' => 'https://schema.org',
		'@type' => 'WebSite',
		'url' => 'https://lekker-kontje.nl/',
		'name' => 'Lekker-kontje.nl',
	);

	if (is_front_page()) {
		$data['potentialAction'] = array(
			'@type' => 'SearchAction',
			'target' => 'https://lekker-kontje.nl/?s={s}',
			'query-input' => 'required name=s',
		);
	}

	

	return $data;
}

/* overwrite wordpress default search results*/

add_shortcode('lekker-search', 'lekker_search');

function lekker_search() {
	$form = '<form role="search" method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">
				<label>
					<span class="screen-reader-text">' . _x( 'Search for:', 'label' ) . '</span>
					<input type="search" class="search-field" placeholder="' . esc_attr_x( 'Search &hellip;', 'placeholder' ) . '" value="' . get_search_query() . '" name="s" id="search-field"/>
				</label>
				<input type="submit" class="search-submit" value="'. esc_attr_x( 'Search', 'submit button' ) .'" />
			</form>';
	return $form;
}

function rc_add_cpts_to_search($query) {


	if ( $query->is_search ) {
		$query->set( 'post_type', array( 'post', 'attachment' ) );
		$query->set( 'post_status', array( 'publish', 'inherit' ) );
//		$meta_query_args = array(
//			'relation' => 'AND', /* <-- here */
//			array(
//				'key' => 'lka_image_tag',
//				'value' => $query->query_vars['s'] = '',
//				'compare' => 'LIKE',
//			),
////			array(
////				'key' => 'lka_image_tag',
////				'value'   => array(''),
////				'compare' => 'NOT IN'
////			),
//		);
//		$query->set('meta_query', $meta_query_args);

	}

	return $query;
}
add_action( 'pre_get_posts', 'rc_add_cpts_to_search' );


/**
 * yoast image
 */
add_action( 'wpseo_opengraph', 'my_gv_wpseo_opengraph_image', 10, 1);
function my_gv_wpseo_opengraph_image( $img ) {

	if (!is_attachment()) {
		//specify here a default image
		$img = 'https://lekker-kontje.nl/wp-content/uploads/2018/02/lekker-kontje-vierkant.jpg';

		$GLOBALS['wpseo_og']->image_output( $img );
	}
}

// description

add_filter( 'wpseo_opengraph_desc', 'change_desc' );

function change_desc( $desc ) {

	// This article is actually a landing page for an eBook
	if( is_attachment() ) {
		global $lekkerKontje;
		$desc = $lekkerKontje->getDescription();
	}

	return $desc;
}

add_action('wp_head', 'lekker_meta_description');

function lekker_meta_description() {

	$description = change_desc('');

	if (!empty($description)) {
		echo '<meta name="description" content="' . $description . '" />';
	}

}