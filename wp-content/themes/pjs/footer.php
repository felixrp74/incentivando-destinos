		<footer class="container">
          <div class="for-footer">              
               <div class="linea-footer"></div>
              <div style="padding:5px;">
                  <p>Instituto de Estudios  de las Culturas Andinas (IDECA - PERÚ)</p>
                   <p>Dirección:Jr. Miguel de Cervantes #125 <span>|</span> Apartado: 295, Puno - Perú <span>| </span>Teléfono: +51 51 205547 <span>|</span> Fax: +51 51 357415</p>
                   <p>Email: idecaperu@<span style="display:none">nulo</span>gmail.com ó ideca.emaus@<span style="display:none">nulo</span>gmail.com</p>
                   <p class="visitasp">Número de Visitas: <span><?php include 'cont/contador.php'; $num_visitas = sprintf("%06d", $num_visitas);echo $num_visitas; ?></span></p>
              </div>                   
          </div>
           
            <div class="autor"><!--Diseño y desarrollo web: <a href="http://gruposistemas.com">Grupo Sistemas</a--></div>
        </footer>     

	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script>
		window.jQuery || document.write('<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.10.2.min.js"><\/script>')
	</script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.bxslider.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/plugins.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
	<script src="http://maps.google.com/maps/api/js?sensor=false&amp;language=es"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/mapa.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap-hover-dropdown.min.js"></script>
	<!--script src="<?php echo get_template_directory_uri(); ?>/js/jquery.audioControls.min.js"></script-->
	<script src="<?php echo get_template_directory_uri(); ?>/css/mediaelement-and-player.min.js"></script>
	
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/fancy/jquery.fancybox.js?v=2.1.5"></script>
	<?php wp_footer(); ?>
</body>
</html>
