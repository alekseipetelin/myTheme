<?php

add_theme_support( 'post-thumbnails' );//включаем поддержку миниатюр записи

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

// в конце цитаты выводим ссылку "Читать дальше":
add_filter( 'excerpt_more', 'new_excerpt_more' );
function new_excerpt_more( $more ){
    global $post;
    return '<a href="'. get_permalink($post) . '">Читать дальше...</a>';
};

// уменьшаем размер цитаты до 20 слов "Читать дальше":
add_filter( 'excerpt_length', function(){
    return 20;
} );
// Функция проверки наличия изображения у записи:
function if_no_thumbnai(){
    global $post;
    if (has_post_thumbnail() ){
        echo get_the_post_thumbnail($post->ID, 'thumbnail');
    } else {

        echo '<img src="'. get_template_directory_uri() .'/img/none_img.jpg" height="150">';


    }
}
//Функция вывода автора записи:

function author_post() {
//    $id_author = get_the_author_meta('ID');
//    $name_author = get_the_userdata($id_author);
    $first_name = get_the_author_meta('first_name');
    $last_name = get_the_author_meta('last_name');
    echo '<p> Автор записи: '.$first_name.' '.$last_name. '</p>';
}

## Удаляет "Рубрика: ", "Метка: " и т.д. из заголовка архива
add_filter( 'get_the_archive_title', function( $title ){
    return preg_replace('~^[^:]+: ~', '', $title );
});
//Цикл вывода записей
function while_post()
{

    if (have_posts()) {
        // перебираем все имеющиеся посты и выводим их
        while (have_posts()) {
            the_post();
            get_template_part('post', 'content');
        }


        echo '<div class="navigation">';
        echo '<div class="next-posts">' . next_posts_link() . '</div>';
        echo '<div class="prev-posts">' . previous_posts_link() . '></div>';
        echo '</div>';


    } // постов нет
    else {
        echo "<h2>Записей нет.</h2>";
    }
}



