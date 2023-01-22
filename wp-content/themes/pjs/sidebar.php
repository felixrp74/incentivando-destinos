<div class="col-sm-4 derecho">     
    
    <div class="eventos">
    <h2 class="tit">Eventos destacados</h2>
        <ul id="eventos">
            <?php $ider2=get_the_id(); $custom_query =  new WP_Query( array( 'post_type' => 'any','category_name'=>'noticias','meta_key' => 'Destacar', 'posts_per_page'=>10 ,'orderby'=>'date', 'order' => 'DESC','paged' => get_query_var('page')) ); ?>  
            <?php $exis = 0; while($custom_query->have_posts()) : $custom_query->the_post(); ?>                     
            <?php $exis ++; ?>
                <li style="<?php if($exis > 1) {echo 'display:none';} ?>" class="fotoDEs">
                    <a href="<?php the_permalink(); ?>">
                        <?php 
                            $destaca=get_post_meta($post->ID, 'Destacar', true);
                            if($destaca == 'si' || $destaca == 'Si'){
                                $galeria = get_post_gallery(get_the_ID(), false);
                                $galeria_ids = explode(',', $galeria['ids']);
                                $var1=wp_get_attachment_image( $galeria_ids[0], 'thumbnail' );//img galeria 
                                $var2=get_image_post('medium');//img primera img                                 

                                if(has_post_thumbnail()){
                                    the_post_thumbnail('img-333x187');
                                }else{
                                    if($var2!=''){
                                        echo $var2;
                                        /*$ima1 = explode('width="',$var2);
                                        echo $ima1[0].' />';*/
                                    }else{
                                        if($var1!=''){
                                            echo $var1;
                                        }
                                    }
                                }
                            }
                        ?> 
                    </a>
                </li>
            <?php endwhile;?>
        </ul>  
    </div> 
	<?php if(!is_page(6004)): ?>
    <div class="for-e">
        <h4><span><i class="fa fa-pie-chart"></i></span> Encuesta IDECA </h4>        
        <?php $ider2=6972; $custom_query =  new WP_Query( array( 'post_type' => 'post','category_name'=>'encuestas', 'posts_per_page'=>1 ,'orderby'=>'date', 'order' => 'DESC') ); ?>  
        <?php $exis = 0; while($custom_query->have_posts()) : $custom_query->the_post();
        $activo=get_post_meta($post->ID, 'Activado', true);   
        
        $el_id = intval(preg_replace('/[^0-9]+/', '', get_the_content()), 10);  
         
        if(!empty($activo)){
        the_content(); ?>
        <a href="<?php the_permalink(); ?>" class="btn btn-mol">Ver resultados</a>
        <?php
        }else{
        ?>
        <div class="pef">

            <?php 
            
            $myrows = $wpdb->get_results( "SELECT * FROM wp_poll_wp_Results WHERE juna_IT_Poll_Add_Question_FieldID='".$el_id."'" );
            $for_nom = $wpdb->get_results( "SELECT juna_IT_Poll_add_Question_Field FROM wp_poll_wp_Questions WHERE id='".$el_id."'" );
            //var_dump($for_nom[0]);
            $si = $myrows[0]->Juna_IT_Poll_Count; // SI
            $no = $myrows[1]->Juna_IT_Poll_Count; // NO
            $total = $si+$no+1;
            $nom = $for_nom[0]->juna_IT_Poll_add_Question_Field;
            $para_si = number_format(($si*100)/$total,1,'.','');
            $para_no = number_format(($no*100)/$total,1,'.','');
            
            ?>
            <h5 style="font-weight: bold;margin-bottom: 5px;margin-top: 10px;font-size: 16px"><?php echo $nom; ?></h5>
            <div class="for-si-no">
                <div class="progress">
                    <div class="progress-bar para-si" role="progressbar" aria-valuenow="<?php echo $para_si; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $para_si; ?>%">
                        <span class="sr-only"><?php echo $para_si; ?>% Complete (success)</span>
                        <p>SI: <strong><?php echo $para_si; ?></strong>%</p>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar para-no" role="progressbar" aria-valuenow="<?php echo $para_no; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $para_no; ?>%">
                        <span class="sr-only"><?php echo $para_no; ?>% Complete (warning)</span>
                        <p>NO: <strong><?php echo $para_no; ?></strong>%</p>
                    </div>
                </div>
            </div>
            <a href="<?php the_permalink(); ?>" class="btn btn-mol">Ver más resultados</a>
        </div>
        <?php
        }
        ?>                           
        <?php endwhile; ?>
    </div>
    <?php endif; ?>

    <?php 
    if(!is_category(53)){
    ?>
    <div class="para-radio">
        <h2 class="tit dorado"><?php echo get_cat_name(53); ?> <span class="pull-right fa fa-link"></span></h2>
        <div class="r1">
            <img src="<?php echo get_template_directory_uri(); ?>/image/icons/radio.png" alt="">
            <div class="r2">
                <a href="<?php echo get_category_link(53); ?>">
                <?php $custom_query =  new WP_Query( array( 'post_type' => 'post','meta_key' => 'Online','category_name'=>'radio-ideca', 'posts_per_page'=>1 ,'orderby'=>'date', 'order' => 'DESC','paged' => get_query_var('page')) ); ?>  
                
                <?php while($custom_query->have_posts()) : $custom_query->the_post(); 
                ?>     
                <?php                   
                    
                        $hor=get_post_meta($post->ID, 'Hora', true); 
                        $fe=get_post_meta($post->ID, 'Online', true); 
                        $fec = explode('/', $fe);
                        $fecha = $fec[0];                      
                        if($fecha == date('d')){                                                    
                            if($hor == 0){
                                $de = '09:30 am';
                                $hasta = '10:30 am';
                            }else{
                                $new_hora = explode('-', $hor);
                                $de = trim($new_hora[0]); 
                                $hasta = trim($new_hora[1]); 
                            }
                            date_default_timezone_set("America/Lima" ) ; 
                            $hora = date('h:i a',time() - 3600*date('I')); 
                            if($hora >= $de && $hora <= $hasta){
                                $autoplay = '<span></span><i class="par"></i>';
                                $estado = "en vivo";
                                
                                $mas = '';
                            }
                            else{
                                $autoplay = "";
                                $estado = "";                                
                                $mas = '<i class="fa fa-angle-double-right"></i> Ver programas gravados';
                            };
                        }else{
                            $autoplay = "";
                                $estado = "";                                
                                $mas = '<i class="fa fa-angle-double-right"></i> Ver más';
                        }                                            
                    
                    ?>
                <p><?php echo $autoplay; ?><strong><?php echo $estado; ?></strong></p>
                <h4><?php the_title(); ?></h4>
                <i class="fa fa-calendar" style="color:#fff;font-size:10px;text-shadow:1px 1px 1px rgba(0,0,0,0.5);"></i> <span style="color:#fff;font-size:11px;;text-shadow:1px 1px 1px rgba(0,0,0,0.5);"><?php echo $fe; ?></span> | <span style="color:#fff;font-size:11px;;text-shadow:1px 1px 1px rgba(0,0,0,0.5);"><?php echo $hor; ?></span><br>
                <span style="margin-bottom:0;color:#f72904"><?php echo $mas; ?></span>
                <?php endwhile; wp_reset_query();?>  
                </a>              
            </div>
        </div>        
    </div> 
    <?php
    }
    ?>  
      
    <?php 
    if(!is_category(37)): ?>
    <div class="opiniones">
        <h2 class="tit"><?php echo get_cat_name(37); ?></h2>
        <?php $custom_query =  new WP_Query( array( 'post_type' => 'any','category_name'=>'opiniones', 'posts_per_page'=>3 ,'orderby'=>'date', 'order' => 'DESC','paged' => get_query_var('page')) ); ?>  
        <ul class="opis">
            <?php $numa = 0;$r=0; $s=0; while($custom_query->have_posts()) : $custom_query->the_post(); ?>     
            <li><a href="<?php the_permalink(); ?>"><i class="fa fa-file-text"></i><span><?php the_title(); ?></span></a></li>
            <?php endwhile;?>
        </ul>
        <a href="<?php echo get_category_link(37); ?>" class="btn btn-opiniones pull-right">Más Publicaciones » </a>
    </div>    
    <?php endif; ?>
            <div class="publicaciones">
                <h2 class="tit">Audios Recientes</h2>
                <div class="publi-cont">
                    <table class="table table-responsive" style="margin-bottom: 0px;">
                    <tbody>
                        
                    <?php $custom_query =  new WP_Query( array( 'post_type' => 'any','category_name'=>'publicaciones', 'posts_per_page'=>3 ,'orderby'=>'date', 'order' => 'DESC','paged' => get_query_var('page')) ); ?>  
                    <?php $numa = 0;$r=0; $s=0; while($custom_query->have_posts()) : $custom_query->the_post(); ?>                     
                    <!--a href="<?php the_permalink(); ?>"-->
                        <tr>
                        <?php
                        $cont = get_the_content();
                        $yot = substr_count($cont, "youtu.be");
                        $sc = explode('src="https://w.soundcloud.com', $cont);
                        $scl = explode('"', $sc[1]);
                        $soundcloud = $scl[0];

                        $cont = get_the_content();
                        $may = explode('.pdf"', $cont);
                        $pay = explode('http://', $may[0]);
                        $pdf = $pay[1];
                        //$cont_pdf = substr_count($cont, '.pdf');
                        /*$args = array(
                          'post_type' => 'attachment',
                          'numberposts' => null,
                          'post_status' => null,
                          'post_parent' => $post->ID,
                        );
                        
                        $attachments = get_posts($args);*/
                        if(!empty($yot)){
                            $vide = explode('[embed]https://youtu.be/', $cont);
                            $vides = explode('[/embed]', $vide[1]);                            

                            if(!empty($vides[0])){
                                $youtube = 'https://www.youtube.com/watch?v='.$vides[0];
                                $clase = 'fancybox-video';
                                $mas = '&';
                            }else{
                                $vid2 = explode('src="https://www.youtube.com', $cont);
                                $vid2a = explode('"', $vid2[1]);
                                //echo $vid2[1].'hola ';
                                $youtube = 'https://www.youtube.com'.$vid2a[0];
                                $clase = 'fancybox fancybox.iframe';
                                $mas = '?';
                            }
                            //echo $youtube;
                            //echo '<a href="'.$youtube.$mas.'autoplay=1" class="'.$clase.'"><span class="fa fa-youtube-play tool" title="Ver video"></span><strong>';the_title(); echo '</strong></a>';
                            echo '<td style="width:40px;"><a href="'.$youtube.$mas.'autoplay=1" class="'.$clase.'"><span class="fa fa-youtube-play tool" title="Ver video"></span></a></td><td><a href="'.$youtube.$mas.'autoplay=1" class="'.$clase.'"><strong>';the_title(); echo '</strong></a></td>';
                        }                        
                        
                        else if(!empty($soundcloud)){
                            //echo 'https://w.soundcloud.com'.$soundcloud;
                            //echo '<a href="https://w.soundcloud.com'.trim($soundcloud).'" class="fancybox fancybox.iframe tool"><span class="fa fa-volume-up tool" title="Escuchar Musica"></span><strong>';the_title(); echo '</strong></a>';
                            echo '<td style="width:40px;"><a href="https://w.soundcloud.com'.trim($soundcloud).'" class="fancybox fancybox.iframe tool"><span class="fa fa-volume-up tool" title="Escuchar Musica"></span></a></td><td><a href="https://w.soundcloud.com'.trim($soundcloud).'" class="fancybox fancybox.iframe tool"><strong>';the_title(); echo '</strong></a></td>';
                            
                        }
                        else if(!empty($pdf)){     
                            echo '<td style="width:40px;"><a href="http://'.$pdf.'.pdf" target="_blank" title="Descargar PDF"><span class="tool fa fa-file-pdf-o" title="Descargar PDF"></span></a></td><td><a href="http://'.$pdf.'.pdf" target="_blank" title="Descargar PDF"><strong>';the_title(); echo '</strong></a></td>';                       
                        }
                        /*
                        else if($attachments) {
                              foreach ($attachments as $attachment) {
                               $file = get_the_attachment_link($attachment->ID,true);
                               $file_pdf = explode(".pdf", $file);
                               $pdf = explode('http', $file_pdf[0]);
                               $lin = $pdf[1];
                               if(!empty($lin)) {                                    
                                echo '<td style="width:40px;"><a href="http'.$lin.'.pdf" title="Descargar PDF"><span class="tool fa fa-file-pdf-o" title="Descargar PDF"></span></a></td><td><a href="http'.$lin.'.pdf" title="Descargar PDF"><strong>';the_title(); echo '</strong></a></td>';

                                }
                              }
                            
                        }*/
                        else{
                            echo '<a href="#" title="Sin archivos" class="tool"><span class="fa fa-file-o"></span><strong>';the_title(); echo '</strong></a>';}
                        ?>
                        <!--span class="fa fa-files-o"></span>
                        <strong><?php the_title();?></strong>
                    </a-->
                </tr>
                <?php endwhile;
                $link = array(1);
                ?>
                    
                    <!--a href=""><span class="fa fa-files-o"></span><strong>Experiencias de vida, Jesús Mateo Calderón y Albano Quinn. Cuadernos IDECA Nº 02 – julio 2011</strong></a>
                    <a href=""><span class="fa fa-files-o"></span><strong>Diálogos A Nº 5. Culturas, Espiritualidades y Desarrollo Andino-Amazónico. “Economías populares”. Noviembre 2013</strong></a>
                    <a href=""><span class="fa fa-files-o"></span><strong>Diálogos A Nº 3. Culturas, Espiritualidades y Desarrollo Andino-Amazónico. “Identidades y culturas juveniles”</strong></a-->
                        <tr><td colspan="2">
                        <!--a href="<?php echo get_category_link(83); ?>" class="btn btn-publi pull-right" style="margin-left: 10px;">Videos Nuevos</a-->
                        <a href="<?php echo get_category_link($link[0]); ?>" class="btn btn-publi pull-right">Más Audios » </a></td></tr>
                        </tbody>
                </table>
                    
                </div>
            </div>
        <?php if(!is_category(84)): ?>
            <div class="opiniones">
                <h2 class="tit">Últimos Videos</h2>
                <?php $custom_query =  new WP_Query( array( 'post_type' => 'any','category_name'=>'Videos', 'posts_per_page'=>3 ,'orderby'=>'date', 'order' => 'DESC','paged' => get_query_var('page')) ); ?>  
                <ul class="for-vids">
                    <?php $numa = 0;$r=0; $s=0; while($custom_query->have_posts()) : $custom_query->the_post(); ?>     
                    <li><a href="<?php the_permalink(); ?>"><i class="fa fa-video-camera"></i><?php the_title(); ?></a></li>
                    <?php endwhile;?>
                </ul>
                <a href="<?php echo get_category_link(84); ?>" class="btn btn-opiniones pull-right">Más Videos » </a>
            </div> 
        <?php endif; ?>
            
            <div class="accesos">
                <h2 class="tit">Enlaces Externos</h2>
                <div class="link-acc">
                    <a href="http://www.muqui.org/" target="_blank" class="acc1"><img src="<?php echo get_template_directory_uri(); ?>/image/muqui.jpg" alt=""></a>
                    <a href="http://casadelcorregidor.pe/" target="_blank" class="acc2"><img src="<?php echo get_template_directory_uri(); ?>/image/casa-corregidor.jpg" alt=""></a>
                    <a href="http://pluralidades.casadelcorregidor.pe" target="_blank" class="acc3"><img src="<?php echo get_template_directory_uri(); ?>/image/pluralidades.jpg" alt="" class=""></a>
                </div>
            </div>
            <!--div class="informes">
                <h2 class="tit">Informes</h2>
                <p><strong>Coord(a): </strong>Cesar Barahona Calderón</p>
                <p><strong>Celular: </strong>(+51) 997 777612</p>
                <p><strong>Telf. Fijo: </strong>(+51) 51 205547</p>
                <p><strong>Fax: </strong>(+51) 51 357415</p>
                <p><strong>Email: </strong>barkallia@<span style="display:none">nulo</span>hotmail.com</p>
            </div-->
            
            
            <div class="fb2">
                <div class="fb-page" data-href="https://www.facebook.com/ideca.peru" data-height="350" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/ideca.peru"><a href="https://www.facebook.com/ideca.peru">Ideca Perú</a></blockquote></div></div>
            </div>


        </div>