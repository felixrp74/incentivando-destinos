<?php
/*Template Name: Inicio*/
 get_header(); 
 ?>

<div class="container" style="position:relative; text-align: center;">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <ul class="slider">
    	 <?php
        $galeria = get_post_gallery(get_the_ID(), false);
        $galeria_ids = explode(',', $galeria['ids']);
        $resultado = count($galeria_ids);

        if($galeria){?>
            <?php 
            $tmp = 0;
            //$i=0; foreach($galeria_ids as $img_id): 
            foreach($galeria_ids as $img_id): 
            $pt = get_post($img_id);
            //$descripcion = $pt->post_content;
            // ->post-excerpt es para sacar leyenda de la imagen
            $titulo = $pt->post_title;
            $tmp++;
            ?>
            <li style="<?php if($tmp > 1){echo 'display:none';} ?>">
		        <?php echo wp_get_attachment_image( $img_id, 'img-548x636 progres' ); ?>
		        <div class="titulo-slide">"<?php echo $titulo;//.' '.$descripcion; //echo get_post_meta($img_id, '_wp_attachment_image_alt', true); ?>"</div>
		    </li>
            <?php endforeach;wp_reset_postdata(); ?>      
        <?php }?>        
    </ul>
    <div class="controles">
        <!-- <a href="#" id="prev2"></a>
        <a href="#" id="next2"></a> -->
    </div>
</div> 
<div class="container">
    <div class="row" style="margin-bottom: 10px; margin-top: 10px;">
        <div class="col-sm-3">    
            <div class="eventos text-justify">
                <h2 class="titulo-nuevo for-uno"> <i class="fa fa-television"></i> ID INFORMA</h2>
                <br>
                <ul id="eventos">

                    <!-- Desde el punto de vista funcional es una máquina que posee, al menos, una unidad central de procesamiento (CPU), una unidad de memoria y otra de entrada/salida (periférico). Los periféricos de entrada permiten el ingreso de datos, la CPU se encarga de su procesamiento (operaciones aritmético-lógicas) y los dispositivos de salida los comunican a los medios externos. Es así, que la computadora recibe datos, los procesa y emite la información resultante, la que luego puede ser interpretada, almacenada, transmitida a otra máquina o dispositivo o sencillamente impresa; todo ello a criterio de un operador o usuario y bajo el control de un programa de computación. -->
                    <a href="https://fimi-iiwf.org/" target="_blank">
					<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/image/Screenshot_130.png" alt="" class=""></a>
                </ul>
            </div>
        </div>
        <div class="col-sm-3">       
            <div class="eventos text-justify">
                <h2 class="titulo-nuevo for-uno"> <i class="fa fa-comments"></i> ID OPINA</h2>
                <br>
                <ul id="eventos">
                Una noticia es un relato o escrito sobre un hecho actual y de interés público, difundido a través de los diversos medios de comunicación social (prensa,
                Una noticia es un relato o escrito sobre un hecho actual y de interés público, difundido a través de los diversos medios de comunicación social (prensa,
                
                </ul>
            </div>
        </div>
        <div class="col-sm-3">    
            <div class="eventos text-justify">
                <h2 class="titulo-nuevo for-uno"> <i class="fa fa-volume-up"></i> AUDIOS</h2>
                <br>
                <ul id="eventos">

                    <a href="https://fimi-iiwf.org/" target="_blank">
					<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/image/Screenshot_131.png" alt="" class=""></a>
                </ul>
            </div>
        </div>
        <div class="col-sm-3">    
            <div class="eventos text-justify">
                <h2 class="titulo-nuevo for-uno"> <i class="fa fa-video-camera"></i> VÍDEOS</h2>
                <br>
                <ul id="eventos">

                <a href="https://fimi-iiwf.org/" target="_blank">
                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/image/Screenshot_132.png" alt="" class=""></a>
                </ul>
            </div>
        </div>
    </div>
    <div class="row" style="margin-bottom: 10px; margin-top: 10px;">
        <div class="col-md-4" >
            <div class="fb2">
                <div class="social-item hd-fb" >
                    <p>Buscanos en Facebook<span class="fa fa-facebook"></span></p>
                </div>
                <div class="fb-page" data-href="https://www.facebook.com/IncentivandoDestinos" 
                data-tabs="timeline" data-width="500px" data-height="500" data-small-header="false" 
                data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                <blockquote cite="https://www.facebook.com/IncentivandoDestinos" class="fb-xfbml-parse-ignore">
                    <a href="https://www.facebook.com/IncentivandoDestinos">Facebook</a></blockquote></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="fb2">
                <div class="social-item hd-tw" >
                    <p>Siguenos en Twitter<span class="fa fa-twitter"></span></p>
                </div>
                <a class="twitter-timeline" data-width="500px" data-height="500" 
                href="https://twitter.com/ong_id?ref_src=twsrc%5Etfw">Tweets by Incentivando destinos</a> 
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
        </div>
        <div class="col-md-4" >
            <div class="fb2">
                <div class="social-item hd-fb" >
                    <p>Buscanos en Facebook<span class="fa fa-facebook"></span></p>
                </div>
                <div class="fb-page" data-href="https://www.facebook.com/IncentivandoDestinos" 
                data-tabs="timeline" data-width="500px" data-height="500" data-small-header="false" 
                data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                <blockquote cite="https://www.facebook.com/IncentivandoDestinos" class="fb-xfbml-parse-ignore">
                    <a href="https://www.facebook.com/IncentivandoDestinos">Facebook</a></blockquote></div>
            </div>
        </div>
    </div>
</div>

<?php  get_footer(); ?>