<?php
/**
* Template Name: Páginas de contenido
*
*/
?>
<?php get_header(); ?>
	<?php while ( have_posts() ) : ?>		
		<?php  the_post(); ?>
		 <div class="head-image">
			<div class="img-sec">
				<?php if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'large' );
				}else{ ?>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/fondo-full.jpg" alt="portada">
				<?php } ?>
			</div>
			<div class="page-heading">
				<h1><?php the_title(); ?></h1>
			</div>
		</div> 
		<main class="">
		
			<div class="ancho">
			    <?php the_content(); ?>
		    </div>
			
		</main>
	<?php endwhile; ?>
<?php get_footer(); ?>

