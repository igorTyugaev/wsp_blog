<?php
/**
 * Set up theme defaults and registers support for various WordPress feaures.
 */
add_action('after_setup_theme', function () {
	load_theme_textdomain('wsp', get_theme_file_uri('languages'));

	add_theme_support('automatic-feed-links');
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	));
	add_theme_support('post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	));
	add_theme_support('custom-background', apply_filters('wsp_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	)));

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support('custom-logo', array(
		'height' => 200,
		'width' => 50,
		'flex-width' => true,
		'flex-height' => true,
	));

	register_nav_menus(array(
		'primary' => __('Primary Menu', 'wsp'),
	));
});

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
add_action('after_setup_theme', function () {
	$GLOBALS['content_width'] = apply_filters('wsp_content_width', 960);
}, 0);

/**
 * Register widget area.
 */
add_action('widgets_init', function () {
	register_sidebar(array(
		'name' => __('Sidebar', 'wsp'),
		'id' => 'sidebar-1',
		'description' => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
});

/**
 * Register nav menu area.
 */

function add_additional_class_on_li($classes, $item, $args)
{
	if (isset($args->add_li_class)) {
		$classes[] = $args->add_li_class;
	}
	return $classes;
}

function add_menu_link_class($atts, $item, $args)
{
	if (property_exists($args, 'link_class')) {
		$atts['class'] = $args->link_class;
	}
	return $atts;
}

add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);
add_filter('nav_menu_link_attributes', 'add_menu_link_class', 1, 3);

/**
 * Enqueue scripts and styles.
 */
add_action('wp_enqueue_scripts', function () {

	wp_enqueue_style('wsp-main', get_theme_file_uri('assets/css/main.css'));

	wp_enqueue_script('wsp-bundle', get_theme_file_uri('assets/js/bundle.js'), array(), null, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
});
