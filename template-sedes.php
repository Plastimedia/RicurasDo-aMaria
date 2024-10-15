<?php
/**
* Template Name: Sedes
*
*/
?>
<?php get_header(); ?>
	<?php while ( have_posts() ) : ?>		
		<?php  the_post(); ?>
		
		<main class="mainPage" style="padding: 0;">
			<!-- <div class="ancho"> -->
				<div class="contenido">
                    <h1 style="text-align: center;">
                        <?php the_title(); ?>
                    </h1>
					<?php the_content(); ?>
				</div>
			<!-- </div> -->
			<?php endwhile; ?>
			<!-- <section class="sedes galeriadesedes">
				<div class="info">
					<h2>Galería</h2>
				</div>
				<div class="content">
					<div class="splide splide_sedes">
					<div class="splide__track">
						<ul class="splide__list">
						<?php
							// Filtro las entradas que pertenecen a la categoria actualidad
							$args = array(
								'category_name' => 'Galería Sedes',
								'showposts'     => '30'
							);
							$wp_query = new WP_Query($args);
						?>
						<?php
							// Muestro los posts
							$conta = 1;
							$conte = "";
							if (have_posts()) : ?>
							
								<?php while (have_posts()) : the_post(); ?> 
								<li class="splide__slide">
									<div class="contenido">
									<div class="thumbnail">
										
										<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
										
									</div>
									<h3 style="font-size: 1rem"><?php the_title(); ?></h3>
									<?php the_excerpt(); ?>
									<br>
									</div>
								</li> 

								<?php endwhile; ?>
							<?php endif; ?>
						</ul>
					</div>
					</div>
				</div>
			</section> -->
			<section class="contactanos">
				<div class="imagen">
					<?php
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Imagen contáctanos') ) :
					endif;
					?>
				</div>
				<div class="content">
					<?php
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Contáctanos') ) :
					endif;
					?>

				</div>
			</section>
		</main>
		<script>
			$(document).ready(function(){
				function splide_sedes(){
					if( window.matchMedia("(max-width: 500px)").matches ){
						new Splide( '.splide_sedes', {
						
						perPage: 1,
						perMove: 1,
						} ).mount();
					} else {
						if( window.matchMedia("(max-width: 900px)").matches ){
						new Splide( '.splide_sedes', {
							
							perPage: 2,
							perMove: 1,
						} ).mount();
						} else {
						if( window.matchMedia("(max-width: 1150px)").matches ){
							new Splide( '.splide_sedes', {
							
							perPage: 3,
							perMove: 1,
							// autoWidth: true,
							} ).mount();
						} else {
							new Splide( '.splide_sedes', {
							
							perPage: 4,
							perMove: 1,
							} ).mount();
						}
						}
					}
				}

				var C1 = window.matchMedia("(max-width: 500px)")
				var C2 = window.matchMedia("(max-width: 900px)")
				var C3 = window.matchMedia("(max-width: 1150px)")
				splide_sedes();
				C1.addListener(splide_sedes)
				C2.addListener(splide_sedes)
				C3.addListener(splide_sedes)
			});
		</script>
	
<?php get_footer(); ?>