<div class="head-image">

  <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Slider Escritorio')): ?>
  <?php endif; ?>

  <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Slider Celular')): ?>
  <?php endif; ?>
</div>


<section class="nuestros-productos">
  <div class="ancho wow animate__animated animate__backInUp">
    <div class="info">
      <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Nuestros Poductos')): ?>
      <?php endif; ?>
    </div>

    <div class="splide_nuestro_productos">
      <div class="splide__track">
        <ul class="splide__list products">
          <?php
          $nuestros_productos = new WP_Query(
            array(
              'post_type' => array('product'),
              'post_status' => 'publish',
              'posts_per_page' => 30,
              'terms' => 'featured',
              'order' => 'ASC',
              'orderby' => 'menu_order',
            )
          );
          if ($nuestros_productos->have_posts()):
            while ($nuestros_productos->have_posts()):
              $nuestros_productos->the_post();
              global $product;
              ?>
              <li <?php wc_product_class('splide__slide', $product); ?>>
                <div class="producto">
                  <div class="content">
                    <a class="thumbnail" href="<?php echo the_permalink(); ?>">
                      <?php
                      $product_image_id = $product->get_image_id();
                      $product_image_url = wp_get_attachment_url($product_image_id);
                      echo '<img src="' . esc_url($product_image_url) . '" alt="Imagen del Producto">';
                      ?>
                    </a>
                  </div>
                  <div class="content-text">
                    <h3><a href="<?php echo the_permalink(); ?>"><?php echo $product->get_name() ?></a></h3>
                    <!-- <p><?php echo $product->get_short_description() ?></p> -->
                    <a class="btn" href="<?php echo the_permalink(); ?>">Comprar</a>
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
</section>

<!-- promociones -->
<section class="promociones">
  <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Promociones')): ?>
  <?php endif; ?>
</section>
<section class="promocionesmb">
  <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Promociones Móvil')): ?>
  <?php endif; ?>
</section>

<!-- destacados -->
<section class="destados">
  <div class="ancho">
    <div class="info">
      <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Productos Destacados')): ?>
      <?php endif; ?>
    </div>
    <div class="productos-destacod">
      <div class="splide__track">
        <ul class="splide__list products">
          <?php
          $tax_query[] = array(
            'taxonomy' => 'product_visibility',
            'field' => 'name',
            'terms' => 'featured',
            'operator' => 'IN',

          );
          $destacados_productos = new WP_Query(
            array(
              'post_type' => array('product'),
              'post_status' => 'publish',
              'posts_per_page' => 30,
              'terms' => 'featured',
              'order' => 'ASC',
              'orderby' => 'menu_order',
              'tax_query' => $tax_query
            )
          );
          if ($destacados_productos->have_posts()):
            while ($destacados_productos->have_posts()):
              $destacados_productos->the_post();
              global $product;
              ?>
              <li <?php wc_product_class('splide__slide', $product); ?>>
                <div class="producto">
                  <div class="content">
                    <a class="thumbnail" href="<?php echo the_permalink(); ?>">
                      <?php
                      $product_image_id = $product->get_image_id();
                      $product_image_url = wp_get_attachment_url($product_image_id);
                      echo '<img src="' . esc_url($product_image_url) . '" alt="Imagen del Producto">';
                      ?>
                    </a>
                    <a class="btn" href="<?php echo the_permalink(); ?>">Comprar</a>
                  </div>
                  <div class="content-text">
                    <h3><a href="<?php echo the_permalink(); ?>"><?php echo $product->get_name() ?></a></h3>
                    <p><?php echo $product->get_short_description() ?></p>
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
</section>

<!-- quienes somos -->
<section class="quienes-somos">
  <div class="ancho">
    <div class="info">
      <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Quienes Somos info')): ?>
      <?php endif; ?>
    </div>
    <div class="content">
      <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Quienes Somos')): ?>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- recestas -->
<section class="recetas">
  <div class="ancho">
    <div class="info">
      <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Recetas')): ?>
      <?php endif; ?>
    </div>
    <div class="listadorecetas">
      <?php
      $blogs = new WP_Query(
        array(
          'post_type' => array('post'), // Tipo de publicación: Entradas de blog
          'post_status' => 'publish', // Estado de publicación: Publicadas
          'posts_per_page' => 30, // Número de entradas por página (30 en este caso)
          'order' => 'ASC', // Orden ascendente
          'orderby' => 'menu_order', // Ordenar por el campo 'menu_order'
          'category_name' => 'Recetas', // Categoría de la entrada (cambia 'blog' por el slug de tu categoría)
        )
      );
      if ($blogs->have_posts()):

        while ($blogs->have_posts()):

          $blogs->the_post();
          ?>
          <div class="receta">
            <div class="img">
              <?php the_post_thumbnail('thumbnail'); ?>
            </div>
            <div class="content">
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <p><?php the_excerpt(); ?></p>
            </div>
          </div>
          <?php
        endwhile;
        wp_reset_postdata();
      endif;
      ?>
    </div>
  </div>
</section>



<script>
  $(document).ready(function () {
    new Splide('.splide_nuestro_productos', {
      type: 'loop',
      perPage: 6,
      perMove: 1,
      rewind: true,
      breakpoints: {
        1024: {
          perPage: 2
        },
        768: {
          perPage: 1
        }
      },
    }).mount();
    new Splide('.productos-destacod', {
      type: 'loop',
      perPage: 3,
      perMove: 1,
      rewind: true,
      breakpoints: {
        1024: {
          perPage: 2
        },
        768: {
          perPage: 1
        }
      },
    }).mount();
  })
</script>