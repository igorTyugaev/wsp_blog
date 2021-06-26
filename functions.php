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

function wsp_breadcrumbs()
{
	/* === ОПЦИИ === */
	$text['home'] = '/ Все статьи'; // текст ссылки "Главная"
	$text['category'] = '%s'; // текст для страницы рубрики
	$text['search'] = 'Результаты поиска по запросу "%s"'; // текст для страницы с результатами поиска
	$text['tag'] = 'Записи с тегом "%s"'; // текст для страницы тега
	$text['author'] = 'Статьи автора %s'; // текст для страницы автора
	$text['404'] = 'Ошибка 404'; // текст для страницы 404
	$text['page'] = 'Страница %s'; // текст 'Страница N'
	$text['cpage'] = 'Страница комментариев %s'; // текст 'Страница комментариев N'

	$wrap_before = '<div class="breadcrumbs__inner" itemscope itemtype="http://schema.org/BreadcrumbList">'; // открывающий тег обертки
	$wrap_after = '</div><!-- .breadcrumbs -->'; // закрывающий тег обертки
	$sep = '<span class="breadcrumbs__item text text_color_gray-blue"> / </span>'; // разделитель между
	// "крошками"
	$before = '<span class="breadcrumbs__item text text_color_gray-blue">'; // тег перед текущей "крошкой"
	$after = '</span>'; // тег после текущей "крошки"

	$show_on_home = 1; // 1 - показывать "хлебные крошки" на главной странице, 0 - не
	// показывать
	$show_home_link = 1; // 1 - показывать ссылку "Главная", 0 - не показывать
	$show_current = 1; // 1 - показывать название текущей страницы, 0 - не показывать
	$show_last_sep = 1; // 1 - показывать последний разделитель, когда название текущей страницы не отображается, 0 - не показывать
	/* === КОНЕЦ ОПЦИЙ === */

	global $post;
	$home_url = home_url('/');
	$link = '<span class="breadcrumbs__item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
	$link .= '<a class="breadcrumbs__link text text_type_link text_color_gray-blue" href="%1$s" itemprop="item"><span itemprop="name">%2$s</span></a>';
	$link .= '<meta itemprop="position" content="%3$s" />';
	$link .= '</span>';
	$parent_id = ($post) ? $post->post_parent : '';
	$home_link = sprintf($link, $home_url, $text['home'], 1);

	if (is_home() || is_front_page()) {

		if ($show_on_home) echo $wrap_before . $home_link . $wrap_after;

	} else {

		$position = 0;

		echo $wrap_before;

		if ($show_home_link) {
			$position += 1;
			echo $home_link;
		}

		if (is_category()) {
			$parents = get_ancestors(get_query_var('cat'), 'category');
			foreach (array_reverse($parents) as $cat) {
				$position += 1;
				if ($position > 1) echo $sep;
				echo sprintf($link, get_category_link($cat), get_cat_name($cat), $position);
			}
			if (get_query_var('paged')) {
				$position += 1;
				$cat = get_query_var('cat');
				echo $sep . sprintf($link, get_category_link($cat), get_cat_name($cat), $position);
				echo $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
			} else {
				if ($show_current) {
					if ($position >= 1) echo $sep;
					echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;
				} elseif ($show_last_sep) echo $sep;
			}

		} elseif (is_search()) {
			if (get_query_var('paged')) {
				$position += 1;
				if ($show_home_link) echo $sep;
				echo sprintf($link, $home_url . '?s=' . get_search_query(), sprintf($text['search'], get_search_query()), $position);
				echo $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
			} else {
				if ($show_current) {
					if ($position >= 1) echo $sep;
					echo $before . sprintf($text['search'], get_search_query()) . $after;
				} elseif ($show_last_sep) echo $sep;
			}

		} elseif (is_year()) {
			if ($show_home_link && $show_current) echo $sep;
			if ($show_current) echo $before . get_the_time('Y') . $after;
			elseif ($show_home_link && $show_last_sep) echo $sep;

		} elseif (is_month()) {
			if ($show_home_link) echo $sep;
			$position += 1;
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'), $position);
			if ($show_current) echo $sep . $before . get_the_time('F') . $after;
			elseif ($show_last_sep) echo $sep;

		} elseif (is_day()) {
			if ($show_home_link) echo $sep;
			$position += 1;
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'), $position) . $sep;
			$position += 1;
			echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F'), $position);
			if ($show_current) echo $sep . $before . get_the_time('d') . $after;
			elseif ($show_last_sep) echo $sep;

		} elseif (is_single() && !is_attachment()) {
			if (get_post_type() != 'post') {
				$position += 1;
				$post_type = get_post_type_object(get_post_type());
				if ($position > 1) echo $sep;
				echo sprintf($link, get_post_type_archive_link($post_type->name), $post_type->labels->name, $position);
				if ($show_current) echo $sep . $before . get_the_title() . $after;
				elseif ($show_last_sep) echo $sep;
			} else {
				$cat = get_the_category();
				$catID = $cat[0]->cat_ID;
				$parents = get_ancestors($catID, 'category');
				$parents = array_reverse($parents);
				$parents[] = $catID;
				foreach ($parents as $cat) {
					$position += 1;
					if ($position > 1) echo $sep;
					echo sprintf($link, get_category_link($cat), get_cat_name($cat), $position);
				}
				if (get_query_var('cpage')) {
					$position += 1;
					echo $sep . sprintf($link, get_permalink(), get_the_title(), $position);
					echo $sep . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after;
				} else {
					if ($show_current) echo $sep . $before . get_the_title() . $after;
					elseif ($show_last_sep) echo $sep;
				}
			}

		} elseif (is_post_type_archive()) {
			$post_type = get_post_type_object(get_post_type());
			if (get_query_var('paged')) {
				$position += 1;
				if ($position > 1) echo $sep;
				echo sprintf($link, get_post_type_archive_link($post_type->name), $post_type->label, $position);
				echo $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
			} else {
				if ($show_home_link && $show_current) echo $sep;
				if ($show_current) echo $before . $post_type->label . $after;
				elseif ($show_home_link && $show_last_sep) echo $sep;
			}

		} elseif (is_attachment()) {
			$parent = get_post($parent_id);
			$cat = get_the_category($parent->ID);
			$catID = $cat[0]->cat_ID;
			$parents = get_ancestors($catID, 'category');
			$parents = array_reverse($parents);
			$parents[] = $catID;
			foreach ($parents as $cat) {
				$position += 1;
				if ($position > 1) echo $sep;
				echo sprintf($link, get_category_link($cat), get_cat_name($cat), $position);
			}
			$position += 1;
			echo $sep . sprintf($link, get_permalink($parent), $parent->post_title, $position);
			if ($show_current) echo $sep . $before . get_the_title() . $after;
			elseif ($show_last_sep) echo $sep;

		} elseif (is_page() && !$parent_id) {
			if ($show_home_link && $show_current) echo $sep;
			if ($show_current) echo $before . get_the_title() . $after;
			elseif ($show_home_link && $show_last_sep) echo $sep;

		} elseif (is_page() && $parent_id) {
			$parents = get_post_ancestors(get_the_ID());
			foreach (array_reverse($parents) as $pageID) {
				$position += 1;
				if ($position > 1) echo $sep;
				echo sprintf($link, get_page_link($pageID), get_the_title($pageID), $position);
			}
			if ($show_current) echo $sep . $before . get_the_title() . $after;
			elseif ($show_last_sep) echo $sep;

		} elseif (is_tag()) {
			if (get_query_var('paged')) {
				$position += 1;
				$tagID = get_query_var('tag_id');
				echo $sep . sprintf($link, get_tag_link($tagID), single_tag_title('', false), $position);
				echo $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
			} else {
				if ($show_home_link && $show_current) echo $sep;
				if ($show_current) echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
				elseif ($show_home_link && $show_last_sep) echo $sep;
			}

		} elseif (is_author()) {
			$author = get_userdata(get_query_var('author'));
			if (get_query_var('paged')) {
				$position += 1;
				echo $sep . sprintf($link, get_author_posts_url($author->ID), sprintf($text['author'], $author->display_name), $position);
				echo $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
			} else {
				if ($show_home_link && $show_current) echo $sep;
				if ($show_current) echo $before . sprintf($text['author'], $author->display_name) . $after;
				elseif ($show_home_link && $show_last_sep) echo $sep;
			}

		} elseif (is_404()) {
			if ($show_home_link && $show_current) echo $sep;
			if ($show_current) echo $before . $text['404'] . $after;
			elseif ($show_last_sep) echo $sep;

		} elseif (has_post_format() && !is_singular()) {
			if ($show_home_link && $show_current) echo $sep;
			echo get_post_format_string(get_post_format());
		}

		echo $wrap_after;
	}
}
