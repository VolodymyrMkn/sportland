<?php
if (!defined('VERSION')) {
    define('VERSION','1.0.1');
}
require_once "inc/widget.php";
require_once "inc/widget-social-links.php";
require_once "inc/widget-text.php";
require_once "inc/form-order.php";
require_once "inc/register-post-type.php";
require_once "inc/meta-box.php";
require_once "inc/likes.php";
require_once "inc/admin-slogan.php";
require_once "inc/form-register.php";
add_action('wp_enqueue_scripts', 'sportisland_scripts');
add_action('after_setup_theme', 'sportisland_configuration');
add_action('widgets_init', 'sportland_widgets');


function sportland_widgets() {
    register_widget('sportland_widget_text');
    register_widget('si_widget_social_links');
}

function sportisland_configuration () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo',array(
        'height' => 17,
        'width' => 182,
        'flex-width' => false, // true - чтобы логотип подстраивался под ширину
        'flex-height' => false, // true - чтобы логотип подстраивался под высоту
        'header-text' => 'dddddddd',
        'unlink-homepage-logo' => true,
    ));
    register_nav_menu('Header', 'Header menu');
    load_theme_textdomain('sport-island',get_template_directory() . '/locale');
}

function sportisland_scripts (){
    wp_enqueue_style('stylesheet', get_template_directory_uri(). '/./css/styles.css','',VERSION);
    wp_enqueue_style('stylesheet-main', get_stylesheet_uri(),'',VERSION);
    wp_enqueue_style('preload stylesheet', 'https://fonts.googleapis.com/css?family=Montserrat:400,500,600,800,900&display=swap&subset=cyrillic','',VERSION);
    wp_enqueue_script('js',get_template_directory_uri().'/js/js.js','',VERSION, true);
}

function print_anyarray($any_array) {
    echo '<pre>';
    print_r($any_array);
    echo '</pre>';
}