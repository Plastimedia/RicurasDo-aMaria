<?php
/**
* Template Name: Reporte Denuncias
*
*/
?>
<?php get_header(); ?>
	<?php while ( have_posts() ) : ?>		
		<?php  the_post(); ?>
		
		<main class="">
                
			<div class="ancho">
                <?php the_content(); ?>

                <div class="pqrs__formulario">
                    <form action="<?php echo rest_url('plasti') ?>/denuncias" method="POST" id="PS_catalogo__formulario_contacto" enctype="multipart/form-data">
                        <div class="group groupanonimo">
                            <label for="anonima">La denunca es anónima:</label>
                            <div class="group2">
                                <input type="radio" name="anonima" value="Si" id="anonima1" require>
                                <label for="anonima1">Si</label>
                            </div>
                            <div class="group2">
                                <input type="radio" name="anonima" value="No" id="anonima2" require>
                                <label for="anonima2">No</label>
                            </div>
                            <span class="respuesta"></span>
                            <p style="font-size: 0.8rem">(*) Si la denuncia es marcada como anónima no diligencie el numeral 1</p>
                        </div>
                        <strong>1. INFORMACIÓN DEL DENUNCIANTE</strong>
                        <div class="group">
                            <label for="">Nombre:</label>
                            <input type="text" name="name" class="PS_catalogo__frm_name">
                            <span class="respuesta"></span>
                        </div>
                        <div class="group">
                            <label for="">Contacto telefónico:</label>
                            <input type="number" name="cel" class="PS_catalogo__frm_cel">
                            <span class="respuesta"></span>
                        </div>
                        <div class="group">
                            <label for="">Número de Identificación:</label>
                            <input type="number" name="identificacion" class="PS_catalogo__frm_identificacion">
                            <span class="respuesta"></span>
                        </div>
                        <div class="group">
                            <label for="">Correo electrónico:</label>
                            <input type="email" name="email" class="PS_catalogo__frm_email">
                            <span class="respuesta"></span>
                        </div>
                        <strong>2. TIPO DE DENUNCIA</strong>
                        <div class="group motivo">
                            <label for="">Motivo</label>
                            <div class="group2">
                                <input type="radio" name="motivo" value="Fraude o malversación" id="motivo" require>
                                <label for="motivo">Fraude o malversación</label>
                            </div>
                            <div class="group2">
                                <input type="radio" name="motivo" value="Soborno Transnacional" id="motivo2" require>
                                <label for="motivo2">Soborno Transnacional</label>
                            </div>
                            <div class="group2">
                                <input type="radio" name="motivo" value="Incumplimiento leyes, reglamentos o normas" id="motivo3" require>
                                <label for="motivo3">Incumplimiento leyes, reglamentos o normas</label>
                            </div>
                            <div class="group2">
                                <input type="radio" name="motivo" value="Corrupción" id="motivo4" require>
                                <label for="motivo4">Corrupción</label>
                            </div>
                            <div class="group2">
                                <input type="radio" name="motivo" value="Conflicto de intereses" id="motivo5" require>
                                <label for="motivo5">Conflicto de interese</label>
                            </div>
                            <div class="group2">
                                <input type="radio" name="motivo" value="Otras conductas antiéticas" id="motivo6" require>
                                <label for="motivo6">Otras conductas antiéticas</label>
                            </div>
                            <span class="respuesta"></span>
                        </div>
                        <strong>3. DETALLE DE LA DENUNCIA</strong>
                        <P>Tenga en cuenta la siguiente información necesaria para llevar el análisis e investigación de la denuncia: <br> 
                        a) Informar momento en el que ocurrió o haya ocurrido el hecho. <br>
                        b) Identificación de las personas involucradas con el comportamiento denunciado o con conocimiento del mismo. <br> 
                        c) Identificación de la Persona Natural o Jurídica, Unidad de Negocio o área de la Compañía en la que hayan tenido lugar. <br> 
                        d) Exposición amplia y detallada de los hechos</P>
                        
                        <div class="group">
                           
                            <textarea col="25" name="detalles" class="PS_catalogo__detalles" require></textarea>
                            <span class="respuesta"></span>
                        </div>

                        <div class="group documentos">
                            
                            <label for="documentos">Aporta documentos soporte de la denuncia</label>
                            <div class="group2">
                                <input type="radio" name="documentos" value="Si" id="documentos1">
                                <label for="documentos1">Si</label>
                            </div>
                            <div class="group2">
                                <input type="radio" name="documentos" value="No" id="documentos2">
                                <label for="documentos2">No</label>
                            </div>
                            <span class="respuesta"></span>
                        </div>
                        <div class="group">
                            <label for="">Describa los documentos aportados:</label>
                            <input type="text" name="documentos_descripcion" class="PS_catalogo__frm_documentos_descripcion">
                            <span class="respuesta"></span>
                        </div>
                        <div class="group groupdocumentos" style="">
                            <label for="">Adjuntar documentos:</label>
                            <input type="file" name="documentos_adjuntados" class="PS_catalogo__frm_documentos_adjuntados">
                            <span class="respuesta"></span>
                        </div>
                        <div class="group terminos">
                            <input type="checkbox" name="terminos" id="terminos">
                            <label for="terminos"> <a href="http://grupoal.com.co/terminos-y-condiciones/" target="_blank">Acepto términos y condiciones</a></label>
                            <span class="respuesta"></span>
                        </div>
                        <div class="group botones">
                            <button type="button" class="PC_catalogo__button boton_reporte_denuncias">Enviar</button>
                            <span class="respuesta"></span>
                        </div>   
                    </form>
                </div>

            </div>			
		</main>
        <script>
            $(document).ready(function(){
                $(".page-template-template-contactanos-formulario .migas .breadcrumbs span:first-child a").attr("title","Contáctanos");
                $(".page-template-template-contactanos-formulario .migas .breadcrumbs span:first-child a").attr("href","http://grupoal.com.co/contactanos-2/");
                $(".page-template-template-contactanos-formulario .migas .breadcrumbs span:first-child a span").text("Contáctanos");
            })
        </script>
	<?php endwhile; ?>
<?php get_footer(); ?>

