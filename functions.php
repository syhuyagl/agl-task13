<?php
define('THEME_URL', get_stylesheet_directory());
define('CORE', THEME_URL . "/core");


require_once(CORE . "/init.php");

if (!isset($content_width)) {
    $content_width = 620;
}

if (!function_exists('basic_theme_setup')) {
    function basic_theme_setup()
    {
        $language_folder = THEME_URL . '/languages';
        load_theme_textdomain('basic', $language_folder);
        add_theme_support('automatic-feed-links');
        add_theme_support('post-thumbnails');
        add_theme_support('post-formats', array('image', 'video', 'gallary', 'quote', 'link'));
        add_theme_support('title-tag');
        $default_color = array('default-color' => '#cccccc');
        add_theme_support('custom-background', $default_color);
        register_nav_menus(
            array(
                'primary' => __('Primary Menu', 'basic'),
                'secondary' => __('Secondary Menu', 'basic'),
                'footer' => __('Footer Menu', 'basic')
            )
        );
        register_nav_menu('primary-menu', __('Primary Menu', 'basic'));
    }
    add_action('init', 'basic_theme_setup');
}
if (!function_exists('basic_menu')) {
    function basic_menu($slug)
    {
        $menu = array(
            'theme_location' => $slug,
            'menu_class' => $slug,
            'container' => 'nav',
            'container_class' => 'c-gnav',
        );
        wp_nav_menu($menu);
    }
}
if (!function_exists('basic_footermenu')) {
    function basic_footermenu($slug)
    {
        $menu = array(
            'theme_location' => $slug,
            'container' => 'ul',
            'menu_class' => $slug,
            'container_class' => $slug
        );
        wp_nav_menu($menu);
    }
}
// add_filter('nav_menu_css_class', 'special_nav_class', 10, 2);

function add_css()
{
    wp_register_style('reset', get_template_directory_uri() . '/css/reset.css', false, '1.1', 'all');
    wp_enqueue_style('reset');
    wp_register_style('style', get_template_directory_uri() . '/style.css', false, '1.1', 'all');
    wp_enqueue_style('style');

    $style = ".c-gnav li:before { content: url('{theme_url}/img/menu_00.png'); }";
    $style .= ".c-gnav li:last-child:after { content: url('{theme_url}/img/menu_00.png'); }";
    $data = str_replace('{theme_url}', get_template_directory_uri(), $style);

    wp_add_inline_style('style', $data);
}
add_action('wp_enqueue_scripts', 'add_css');
function add_script()
{
    wp_register_script('main', get_template_directory_uri() . '/js/common.js', array('jquery'), 1.1, true);
    wp_register_script('select', get_template_directory_uri() . '/js/select.js', array('jquery'), 1.1, true);
    wp_enqueue_script('main');
    wp_enqueue_script('select');
}
add_action('wp_enqueue_scripts', 'add_script');
function add_my_style()
{

    wp_enqueue_script('my_style', get_template_directory_uri() . '/mystyle.css');
}
if (function_exists('acf_add_options_page')) {

    acf_add_options_page();
    acf_add_options_page(
        array(
            'page_title' => 'Theme General Settings',
            'menu_title' => 'Theme Settings',
            'menu_slug' => 'theme-general-settings',
            'capability' => 'edit_posts',
            'redirect' => false
        )
    );

    acf_add_options_sub_page(
        array(
            'page_title' => 'Theme Header Settings',
            'menu_title' => 'Header',
            'parent_slug' => 'theme-general-settings',
        )
    );

    acf_add_options_sub_page(
        array(
            'page_title' => 'Theme Footer Settings',
            'menu_title' => 'Footer',
            'parent_slug' => 'theme-general-settings',
        )
    );
}
add_theme_support('title-tag');

add_filter('document_title_parts', 'orweb_custom_title');
function orweb_custom_title($title)
{
    if (!is_singular())
        return $title;
    $custom_title = trim(get_field('title', get_the_id()));
    if (!empty($custom_title)) {
        $custom_title = esc_html($custom_title);
        $title['title'] = $custom_title;
        $title['site'] = '';
    }
    return $title;
}
function custom_pagination($pages = '', $range = 2, $topics)
{
    $showitems = ($range * 2) + 1;

    global $paged;
    if (empty($paged))
        $paged = 1;
    if ($pages == '') {
        $pages = $topics->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }

    if (1 != $pages) {
        if ($paged > 1)
            echo "<a class='prev' href='" . get_pagenum_link($paged - 1) . "'></a>";

        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                echo ($paged == $i) ? "<span class='current'>" . $i . "</span>" : "<a href='" . get_pagenum_link($i) . "' class='inactive' >" . $i . "</a>";
            }
        }

        if ($paged < $pages)
            echo "<a class='next' href='" . get_pagenum_link($paged + 1) . "'></a>";
    }
}
add_action('wp_ajax_call_post', 'call_post_init');
add_action('wp_ajax_nopriv_call_post', 'call_post_init');
function call_post_init()
{
    $choices = $_POST['choices'];
    $args = array('post_type' => 'post', 'category__in' => (int)$choices['term_id'], 'posts_per_page' => '5');
    $query = new WP_Query($args);
    if ($query->have_posts()) :
        while ($query->have_posts()) :
            $query->the_post();
            get_template_part('template-parts/content', 'filter', $args);
        endwhile;
        wp_reset_query();
    else :
        wp_send_json($query->posts);
    endif;
    die();
}
