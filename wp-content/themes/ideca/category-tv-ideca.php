<?php
global $query_string;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts($query_string.'&paged='.$paged.'&posts_per_page=4');

get_header();

?>
<?php //if (have_posts()) : while (have_posts()) : the_post();?>
<div class="container"> 
    <div class="main-titulo fnd-rojo" ><h1><?php single_cat_title(); ?></h1></div>
    <div class="row">
	<div class="col-sm-8">
		<div class="breads"><?php get_breadcrumbs(); ?></div>
			<hr>
			<h3 class="tit dorado">Todos los Videos</h3>
			<div class="raddio" style="background:#E6C64B;margin-bottom: 20px;">
	<div class="radio-online" style="display: inline-block;width:100%">
		<?php $custom_query =  new WP_Query( array( 'post_type' => 'any','meta_key' => 'Online','category_name'=>'tv-ideca', 'posts_per_page'=>1 ,'orderby'=>'date', 'order' => 'DESC','paged' => get_query_var('page')) ); ?>  
		<?php 					
		if($custom_query->have_posts()){
			$hor=get_post_meta($post->ID, 'hora', true); 
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
					$autoplay = 'autoplay';
					$estado = "En vivo";
					$ico = '<span></span><i class="par"></i><strong>En vivo</strong>';
				}
				else{
					$autoplay = 'style="display:none"';
					$estado = "offline";
					$ico = '';
				};
			}else{
				$autoplay = 'style="display:none"';
					$estado = "offline";
					$ico = '';
			}
								
		}else{
			$estado = "Offline";
			$autoplay = 'style="display:none"';
			$ico = '';
		}
		?>
		
		<div class="onl col-sm-5">
			<div class="cont-audio">
				<div class="online">								
					<div class="for-r-i">
						<img style="width: 100%; height: auto;" src="<?php echo get_template_directory_uri(); ?>/image/tv.jpg" alt="">
						<p class="parpa"><?php echo $ico; ?></p>
						<p class="txt-onl">TV IDECA<br><strong><?php echo $estado; ?></strong></p>								
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-7 online-txt">
		<!--audio controls autoplay preload><source src="http://giss.tv:8000/pacharadio.mp3" type="audio/ogg">tu navegador no soporta este audio</audio-->	
			<?php while($custom_query->have_posts()) : $custom_query->the_post(); 
				/*$onli2=get_post_meta($post->ID, 'Online', true); 
				if(empty($onli2)){echo 'Bien';}
				else{echo 'Mal';}*/		
				
			?>
			
			<div class="noticias for-radio" style="border-bottom:0px;">		                                
                <div class="cont-radio row">
                	<div class="col-sm-12">
                		<a href="<?php the_permalink(); ?>"><h3 style="padding-top: 10px;"><?php the_title(); ?></h3></a>	
                		<div class="for-fecha" style="margin-bottom:5px"><span class="fa fa-calendar"></span> Publicado: <?php the_date(); ?></div>
                		<div style="text-align: justify;" >
							<?php the_excerpt(130);?>
                         </div>
                	</div>                    
                </div>
            </div>
			<?php endwhile;  ?>	
		</div>
	</div>
</div>
	            
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<div class="noticias for-radio">		                                
	                <div class="cont-radio row">
	                	<div class="col-sm-3">
	                		<?php //$img = get_image_post('thumbnail', get_the_id(), 'left'); if(!empty($img)): ?>	
	                		<?php 
	                		$thumbID = get_post_thumbnail_id( $post->ID );

							$imgDestacada = wp_get_attachment_image_src( $thumbID, 'thumbnail' ); // Sustituir por thumbnail, medium, large o full							
							$for_c = explode('[/embed]', get_the_content());
							// if(!empty($for_c)){echo "Hola";}else{echo "Como";}
	      //           		var_dump($thumbID);
							$for_con = explode('.be/', $for_c[0]);
							// var_dump($for_con[1]);
							if(isset($for_con[1])){							
								$vid_img = 'https://i.ytimg.com/vi/'.$for_con[1].'/mqdefault.jpg';
							//$onli=get_post_meta($post->ID, 'Online', true);
	                		?>
	                		<div class="esconde2" style="text-align:center !important;">
	                			<a href="<?php the_permalink(); ?>" style="height:140px;border:1px solid gold"><img src="<?php echo $vid_img; ?>" alt="<?php the_title(); ?>"></a>
	                		</div>
	                		<?php //endif; ?>
	                		<?php
	                			}else{
									// Definimos el contenido de la entrada a una variable
									$szPostContent = $post->post_content;
									// Defininimos el patrón a buscar
									$szSearchPattern = '~<img [^\>]*\ />~';
									// Ejecutamos preg_match_all para obtener todas las imágenes y guardar los resultados en $aPics
									preg_match_all( $szSearchPattern, $szPostContent, $aPics );
									// Contamos los resultados
									 $iNumberOfPics = count($aPics[0]);
									// Comprobación de si hay al menos 1 imagen
									if ( $iNumberOfPics > 0 )
									{
									     // Ahora hacemos lo que sea con las imágenes
									     // En este ejemplo se muestran las imágenes
									for ( $i=0; $i < $iNumberOfPics ; $i++ ) {
									          echo $aPics[0][$i];
									     };
									};
								}
							?>
	                	</div>
	                	<div class="col-sm-9 grabacion">
	                		<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>	
	                		<div class="for-fecha" style="margin-bottom:2px"><span class="fa fa-calendar"></span> Publicado: <?php the_date(); ?></div>
	                		<div style="text-align: justify;">
								<?php the_excerpt(); ?>
							 </div>
	                         <!-- <p>
	                         	<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no, toolbar=no, resizable=yes, scrollbars=yes, height=300, width=600'); return false;" class=" btn btn-xs btn-radio"><span class="fa fa-facebook"></span></a>
	                         </p> -->
	                         
	                	</div>                    
	                </div>
	            </div>
			<?php endwhile; endif; ?>
	            <?php
	            $big = 999999999;
	            $paginacion = paginate_links(array(
	                    'base' => str_replace( $big, '%#%', get_pagenum_link($big) ),
	                    'current' => max( 1, get_query_var('paged') ),
	                    'total' => $wp_query->max_num_pages,
	                    'mid_size' => 1,
	                    'type' => 'list'
	            ));
	            echo str_replace( "<ul class='page-numbers'>", '<ul class="pagination paginacion">', $paginacion );
	    wp_reset_query(); ?>
	</div>
	<?php get_sidebar(); ?>

</div>
<?php wp_reset_query(); ?>
</div>

<?php
//get_sidebar();
get_footer();

?>