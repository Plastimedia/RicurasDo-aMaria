<?php
/**
* Template Name: Recursos
*
*/
?>
<?php get_header(); ?>
	<?php while ( have_posts() ) : ?>		
		<?php  the_post(); ?>
		
		<main class="mainRecursos">
			<div class="ancho">
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>

                <div class="buscadorRecursos">
                    <p>Selecciona el producto del que necesitas consultar los recursos</p>
                    <div class="elBuscador">
                        <input type="text" id="inputBuscadorRecursos" placeholder="Buscar producto..."/>
                        <button id="botonBuscadorRecursos">buscar</button>
                    </div>
                    <div class="resultadoBusqueda">
                        
                    </div>
                </div>
            </div>			
		</main>
        
	<?php endwhile; ?>

<?php get_footer(); ?>

