<?php
get_header();
?>
<?php ?>

<div class="container">
    <?php the_archive_title('<h1>Мы на странице категории: ', '</h1>') ?>
    <div class="row justify-content-center">

        <?php

        // проверяем есть ли посты в глобальном запросе - переменная $wp_query
        while_post();
        ?>
    </div>
</div>
<?php get_footer();?>;
