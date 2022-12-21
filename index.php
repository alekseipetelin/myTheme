<?php get_header();?>


<div class="container">
    <div class="row">
       <?php get_sidebar(); ?>
       <div class="col">
       	<div class="row justify-content-center">
       		<?php while_posts(); ?>
       	</div>
       		
       </div>
       
    </div>
</div>

<?php get_footer();?>
