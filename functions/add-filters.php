<?php
// уменьшаем размер цитаты до 20 слов "Читать дальше":
add_filter( 'excerpt_length', function(){
    return 20;
} );

## Удаляет "Рубрика: ", "Метка: " и т.д. из заголовка архива
add_filter( 'get_the_archive_title', function( $title ){
    return preg_replace('~^[^:]+: ~', '', $title );
});

// в конце цитаты выводим ссылку "Читать дальше":
add_filter( 'excerpt_more', 'new_excerpt_more' );
function new_excerpt_more( $more ){
    global $post;
    return '<a href="'. get_permalink($post) . '">Читать далее...</a>';
};