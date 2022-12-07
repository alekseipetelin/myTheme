<?php

add_action( 'after_setup_theme', 'theme_register_nav_menu' );

function theme_register_nav_menu() {
    register_nav_menu( 'primary', 'Primary Menu' );
}


// правильный способ подключить стили и скрипты
add_action( 'wp_enqueue_scripts', 'my_styles' );
// add_action('wp_print_styles', 'theme_name_scripts'); // можно использовать этот хук он более поздний

function my_styles() {
wp_enqueue_style( 'style-themes', get_stylesheet_uri() );
wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css' );

wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );
wp_enqueue_script( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js' );
}
?>
