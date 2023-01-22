<?php
/*Template Name: Inicio*/
 get_header(); 
 ?>
<div class="container" style="position:relative">
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
		        <?php echo wp_get_attachment_image( $img_id, 'img-848x636 progres' ); ?>
		        <div class="titulo-slide">"<?php echo $titulo;//.' '.$descripcion; //echo get_post_meta($img_id, '_wp_attachment_image_alt', true); ?>"</div>
		    </li>
            <?php endforeach;wp_reset_postdata(); ?>      
        <?php }?>        
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
            <?php $custom_query =  new WP_Query( array( 'post_type' => 'any','category_name'=>'noticias', 'posts_per_page'=>6 ,'orderby'=>'date', 'order' => 'DESC','paged' => get_query_var('page')) ); ?>  
            <?php while($custom_query->have_posts()) : $custom_query->the_post(); ?>                     
            <div class="noticias">
                <div class="for-fecha"><span class="fa fa-calendar"></span> Publicado: <?php echo get_elapsed_time();  ?></div>
                <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                <div class="cont-noticia" style="text-align:justify">
                    <?php 
                        $galeria = get_post_gallery(get_the_ID(), false);
                        $galeria_ids = explode(',', $galeria['ids']);
                        $var1=wp_get_attachment_image( $galeria_ids[0], 'thumbnail' );//img galeria	
                        $var2=get_image_post('thumbnail');//img primera img		                        	

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
                    ?> 
                    
                    	<?php the_excerpt(100); ?>
                    
                </div>
            </div>
        	<?php endwhile;?>
                  
            
            <div class="mas-noticias">
                <table class="table">
                    <tbody>
                        <?php $custom_query =  new WP_Query( array( 'post_type' => 'any','category_name'=>'noticias', 'posts_per_page'=>10 ,'orderby'=>'date', 'order' => 'DESC','paged' => get_query_var('page')) ); ?>  
                        <?php
                            $link = array(3);
                            $x = 0; 
                            while($custom_query->have_posts()) : $custom_query->the_post(); 
                            $t_a = get_the_date();
                            $t_b = explode(" ", $t_a);
                            $dia = $t_b[0];
                            $mes = substr($t_b[1], 0,3);
                            $anio = $t_b[2];
                            $fecha = $dia.' '.$mes.', '.$anio;
                            $x++;
                            if($x > 6){
                        ?> 
                        <tr>
                            <td style="width:100px;"><?php echo $fecha; ?></td>
                            <td><a href="<?php the_permalink(); ?>"><strong><?php the_title(); ?></strong></a></td>
                        </tr>
                    
                  

	            <!--p><span></span><a href="<?php the_permalink(); ?>"><strong><?php the_title(); ?></strong></a></p-->
	        	<?php }
                endwhile;?>
                </tbody>
                </table>
                <a href="<?php echo get_category_link($link[0]); ?>" class="btn btn-mas pull-right">Más noticias » </a>
            </div>
        </div>
        <?php get_sidebar(); ?>
    </div>
</div>

<?php  get_footer(); ?>