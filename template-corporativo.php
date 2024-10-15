
    <?php
    /**
    * Template Name: Corporativo
    *
    */
    ?>
<?php get_header(); ?>
<style>
    html{
        scroll-behavior: smooth;
    }
</style>
	<?php while ( have_posts() ) : ?>		
		<?php  the_post(); ?>
        <div id="menu-movil">
            <?php wp_nav_menu( array('theme_location' => 'corporativo')); ?>
        </div>
        <button class="abrir-menu-movil">></button>
		<main class="" id="no">
            <aside>
                <div class="content">
                    <?php wp_nav_menu( array('theme_location' => 'corporativo')); ?>
                </div>
            </aside>
            <section class="contenido">
                <div class="migas">
					<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
						<?php if(function_exists('bcn_display'))
						{
							bcn_display();
						}?>
					</div> 
				</div>
                <section class="video_corporativo" id='quienes-somos'>
                    <div class="info">
                        <h1>
                            <?php the_title(); ?>
                        </h1>
                    </div>
                    <div class="content">
                        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Video página Corporativo') ) : ?>
                        <?php endif; ?>
                    </div>
                </section>
                <div class="ancho">
                    <?php the_content(); ?>
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
            </section>

			
		</main>
        <style>
            .page-template-template-corporativo main section.contenido{
                width: calc(100% - 250px);
            }
        </style>
        <script>
            $(document).ready(function(){
                // window.setTimeout(function(){
                //     player.mute();
                //     player.play();
                //     $(".inlinePlayButton").css("display","none");
                // },5000);

                // items active cuando scroll
                var menuItems = $(".page-template-template-corporativo main aside .content ul").find("a")
                // anclajes
                var scrollItems = menuItems.map(function(){
                    var item = $($(this).attr("href"));
                    if(item.length){return item;}
                });

                var fromTop = $(this).scrollTop()+50;
                // id del actual scroll
                var cur = scrollItems.map(function(){
                    if($(this).offset().top < fromTop)
                        return this;
                });
                // id del actual
                cur = cur[cur.length-1];
                var id = cur && cur.length ? cur[0].id : "";
                // toggle class
                menuItems.parent().removeClass('current-menu-item').end().filter("[href='#"+id+"']").parent().addClass('current-menu-item');
                
                $(window).scroll(function(){
                    var fromTop = $(this).scrollTop()+50;
                    // id del actual scroll
                    var cur = scrollItems.map(function(){
                        if($(this).offset().top < fromTop)
                            return this;
                    });
                    // id del actual
                    cur = cur[cur.length-1];
                    var id = cur && cur.length ? cur[0].id : "";
                    // toggle class
                    menuItems.parent().removeClass('current-menu-item').end().filter("[href='#"+id+"']").parent().addClass('current-menu-item');

                })


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
                            perPage: 3,
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


                // menu movil
                var slideout = new Slideout({
                    'panel': document.getElementById('no'),
                    'menu': document.getElementById('menu-movil')
                });
                slideout.on('open',function(){
                    $('.abrir-menu-movil').toggleClass("activa");
                    let leftDiv = $("main").offset().left
                    // $('.abrir-menu-movil').css("left",`${leftDiv}px`)
                })
                slideout.on('close',function(){
                    $('.abrir-menu-movil').toggleClass("activa");
                })
                document.querySelector('.abrir-menu-movil').addEventListener('click', function() {
                    slideout.toggle();
                    // $(this).toggleClass("activa");
                });
                function close(eve) {
                eve.preventDefault();
                slideout.close();
                }
                slideout
                .on('beforeopen', function() {
                    this.panel.classList.add('panel-open');
                })
                .on('open', function() {
                    this.panel.addEventListener('click', close);
                })
                .on('beforeclose', function() {
                    this.panel.classList.remove('panel-open');
                    this.panel.removeEventListener('click', close);
                });
            });
        </script>
	<?php endwhile; ?>
<?php get_footer(); ?>

