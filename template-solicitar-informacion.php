<?php
    /**
    * Template Name: Solicitar información
    *
    */
    ?>
<?php get_header(); ?>
	<?php while ( have_posts() ) : ?>		
		<?php  the_post(); ?>
		<main class="">
		<div class="migas">
					<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
						<?php if(function_exists('bcn_display'))
						{
							bcn_display();
						}?>
					</div> 
				</div>
			
			<?php the_content(); ?>
			
		</main>
	<?php endwhile; ?>
<?php get_footer(); ?>

