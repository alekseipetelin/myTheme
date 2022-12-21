<?php
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



//Подключаем цикл ывода записей
function while_posts() {

    if (have_posts()) {
        // перебираем все имеющиеся посты и выводим их
        while (have_posts()) {
            the_post();
            get_template_part('template/post', 'content');
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