<?php
?>
    <div class="col-4">
        <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
            <?php if_no_thumbnai(); ?>
            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <p>Категории: <?php the_category(', '); ?></p>
            <p>Пост опубликован:  <?php the_time('d.m.y. в H:i');?></p>

            <p> <?php author_post();?></p>

            <?php the_excerpt(); ?>
        </div>
    </div>
<?php