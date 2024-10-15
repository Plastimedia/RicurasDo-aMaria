<?php
/**
* Template Name: Ancho
*
*/
?>
<?php get_header(); ?>
	<?php while ( have_posts() ) : ?>		
		<?php  the_post(); ?>
		 
		<main class="">
		
			<div class="ancho">
			    <?php the_content(); ?>
		    </div>
			
		</main>
	<?php endwhile; ?>
<?php get_footer(); ?>

