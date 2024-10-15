
<?php
/**
* Template Name: Información del sitio
*
*/
?>
<?php get_header(); ?>
	<?php while ( have_posts() ) : ?>		
		<?php  the_post(); ?>
        
        <div id="menu-movil">
            <?php wp_nav_menu( array('theme_location' => 'informacion-sitio')); ?>
        </div>
        <button class="abrir-menu-movil">></button>

		<main class="" id="no">
            <aside>
                <div class="content">
                    <?php wp_nav_menu( array('theme_location' => 'informacion-sitio')); ?>
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
                <div class="ancho">
                    <h1>
                        <?php the_title(); ?>
                    </h1>
                    <?php the_content(); ?>
                </div>
            </section>
			
		</main>
        <script>
            $(document).ready(function(){
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
            })
        </script>
	<?php endwhile; ?>
<?php get_footer(); ?>

