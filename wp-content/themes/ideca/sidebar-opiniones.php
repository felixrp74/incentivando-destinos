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
    <h2 class="titulo-nuevo for-uno"> <i class="fa fa-calendar"></i> Eventos destacados</h2>
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
        <h3 class="titulo-nuevo for-dos"><i class="fa fa-pie-chart"></i> Encuesta IDECA</h3>        
        <?php $ider2=6972; $custom_query =  new WP_Query( array( 'post_type' => 'post','category_name'=>'encuestas', 'posts_per_page'=>1 ,'orderby'=>'date', 'order' => 'DESC') ); ?>  
        <?php $exis = 0; while($custom_query->have_posts()) : $custom_query->the_post();
        $activo=get_post_meta($post->ID, 'Activado', true);   
        
        $el_id = intval(preg_replace('/[^0-9]+/', '', get_the_content()), 10);  
         
        if(!empty($activo)){            
            $cone = explode(']', get_the_content());
            $cone2 = explode('[', $cone[0]);
            // var_dump($cone2);
            $encu = "[".$cone2[1]."]";
            echo do_shortcode(wpautop($encu));
            // var_dump($encu);
        //the_content(); ?>
        <a href="<?php the_permalink(); ?>" class="btn btn-mol">Ver resultados</a>
        <?php
        }else{
        ?>
        <div class="pef" style="border:1px solid red">

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
                <a href="<?php the_permalink(); ?>" class="btn btn-mol">Ver más resultados</a>
            </div>            
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
    <div class="radio-nuevo">
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
        
            <img src="<?php echo get_template_directory_uri(); ?>/image/icons/rad.png" alt="">
            <h3 class="titulo-nuevo for-tres">Radio IDECA <span><?php echo $autoplay; ?></span> <?php echo $estado; ?> </h3>
            <p><strong>Próximo Programa:  </strong><?php the_title(); ?></p> 
            <?php endwhile; wp_reset_query();?>   
        </a>     
    </div>
    <?php
    }
    ?>  
      
    <?php 
    if(!is_category(37)): ?>
    <div class="new-cat1 nc">
        <a href="<?php echo get_category_link(37); ?>" class="limpio">
            <img src="<?php echo get_template_directory_uri(); ?>/image/icons/books.png" alt="">
            <h3 class="titulo-nuevo for-otro" style="margin-bottom:0px;padding-bottom:0px"><?php echo get_cat_name(37); ?></h3>            
            <p style="margin-top:3px;padding-top:3px;color:rgba(255,255,255,.8);"><span class="f-francois">Ultima Publicación: </span>
            <?php 
             $opinis =  new WP_Query( array( 'post_type' => 'any','category_name'=>'opiniones', 'posts_per_page'=>1 ,'orderby'=>'date', 'order' => 'DESC','paged' => get_query_var('page')) );
             $numa = 0;$r=0; $s=0; while($opinis->have_posts()) : $opinis->the_post();
                echo the_title();        
             endwhile;
             ?>
            </p>
        </a>
    </div>  
    <?php endif; ?>
    <div class="new-cat2 nc">
        <a href="<?php echo get_category_link(83); ?>" class="limpio">
            <img src="<?php echo get_template_directory_uri(); ?>/image/icons/audio2.png" alt="">
            <h3 class="titulo-nuevo for-otro"><?php echo get_cat_name(83); ?></h3>
            <p style="color:rgba(255,255,255,.8);"><span class="f-francois">Ultima Publicación: </span>            
                <?php 
                 $auds =  new WP_Query( array( 'post_type' => 'any','category_name'=>'audios', 'posts_per_page'=>1 ,'orderby'=>'date', 'order' => 'DESC','paged' => get_query_var('page')) );
                 while($auds->have_posts()) : $auds->the_post(); echo the_title(); endwhile;
                 ?>
            </p>
        </a>
    </div>
    <?php if(!is_category(84)): ?>
        <div class="new-cat3 nc">
            <a href="<?php echo get_category_link(84); ?>" class="limpio">
                <img src="<?php echo get_template_directory_uri(); ?>/image/icons/video.png" alt="">
                <h3 class="titulo-nuevo for-otro"><?php echo get_cat_name(84); ?></h3>
                <p style="color:rgba(255,255,255,.8);"><span class="f-francois">Ultima Publicación: </span>    
                    <?php 
                     $videss =  new WP_Query( array( 'post_type' => 'any','category_name'=>'videos', 'posts_per_page'=>1 ,'orderby'=>'date', 'order' => 'DESC','paged' => get_query_var('page')) );
                     while($videss->have_posts()) : $videss->the_post(); echo the_title(); endwhile;
                     ?>
                </p>
            </a>
        </div>
            <!--div class="opiniones">
                <h2 class="tit">Últimos Videos</h2>
                <?php $custom_query =  new WP_Query( array( 'post_type' => 'any','category_name'=>'Videos', 'posts_per_page'=>3 ,'orderby'=>'date', 'order' => 'DESC','paged' => get_query_var('page')) ); ?>  
                <ul class="for-vids">
                    <?php $numa = 0;$r=0; $s=0; while($custom_query->have_posts()) : $custom_query->the_post(); ?>     
                    <li><a href="<?php the_permalink(); ?>"><i class="fa fa-video-camera"></i><?php the_title(); ?></a></li>
                    <?php endwhile;?>
                </ul>
                <a href="<?php echo get_category_link(84); ?>" class="btn btn-opiniones pull-right">Más Videos » </a>
            </div--> 
        <?php endif; ?>
            
            <!--div class="accesos">
                <h2 class="tit">Enlaces Externos</h2>
                <div class="link-acc">
                    <a href="http://www.muqui.org/" target="_blank" class="acc1"><img src="<?php echo get_template_directory_uri(); ?>/image/muqui.jpg" alt=""></a>
                    <a href="http://casadelcorregidor.pe/" target="_blank" class="acc2"><img src="<?php echo get_template_directory_uri(); ?>/image/casa-corregidor.jpg" alt=""></a>
                    <a href="http://pluralidades.casadelcorregidor.pe" target="_blank" class="acc3"><img src="<?php echo get_template_directory_uri(); ?>/image/pluralidades.jpg" alt="" class=""></a>
                </div>
            </div-->
            
            <div class="fb2">
                <div class="fb-page" data-href="https://www.facebook.com/ideca.peru" data-tabs="timeline" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/ideca.peru" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/ideca.peru">Ideca Perú</a></blockquote></div>
            </div>

        </div>