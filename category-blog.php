<?php get_header(); ?>

<?php
// Get the current category ID, e.g. if we're on a category archive page
$category = get_category( get_query_var( 'cat' ) );
$cat_id = $category->cat_ID;
// Get the image ID for the category
$image_id = get_term_meta ( $cat_id, 'category-image-id', true );
?>

<div class=" imagen-del-blog">
	<div class="img-sec-blog">
	    <?php echo wp_get_attachment_image ( $image_id, 'full' ); ?>
	</div>
	<div class="page-heading">
		<h1><?php single_cat_title(); ?></h1>
	</div>
</div>

<main>
	<div class="ancho">
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
    <!-- productos destacados -->
    <section class="productos_destacados destacados_in_page" id="productos_destacados">
                    <div class="productos-destacados">
                        <div class="ancho">
                        <div class="info">
                            <h2><a href="http://grupoal.com.co/productos/">Nuestros productos</a></h2>
                        </div>
                        </div>
                        <div class="listado-destacados">
                        <div class="ancho">
                            <div class="splide_destacados">
                            <div class="splide__track">
                                <ul class="splide__list products">
                                
                                <?php 
                                    $ofertas = new WP_Query(array(
                                    'post_type' => array('product'),
                                    'post_status' => 'publish',
                                    'posts_per_page' => -1,
                                    'terms' => 'featured'
                                    ));
                                    if($ofertas->have_posts()):
                                    while($ofertas->have_posts()):
                                        $ofertas->the_post();
                                        global $product;
                                        ?>
                                        <li  <?php wc_product_class( 'splide__slide', $product ); ?>>
                                            <div class="producto" >
                                            <div class="content">

                                                <div class="thumbnail">
                                                <?php echo $product->get_image() ?>
                                                </div>
                                                <h3><?php echo $product->get_name() ?></h2>
                                                <div class="botones">
                                                <?php do_action('PC__wishlist_bucle'); ?>
                                                <!-- <a class="cart" href="<?php echo $product->add_to_cart_url() ?>">Añadir al carrito</a> -->
                                                <?php do_action('PS_catalogo_add_to_cart_loop'); ?>
                                                <a class="read" href="<?php echo the_permalink();  ?>">Leer más</a>
                                                </div>
                                            </div>
                                            </div>
                                        </li>
                                        <?php
                                    endwhile;
                                    wp_reset_postdata();
                                    endif;
                                ?>
                                </ul>
                            </div>
                            </div>
                        </div>
                        </div> 
                        <!-- listado destacados -->
                    </div>
                    <span class="adorno1"></span><span class="adorno2"></span>
                    </section>
                    <div class="wp-block-button" style="text-align: center"><a class="wp-block-button__link has-background" href="http://grupoal.com.co/productos/" style="background-color:#00398c"  rel="noreferrer noopener">Ver todos los productos</a></div>
                <!-- destacados -->

</main>
<script>
            $(document).ready(function(){
                function splide_destacados(){
                    if( window.matchMedia("(max-width: 500px)").matches ){
                        new Splide( '.splide_destacados', {
                        type   : 'loop',
                        perPage: 1,
                        perMove: 1,
                        } ).mount();
                    } else {
                        if( window.matchMedia("(max-width: 900px)").matches ){
                        new Splide( '.splide_destacados', {
                            type   : 'loop',
                            perPage: 2,
                            perMove: 1,
                        } ).mount();
                        } else {
                        if( window.matchMedia("(max-width: 1150px)").matches ){
                            new Splide( '.splide_destacados', {
                            type   : 'loop',
                            perPage: 3,
                            perMove: 1,
                            // autoWidth: true,
                            } ).mount();
                        } else {
                            new Splide( '.splide_destacados', {
                            type   : 'loop',
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
                    splide_destacados();
                    C1.addListener(splide_destacados)
                    C2.addListener(splide_destacados)
                    C3.addListener(splide_destacados)
            })
        </script>
<?php get_footer(); ?>



