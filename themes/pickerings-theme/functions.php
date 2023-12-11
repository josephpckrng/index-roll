<?php

add_theme_support('custom-logo');
add_theme_support('title-tag');
add_theme_support('post-thumbnails');



add_action('wp_enqueue_scripts', 'enqueue_style_scripts');
function enqueue_style_scripts() {
   wp_deregister_script('jquery');
    wp_enqueue_style('style', get_stylesheet_uri());
}




