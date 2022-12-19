
<?php
get_header();
?>
<?php ?>

<div class="container">
    <div class="row justify-content-center">

       <?php

        // проверяем есть ли посты в глобальном запросе - переменная $wp_query
        if( have_posts() ){
            // перебираем все имеющиеся посты и выводим их
            while( have_posts() ){
                the_post();
                get_template_part('post', 'content');
            }
            ?>

            <div class="navigation">
                <div class="next-posts"><?php next_posts_link(); ?></div>
                <div class="prev-posts"><?php previous_posts_link(); ?></div>
            </div>

            <?php
        }
        // постов нет
        else {
            echo "<h2>Записей нет.</h2>";
        }


        ?>
    </div>
</div>
<?php get_footer();?>;
