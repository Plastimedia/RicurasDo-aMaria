<?php
/**
* Template Name: Nuestros Proyectos
*
*/
?>
<?php get_header(); ?>
	<?php while ( have_posts() ) : ?>		
		<?php  the_post(); ?>
		
		<main class="">
                
			<div class="ancho" style="max-width: 1400px;">
                <?php the_content(); ?>
                <section class="algunosproyectos">
                    <div class="ancho">
                        <div class="info">
                            <div class="content">
                                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Proyectos Contenido') ) : ?>
                                <?php endif; ?>
                            </div>
                            <div class="image">
                                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Proyectos imagen') ) : ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="proyectos">
                            <div class="ancho">
                                <?php 
                                    // Consultar los proyectos del post type "proyectos"
                                    $args = array(
                                        'post_type' => 'proyectos'
                                    );
                                    $proyectos_query = get_posts( $args );
                                    foreach ($proyectos_query as $proyecto) {
                                        $proyecto_id = $proyecto->ID;
                                        ?>
                                            <a data-toggle="modal" data-target="#Modal<?= $proyecto_id ?>">
                                                <div class="proyecto" style="--fondo: url(<?php echo get_the_post_thumbnail_url($proyecto_id, 'full'); ?>)">
                                                    <div class="contenido">
                                                        <p>Proyecto</p>
                                                        <h3><?php echo $proyecto->post_title; ?></h3>
                                                        <p><?php echo get_post_meta($proyecto_id, '_ciudad', true); ?></p>
                                                    </div>
                                                </div>
                                            </a>
                                            <!-- Modal -->
                                            <div class="modal fade modalproyectos" id="Modal<?= $proyecto_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel"><?= $proyecto->post_title ?> </h5><p>  -  <?= get_post_meta($proyecto_id, '_ciudad', true) ?></p>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <?= get_post_field('post_content', $proyecto_id) ?>
                                                            <?php $la_galeria = json_decode(get_post_meta($proyecto_id, '_galeria_proyecto', true)) ?>
                                                            
                                                            <div class="splidemodal splideModal<?= $proyecto_id ?>">
                                                                <div class="splide__track">
                                                                    <ul class="splide__list">
                                                                        <?php foreach($la_galeria as $imagen): ?>
                                                                            <li class="splide__slide">
                                                                                <img src="<?= $imagen->url ?>" alt="" height="100">
                                                                            </li>
                                                                        <?php endforeach; ?>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <script>
                                                $(document).ready(function(){
                                                    new Splide( '.splideModal<?= $proyecto_id ?>', {
                                                    type       : 'loop',
                                                    height     : '150px',
                                                    autoWidth: true,
                                                    perPage    : 4,
                                                    perMove    : 1,
                                                    } ).mount( );
                                                })
                                            </script>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>            
                    </div>
                </section>
            </div>			
		</main>
	<?php endwhile; ?>
<?php get_footer(); ?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>