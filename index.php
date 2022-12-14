
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
                ?>
                <div class="col-4">
                    <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                        <?php
                            if (has_post_thumbnail() ){
                                echo get_the_post_thumbnail($post->ID, 'thumbnail');
                            } else {
                                ?>
                                <img src=" <?php echo get_template_directory_uri(); ?>/img/none_img.jpg" height="150">

                                <?php
                            }
                        ?>

                        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                        <?php the_excerpt(); ?>
                    </div>
                </div>
                <?php
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
