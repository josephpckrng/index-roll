<?php

add_theme_support('custom-logo');
add_theme_support('title-tag');
add_theme_support('post-thumbnails');



add_action('wp_enqueue_scripts', 'enqueue_style_scripts');
function enqueue_style_scripts() {
   wp_deregister_script('jquery');
    wp_enqueue_style('style', get_stylesheet_uri());
}

function my_enqueue_scripts() {
    // Enqueue your custom scripts.js file
    wp_enqueue_script('my-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(), null, true);
}

add_action('wp_enqueue_scripts', 'my_enqueue_scripts');



