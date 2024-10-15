<footer>
	<div class="ancho">
        <div class="columns">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer') ) : ?>
			<?php endif; ?>
        </div>
	</div>	
	<div class="ancho">
		<div class="firma">
			<div class="marca">						
			</div>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Firma footer') ) : ?>
			<?php endif; ?>
		</div>
	</div>
</footer>
</div> <!-- Fin de wrapper -->
<?php wp_footer(); ?>
<script>
	window.onload = () => {
			
			setTimeout(() => {
				new WppBtn([
					{
						number: 570000000000,
						title: 'Contacto',
						message: 'Mensaje de contacto'
					},
				], {
					title: '¡Hola! En que te podemos ayudar',
					subtitle: 'El equipo suele responder en unos minutos',
					x: 20,
					y: 60,
				})
			},1000)
		}
</script>
</body>
</html>