<?php

function load_assets()
{
    wp_enqueue_style("font", "//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i", array(), "1.0", "all");
    wp_enqueue_style("bootstrapcss", '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), "1.1", 'all');
    wp_enqueue_style("maincss", get_theme_file_uri() . '/build/index.css', array(), '1.0.2', 'all');
    wp_enqueue_style("mainstylecss", get_theme_file_uri() . '/build/style-index.css', array(), '1.0.3', 'all');

    wp_enqueue_script("university_scripts", get_theme_file_uri() . '/build/index.js', array('jquery'), '1.02', true);
}
add_action("wp_enqueue_scripts", "load_assets");


function add_menu()
{
    add_theme_support('menus');
    register_nav_menus(
        array(
            'themeLocationOne' => 'Footer Menu One',
            'themeLocationTwo' => 'Footer Menu Two',
            'themeLocationThree' => 'Header Menu One'
        )
    );
}

//Thêm menu vào wordpress -> footer 
add_action("init", "add_menu");



//Giới hạn ký tự muốn hiển thị của hàm excerpt 
function wpdocs_custom_excerpt_length($length)
{
    return 25;
}
add_filter('excerpt_length', 'wpdocs_custom_excerpt_length');


function custom_footer_widget_init()
{
    register_sidebar(
        array(
            'name' => 'Custom Footer Widget',
            'id' => 'custom-footer-widget',
            'description' => 'Add custom content to your footer here.',
            'before_widget' => '<div class="footer-widget">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
}
add_action('widgets_init', 'custom_footer_widget_init');

// custom type post (Event)

// Đăng ký custom post type "Events"
function custom_post_type_events()
{
    $labels = array(
        'name' => _x('Events', 'post type general name', 'your-text-domain'),
        'singular_name' => _x('Event', 'post type singular name', 'your-text-domain'),
        'menu_name' => _x('Events', 'admin menu', 'your-text-domain'),
        'name_admin_bar' => _x('Event', 'add new on admin bar', 'your-text-domain'),
        'add_new' => _x('Add New', 'event', 'your-text-domain'),
        'add_new_item' => __('Add New Event', 'your-text-domain'),
        'new_item' => __('New Event', 'your-text-domain'),
        'edit_item' => __('Edit Event', 'your-text-domain'),
        'view_item' => __('View Event', 'your-text-domain'),
        'all_items' => __('All Events', 'your-text-domain'),
        'search_items' => __('Search Events', 'your-text-domain'),
        'parent_item_colon' => __('Parent Events:', 'your-text-domain'),
        'not_found' => __('No events found.', 'your-text-domain'),
        'not_found_in_trash' => __('No events found in Trash.', 'your-text-domain')
    );

    $args = array(
        'labels' => $labels,
        'description' => __('Description.', 'your-text-domain'),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'event'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
        'taxonomies' => array('event_category'), // Sử dụng taxonomy mới tạo
    );

    register_post_type('event', $args);
}
add_action('init', 'custom_post_type_events');

// Đăng ký custom taxonomy "Event Categories"
function custom_taxonomy()
{
    $labels = array(
        'name' => _x('Event Categories', 'taxonomy general name'),
        'singular_name' => _x('Event Category', 'taxonomy singular name'),
        'search_items' => __('Search Event Categories'),
        'all_items' => __('All Event Categories'),
        'parent_item' => __('Parent Event Category'),
        'parent_item_colon' => __('Parent Event Category:'),
        'edit_item' => __('Edit Event Category'),
        'update_item' => __('Update Event Category'),
        'add_new_item' => __('Add New Event Category'),
        'new_item_name' => __('New Event Category Name'),
        'menu_name' => __('Event Categories'),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => false,
    );

    register_taxonomy('event_category', array('event'), $args);
}
add_action('init', 'custom_taxonomy', 0);
add_theme_support('post-thumbnails');
add_theme_support('post-thumbnails', array('post'));          // Posts only
add_theme_support('post-thumbnails', array('page'));          // Pages only
add_theme_support('post-thumbnails', array('post', 'movie')); // Posts and Movies
