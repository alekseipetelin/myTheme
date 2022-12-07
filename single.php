<?php get_header(); ?>
    <a href="<?php echo get_home_url();?>">Ссылка на главную страницу</a>

<?php
// проверяем есть ли посты в глобальном запросе - переменная $wp_query
if( have_posts() ){
	// перебираем все имеющиеся посты и выводим их
	while( have_posts() ){
		the_post();
		?>

		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <?php the_content(); ?>
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
<?php get_footer();?>;
