<?php
// Adding Stylesheet both parent and child theme

function load_theme_stylesheet()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'load_theme_stylesheet');
//Habilitar modo oscuro del editor
add_theme_support('editor-styles');
add_theme_support('dark-editor-style');
