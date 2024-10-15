<?php
/**
* Template Name: Contactanos Formulario
*
*/
?>
<?php get_header(); ?>
	<?php while ( have_posts() ) : ?>		
		<?php  the_post(); ?>
    	 <script src="https://www.google.com/recaptcha/api.js?render=6LdC29UmAAAAAGxm6pfOBwvWB2SelWSALqyisDvs" defer></script>
		<main class="">
			<div class="ancho">
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>

                <div class="pqrs__formulario">
                    <form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="POST">
                        <input type="hidden" name="action" value="procesar_formulario_contacto">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="nombre" name="name" placeholder="Tu nombre aquí" required>
                        </div>
                        <div class="form-group">
                            <label for="cedula">Cedula:</label>
                            <input type="number" id="cedula" name="cedula" placeholder="Tu cedula aquí" required>
                        </div>
                        <div class="form-group">
                            <label for="empresa">Empresa:</label>
                            <input type="text" id="telefono" name="telefono" placeholder="Tu empresa aquí" required>
                        </div>
                        <div class="form-group">
                            <label for="NIT">NIT:</label>
                            <input type="text" id="nit" name="nit" placeholder="Tu NIT aquí" required>
                        </div>
                        <div class="form-group">
                            <label for="celular">Celular:</label>
                            <input type="number" id="celular" name="celular" placeholder="Tu celular aquí" required>
                        </div> 
                        <div class="form-group">
                            <label for="telefono">Telefono:</label>
                            <input type="number" id="telefono" name="telefono" placeholder="Tu telefono aquí" required>
                        </div>         
                        <div class="form-group">
                            <label for="email">Correo:</label>
                            <input type="email" id="email" name="email" placeholder="Tu correo aquí" required>
                        </div>             
                        <div class="form-group full-width">
                            <label for="">Departamento:</label>
                            <select name="ciudad" id="" class="PS_catalogo__frm_ciudad">
                                <option value="">Selecciona tu departamento</option>
                                <option value="Amazonas">Amazonas</option>
                                <option value="Antioquia">Antioquia</option>
                                <option value="Arauca">Arauca</option>
                                <option value="Atlántico">Atlántico</option>
                                <option value="Bogotá">Bogotá</option>
                                <option value="Bolívar">Bolívar</option>
                                <option value="Boyacá">Boyacá</option>
                                <option value="Caldas">Caldas</option>
                                <option value="Caquetá">Caquetá</option>
                                <option value="Casanare">Casanare</option>
                                <option value="Cauca">Cauca</option>
                                <option value="Cesar">Cesar</option>
                                <option value="Chocó">Chocó</option>
                                <option value="Córdoba">Córdoba</option>
                                <option value="Cundinamarca">Cundinamarca</option>
                                <option value="Guainía">Guainía</option>
                                <option value="Guaviare">Guaviare</option>
                                <option value="Huila">Huila</option>
                                <option value="La Guajira">La Guajira</option>
                                <option value="Magdalena">Magdalena</option>
                                <option value="Meta">Meta</option>
                                <option value="Nariño">Nariño</option>
                                <option value="Norte de Santander">Norte de Santander</option>
                                <option value="Putumayo">Putumayo</option>
                                <option value="Quindío">Quindío</option>
                                <option value="Risaralda">Risaralda</option>
                                <option value="San Andrés y Providencia">San Andrés y Providencia</option>
                                <option value="Santander">Santander</option>
                                <option value="Sucre">Sucre</option>
                                <option value="Tolima">Tolima</option>
                                <option value="Valle del Cauca">Valle del Cauca</option>
                                <option value="Vaupés">Vaupés</option>
                                <option value="Vichada">Vichada</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="asunto">Observaciones:</label>
                            <textarea name="asunto" id="asunto" placeholder: "Tu observación aquí"></textarea>
                        </div>  
                        <div class="group terminos" style="text-align:center;">
                            <input type="checkbox" name="terminos" id="terminos">
                            <label for="terminos"> <a href="http://"  target="_blank">Acepto términos y condiciones</a></label>
                        </div>                       
                             <div class="g-recaptcha" data-sitekey="6LcvBE0qAAAAADBPVnjuOvscAXg6jhywWY4IjnoW"></div>
                        <div class="form-group full-width" style="justify-content: center;">
                            <input type="submit" name="submit" value="Enviar">
                        </div>
                    </form>
            </div>
                        <!--<div class="g-recaptcha" data-sitekey="6LdC29UmAAAAAGxm6pfOBwvWB2SelWSALqyisDvs"></div>-->
                    </form>
                </div>
            </div>			
		</main>
        
	<?php endwhile; ?>
<?php get_footer(); ?>