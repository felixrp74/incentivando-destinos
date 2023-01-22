<div class="col-sm-4 derecho">   
<div class="relac accesos">
    <h2 class="tit">Opiniones recientes</h2>
        <?php   $id=get_the_id(); $padre=get_category_parents($id); $custom_query =  new WP_Query( array( 'post_type' => 'post', 'post__not_in' => array($id),'category_name'=>'opiniones','posts_per_page'=>-1 ,'orderby'=>'date', 'order' => 'DESC') );?>                   
           <ul class="lista-rt" >         
                <?php while($custom_query->have_posts()) : $custom_query->the_post(); ?>                                            
                  <li class="br5-owh">
                      <a href="<?php the_permalink(); ?>" class="br5-owh"> <i class="fa fa-hand-o-right	"></i>                              
                        <?php the_title();?>
                        
                      </a> 
                  </li>  
                 <?php endwhile; ?>
               <?php wp_reset_postdata(); ?>          
          </ul>   
      <?php   //echo do_shortcode('[wpc-weather id="584"]');?> 
    </div>

    <div class="eventos">
    <h2 class="tit">Eventos destacados</h2>
        <ul id="eventos">
            <?php $custom_query =  new WP_Query( array( 'post_type' => 'any', 'post__not_in' => array($id),'category_name'=>'noticias','meta_key' => 'Destacar', 'posts_per_page'=>5 ,'orderby'=>'date', 'order' => 'DESC','paged' => get_query_var('page')) ); ?>  
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
            <div class="publicaciones">
                <h2 class="tit">Publicaciones Recientes</h2>
                <div class="publi-cont">
                    <table class="table table-responsive">
                    <tbody>
                        
                    <?php $custom_query =  new WP_Query( array( 'post_type' => 'any','category_name'=>'publicaciones', 'posts_per_page'=>4 ,'orderby'=>'date', 'order' => 'DESC','paged' => get_query_var('page')) ); ?>  
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
                        <tr><td colspan="2"><a href="<?php echo get_category_link($link[0]); ?>" class="btn btn-publi pull-right">Más publicaciones » </a></td></tr>
                        </tbody>
                </table>
                    
                </div>
            </div>
            <!--div class="opiniones alert">
                <a href="<?php echo get_category_link(21); ?>"><strong><i class="fa fa-graduation-cap"></i><?php echo get_cat_name(21); ?></strong></a>
            </div>
            <div class="accesos">
                <h2 class="tit">Enlaces Externos</h2>
                <div class="link-acc">
                    <a href="http://www.muqui.org/" target="_blank" class="acc1"><img src="<?php echo get_template_directory_uri(); ?>/image/muqui.jpg" alt=""></a>
                    <a href="http://casadelcorregidor.pe/" target="_blank" class="acc2"><img src="<?php echo get_template_directory_uri(); ?>/image/casa-corregidor.jpg" alt=""></a>
                    <a href="http://pluralidades.casadelcorregidor.pe" target="_blank" class="acc3"><img src="<?php echo get_template_directory_uri(); ?>/image/pluralidades.jpg" alt="" class=""></a>
                </div>
            </div>
            <div class="fb2">
                <div class="fb-page" data-href="https://www.facebook.com/ideca.peru" data-height="350" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/ideca.peru"><a href="https://www.facebook.com/ideca.peru">Ideca Perú</a></blockquote></div></div>
            </div-->
        </div>