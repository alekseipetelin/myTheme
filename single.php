<?php get_header(); ?>
<div class="container">

			<h1><?php the_title(); ?></h1>
            <p>Пост опубликован:  <?php the_time('d.m.y. в H:i');?></p>
<!--            <p>Автор поста: --><?php //the_author_meta('user_email');?><!--</p>-->
<!--            <p>Автор поста: --><?php //$user_email = get_the_author_meta('user_email');?><!--</p>-->


            <?php the_content(); ?>
</div>

<?php get_footer();?>;
