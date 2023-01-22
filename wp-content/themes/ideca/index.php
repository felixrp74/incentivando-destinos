<?php  get_header(); ?>
<div class="container" style="position:relative">
    <ul class="slider">
      <li>
          <img src="<?php echo get_template_directory_uri(); ?>/image/slide1.jpg" title="Funky roots" style="width:100%" />
          <div class="titulo-slide">"Maestría en Religiones y culturas Andinas"</div>
      </li>
      <li>
          <img src="<?php echo get_template_directory_uri(); ?>/image/slide2.jpg" title="The long and winding road" style="width:100%" />
          <div class="titulo-slide">"Maestría en Religiones y culturas Andinas"</div>
      </li>
    </ul>
    <div class="controles">
        <a href="#" id="prev2"></a>
        <a href="#" id="next2"></a>
    </div>
</div> 
<div class="cuerpo container">
   <div class="row">
        <div class="col-sm-8 izquierdo">
            <h2 class="tit">Noticias</h2>
            <div class="noticias">
                <div class="for-fecha"><span class="fa fa-calendar"></span> Lunes, 28 de Julio de 2015</div>
                <a href="#"><h3>Comunicación Intercultural Para la defensa de la Madre Tierra “Madre Tierra”</h3></a>
                <div class="cont-noticia">
                    <img src="<?php echo get_template_directory_uri(); ?>/image/noticia1.jpg" alt="">
                    <p>Para este viernes 19 de Mayo se tiene previsto el foro “Comunicación intercultural para la

defensa de la Madre Tierra” , donde se tocaran temas como de identidad, Medio ambiente y 

Territorio; además  se presentará la publicación: Comunicar el cambio climático en clave 

intercultural. Manual de capacitación.

El evento de carácter público se realizara el viernes 19 de mayo a partir de las 5:30 de la tarde 

en el auditorio Qhantati Ururi ubicado en el Jr. Moquegua N° 677, Puno.

Entre los expositores se encuentran el docente y comunicador Eland Vera de la Universidad 

Nacional del Altiplano; Ana María Pino Jordán, promotora del espacio cultural La Casa del 

Corregidor y del Grupo de Estudio Interculturalidad, entre otros. 
                    <a href="#">Leer más</a></p>
                    
                </div>
            </div>       
            <div class="noticias">
                <div class="for-fecha"><span class="fa fa-calendar"></span> Lunes, 28 de Julio de 2015</div>
                <a href="#"><h3>Jóvenes de la región de Puno dialogaron sobre la soberanía alimentaria frente al Cambio Climático</h3></a>
                <div class="cont-noticia">
                    <img src="<?php echo get_template_directory_uri(); ?>/image/noticia2.jpg" alt="">
                    <p>En los primeros días de junio jóvenes de distintos colectivos se reunieron en "Encuentro 

Diálogo Regional de Juventudes por la soberanía alimentaria frente al Cambio Climático", 

donde discutieron sobre la problemática ambiental mundial y su repercusión en Puno. 

Esta actividad se desarrolló luego de haber construido propuestas colectivas entre jóvenes 

de distintas partes del país y del mundo en la Cumbre de los Pueblos frente al Cambio 

Climático.

Al evento asistieron jóvenes de diversas instituciones y organizaciones quienes mostraron 

su preocupación por el cambio climático y la seguridad alimentaria que afronta nuestro 

planeta y las políticas que se aplican en nuestro país en este tema.
                    <a href="#">Leer más</a></p>                    
                </div>
            </div> 
            <div class="mas-noticias">
                <p><span>26 Jul</span><a href=""><strong>I PRIMERA JORNADA DE CURSOS- TALLERES</strong></a></p>
                <p><span>13 Feb</span><a href=""><strong>I PRIMERA JORNADA DE CURSOS- TALLERES</strong></a></p>
                <p><span>13 Feb</span><a href=""><strong>II CICLO de CONVERSATORIOS: DESAFIANDO la POSTMODERNIDAD (Del 16 de julio al 24 de setiembre de 2014)</strong></a></p>
                <p><span>13 Feb</span><a href=""><strong>CICLO DE CONVERSATORIOS por el Día Internacional de la Diversidad Cultural </strong></a></p>
                <a href="" class="btn btn-mas pull-right">Más noticias</a>
            </div>
        </div>
        <?php get_sidebar(); ?>
    </div>
</div>

<?php  get_footer(); ?>