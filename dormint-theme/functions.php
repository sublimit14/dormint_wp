<?php

add_action( 'wp_enqueue_scripts', 'dormint_scripts' );
function dormint_scripts() {

    wp_enqueue_style( 'dormint-jquery-fancybox-styles', get_stylesheet_uri() . '/jquery.fancybox.min.css', array(), 1.0, true );
    wp_enqueue_style( 'dormint-swiper-styles', 'https://unpkg.com/swiper@8/swiper-bundle.min.css', array(), 1.0 );


    wp_enqueue_script( 'dormint-fancybox-js', get_template_directory_uri() . '/src/js/jquery.fancybox.min.js', array(), "", true);

    wp_enqueue_script( 'dormint-gsap-js', 'https://unpkg.co/gsap@3/dist/gsap.min.js', array(), "", true);
    wp_enqueue_script( 'dormint-gsap-scroll-js', 'https://unpkg.com/gsap@3/dist/ScrollTrigger.min.js', array(), "", true);
    wp_enqueue_script( 'dormint-swiper-js', 'https://unpkg.com/swiper@8/swiper-bundle.min.js', array(), "", true);
    wp_enqueue_script( 'dormint-tippy-js', 'https://cdnjs.cloudflare.com/ajax/libs/tippy.js/2.5.3/tippy.all.min.js', array(), "", true);
    wp_enqueue_script( 'dormint-chartjs-js', 'https://cdn.jsdelivr.net/npm/chart.js@3.8.2/dist/chart.min.js', array(), "", true);
    wp_enqueue_script( 'dormint-js', get_template_directory_uri() . '/src/js/main.js', array(), "", true);
    wp_enqueue_style( 'dormint-styles', get_stylesheet_uri(), array(), 1.0 );
}

//Support custom logo
add_theme_support( 'custom-logo' );

//Support custom menu
if (function_exists('add_theme_support')) { add_theme_support('menus'); }

//Custom post type -> "Blog"
add_action('init', 'register_post_type_join');
add_action('init', 'register_post_type_road');
add_action('init', 'register_post_type_videos');
add_action('init', 'register_post_type_people');
add_action( 'init', 'true_register_taxonomy_people' );

function register_post_type_join()
{
    register_post_type('join', [
        'label' => null,
        'labels' => [
            'name' => 'Join today',
            'singular_name' => 'Join today',
            'add_new' => 'Add string',
            'add_new_item' => 'Add string',
            'edit_item' => 'Edit string',
            'new_item' => 'New string',
            'view_item' => 'View string',
            'search_items' => 'Search string',
            'not_found' => 'String Not Found',
            'menu_name' => 'Join today',
        ],
        'description' => 'Block - Join today + make your steps count!',
        'public' => true,
        'show_in_menu' => true,
        'show_in_rest' => true,
        'rest_base' => null,
        'menu_position' => null,
        'menu_icon' => 'dashicons-universal-access',
        'hierarchical' => false,
        'supports' => [ 'title' ],
        'taxonomies' => [],
        'has_archive' => false,
        'rewrite' => false,
        'query_var' => true,

    ]);
}

function register_post_type_road()
{
    register_post_type('road', [
        'label' => null,
        'labels' => [
            'name' => 'Road map',
            'singular_name' => 'Road map',
            'add_new' => 'Add road item',
            'add_new_item' => 'Add new road item',
            'edit_item' => 'Edit road item',
            'new_item' => 'New road item',
            'view_item' => 'View road item',
            'search_items' => 'Search road item',
            'not_found' => 'Road item Not Found',
            'menu_name' => 'Road map',
        ],
        'description' => 'Block - Road map',
        'public' => true,
        'show_in_menu' => true,
        'show_in_rest' => true,
        'rest_base' => null,
        'menu_position' => null,
        'menu_icon' => 'dashicons-align-wide',
        'hierarchical' => false,
        'supports' => [ 'title' ],
        'taxonomies' => [],
        'has_archive' => false,
        'rewrite' => false,
        'query_var' => true,

    ]);
}

function register_post_type_videos()
{
    register_post_type('videos', [
        'label' => null,
        'labels' => [
            'name' => 'Videos',
            'singular_name' => 'Video',
            'add_new' => 'Add video',
            'add_new_item' => 'Add new video',
            'edit_item' => 'Edit video',
            'new_item' => 'New video',
            'view_item' => 'View video',
            'search_items' => 'Search video',
            'not_found' => 'Video Not Found',
            'menu_name' => 'Videos',
        ],
        'description' => 'Block - See Dormint in action',
        'public' => true,
        'show_in_menu' => true,
        'show_in_rest' => true,
        'rest_base' => null,
        'menu_position' => null,
        'menu_icon' => 'dashicons-video-alt3',
        'hierarchical' => false,
        'supports' => [ 'title' ],
        'taxonomies' => [],
        'has_archive' => false,
        'rewrite' => false,
        'query_var' => true,

    ]);
}

function register_post_type_people()
{
    register_post_type('people', [
        'label' => null,
        'labels' => [
            'name' => 'People',
            'singular_name' => 'People',
            'add_new' => 'Add persone',
            'add_new_item' => 'Add new persone',
            'edit_item' => 'Edit persone',
            'new_item' => 'New persone',
            'view_item' => 'View persone',
            'search_items' => 'Search persone',
            'not_found' => 'People Not Found',
            'menu_name' => 'People',
        ],
        'description' => 'Blocks - The Team and The Advisors',
        'public' => true,
        'show_in_menu' => true,
        'show_in_rest' => true,
        'rest_base' => null,
        'menu_position' => null,
        'menu_icon' => 'dashicons-groups',
        'hierarchical' => false,
        'supports' => [ 'title' ],
        'taxonomies' => [ 'group' ],
        'has_archive' => false,
        'rewrite' => false,
        'query_var' => true,

    ]);
}


function true_register_taxonomy_people() {
    $args = array(
        'labels' => array(
            'menu_name' => 'Группа'
        ),
        'public' => true,
        'hierarchical' => true,
    );
    register_taxonomy( 'group', 'people', $args );
}


add_theme_support( 'post-thumbnails');
//add_image_size( 'post-image', 500, 340, true );

/*
 * Отключение стандартных CSS в HTML-коде
 */
function my_filter_head() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}

add_action('get_header', 'my_filter_head');

/*
 * CSS для прилепления админки к нижнему краю страницы
 */
function true_move_admin_bar() {
    echo '
	<style type="text/css">
	html{margin-bottom:32px !important}
	* html body{margin-bottom:32px !important}
	#wpadminbar{top:auto !important;bottom:0}
	#wpadminbar .menupop .ab-sub-wrapper{bottom:32px;-moz-box-shadow:2px -2px 5px rgba(0,0,0,.2);-webkit-box-shadow:2px -2px 5px rgba(0,0,0,.2);box-shadow:2px -2px 5px rgba(0,0,0,.2)}
	@media screen and ( max-width:782px ){
		html{margin-bottom:46px !important}
		* html body{margin-bottom:46px !important}
		#wpadminbar{position:fixed}
		#wpadminbar .menupop .ab-sub-wrapper{bottom:46px}
	}
	</style>
	';
}

//add_action( 'admin_head', 'true_move_admin_bar' ); // в админке
add_action( 'wp_head', 'true_move_admin_bar' ); // на сайте