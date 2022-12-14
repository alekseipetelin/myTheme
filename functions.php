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
//заменяем classes <li> по умолчанию wp на наш class
add_filter( 'nav_menu_css_class', 'add_my_class_to_nav_menu', 10, 2 );
function add_my_class_to_nav_menu( $classes, $item ){

    $classes = ['nav-item'];

    return $classes;
}
// удаляем id у тега li
add_filter( 'nav_menu_item_id', '__return_empty_string' );


function add_menu_link_class($atts, $item, $args ) {
    if (property_exists($args,'link_class')){
        $atts['class'] = $args->link_class;
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_link_class', 1, 3);

// Добавляем классы ссылкам
add_filter( 'nav_menu_link_attributes', 'filter_nav_menu_link_attributes', 10, 4 );
function filter_nav_menu_link_attributes( $atts, $item, $args, $depth ) {

    if ( $item->current ) {
        $class = 'active';
        $atts['class'] = isset( $atts['class'] ) ? "{$atts['class']} $class" : $class;
    }

    return $atts;
}
?>
