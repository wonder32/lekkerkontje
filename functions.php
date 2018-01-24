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
add_action( 'init', 'theme_add_editor_styles' );



/************************************
 Assets
*************************************/
function front_assets_load() {
    if (is_admin()) return;

    /* Enqueue theme script & style */
    wp_enqueue_script( 'monsieurpress-js', get_template_directory_uri() . '/javascript/dist/scripts.js#asyncload', array('jquery'), '', true);

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

    global $prevnext, $post;

    if (!is_admin() && is_attachment()) {

        $prevnext = get_prevnext($post);
        if (isset($prevnext['next'])) {
            echo '<link rel="prerender" href="' . $prevnext['next'] . '#entry-title">';
        }
        if (isset($prevnext['previous'])) {
            echo '<link rel="prerender" href="' . $prevnext['previous'] . '#entry-title">';
        }
    }
}

/******** ****************************
 * title
 ************************************/

function lekker_kontje_title( $title, $id = null ) {

    if ( is_page('kontjes') && strpos($title, 'Kontjes') !== false ) {

    global $wp_query;

    $group = $wp_query->get('img_group');
    $tag = $wp_query->get('img_tag');

    $title .= !empty($group) ? ' - '. $group : '';
    $title .= !empty($tag) ? ' - '.$tag : '';
    }
    return $title;
}
add_filter( 'the_title', 'lekker_kontje_title', 10, 2 );