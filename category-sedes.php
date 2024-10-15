<?php get_header(); ?>

<main>
	<div class="ancho">
        <h1 class="titulo_category_no_banner" style="text-align: center"><?php single_cat_title(); ?></h1>
		<?php if ( have_posts() ) : ?>
			<div class="contenedor">
				<?php while ( have_posts() ) :
				    the_post();
				?>
					<article class="category-post">
						<div class="category-post-area">
							
							<div class="post-thumbnail">
								<a href="<?php the_permalink(); ?>">
									<?php ImagenDestacadaPlas('category','entrada') ?>
								</a>
							</div>
							<h2 class="post_title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h2>
							<div class="post_body">
								<p><?php the_excerpt(); ?></p>
								<p class="readmore">
									<a href="<?php the_permalink(); ?>">Leer más</a>
								</p>
							</div>

						</div>
					</article>
				<?php endwhile; ?>
			</div>

				<?php 
				if(CONFPLAS['paginacion-entradas-en-categoria']) : 
					PginacionPlas();
				endif;
				?>

		<?php else : ?>
				<p class="nothing"><?php echo CONFPLAS['mensaje-cuando-no-hay-entradas']; ?></p>
		<?php
			endif;
			wp_reset_postdata();
		?>

	</div>
</main>
<?php get_footer(); ?>



