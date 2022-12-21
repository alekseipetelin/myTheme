<?php


//заменяем classes <li> по умолчанию wp на наш class
add_filter( 'nav_menu_css_class', 'add_my_class_to_nav_menu', 10, 2 );
function add_my_class_to_nav_menu( $classes, $item ){

    $classes = ['nav-item'];

    return $classes;
}

// удаляем id у тега li
add_filter( 'nav_menu_item_id', '__return_empty_string' );

// добавляем атрибут ссылоке
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

