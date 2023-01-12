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
    wp_enqueue_script('main');
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
?>