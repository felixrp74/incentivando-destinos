<?php
global $query_string;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts($query_string.'&paged='.$paged.'&posts_per_page=3');

get_header();

?>
<?php //if (have_posts()) : while (have_posts()) : the_post();?>
<div class="container">
	<div class="main-titulo fnd-rojo"><h1><?php single_cat_title(); ?></h1></div>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-8">
			<div class="breads"><?php get_breadcrumbs(); ?></div>
			
			<h3 class="tit dorado">AUDIOS PUBLICADOS</h3>

			<div class="raddio" style="background:#E6C64B;margin-bottom: 20px;">
				<div class="radio-online" style="display: inline-block;width:100%">
					<?php $custom_query =  new WP_Query( array( 'post_type' => 'any','meta_key' => 'Online','category_name'=>'radio-ideca', 'posts_per_page'=>1 ,'orderby'=>'date', 'order' => 'DESC','paged' => get_query_var('page')) ); ?>  
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
									<img src="<?php echo get_template_directory_uri(); ?>/image/icons/rad.jpg" alt="">
									<p class="parpa"><?php echo $ico; ?></p>
									<p class="txt-onl">Radio IDECA<br><strong><?php echo $estado; ?></strong></p>								
								</div>
							</div>
							<audio controls <?php echo $autoplay; ?>><source src="http://giss.tv:8000/pacharadio.mp3" type="audio/mp3">tu navegador no soporta este audio</audio>	
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
					<?php if($estado != 'offline'): ?>
					<!--div>
								<p>
<script language="Javascript">document.oncontextmenu = function(){return false}</script>			<object align="middle" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" height="300" id="aacplayer" width="100"><param name="movie" value="/aacplayer.swf"><param name="quality" value="best"><param name="bgcolor" value="#141414"><param name="loop" value="false"><param name="wmode" value="transparent"><param name="scale" value="showall"><param name="menu" value="false"><param name="devicefont" value="false"><param name="salign" value=""><param name="FlashVars" value="uid=9307fcd1c25b44baf99bb17768e6fe11"><object data="http://www.playerstreaming.com/generador_premium_limpios/02/aacplayer.swf" height="320" type="application/x-shockwave-flash" width="100%"><param name="movie" value="http://www.playerstreaming.com/generador_premium_limpios/02/aacplayer.swf"><param name="quality" value="best"><param name="loop" value="false"><param name="wmode" value="transparent"><param name="scale" value="exactfit"><param name="devicefont" value="false"><param name="salign" value=""><param name="FlashVars" value="uid=9307fcd1c25b44baf99bb17768e6fe11"><a href="http://www.adobe.com/go/getflash"><img alt="Get Adobe Flash player" src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif"></a></object></object></p>
							</div-->
					<?php endif; ?>
									
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
	                		?>
	                		<div class="esconde2" style="text-align:center !important">
		                		<a href="<?php the_permalink(); ?>" class="molto">
			                		<?php 
			                		if(!empty($imgDestacada)){
			                			echo '<img src="'.$imgDestacada[0].'" alt="">';
			                		}else{
			                			echo '<img src="'.get_template_directory_uri().'/image/icons/audio.png" alt="" style="height:130px;width:auto !important;margin-left:10%" >';
			                		}
			                		?>	                				                		
			                		<span>Leer más</span>
		                		</a>
	                		</div>
	                		<?php //endif; ?>
			                	</div>
			                	<div class="col-sm-9 grabacion">
				                	<div class=" for-audi-cont">
				                		<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>	
		                				<div class="for-fecha au-f"><span class="fa fa-calendar"></span> Publicado: <?php the_date(); ?></div>
		                				<?php 
				                			$co = explode('"]', get_the_content());
				                			$g2 = explode('"', $co[0]);
				                			$au = $g2[0].'"'.$g2[1].'"][/audio]';
				                			
				                			$autores = get_post_meta($post->ID, 'Autores', true);
				                			$audio = get_post_meta($post->ID, 'enclosure', true);
				                			$ad = explode('<br />', nl2br($audio));
				                         ?>
				                         <div class="au-resumen"><?php the_excerpt(); ?></div>
				                        <!-- <p><?php echo $autores; ?></p> -->
				                        <div class="row">
				                        	<div class="col-sm-9"><div class=""><?php if(!empty($co[1])): echo do_shortcode($au); else: echo ''; endif; ?></div></div>
				                        	<div class="col-sm-3 para-btn"><a href="<?php echo $ad[0]; ?>" download class="btn btn-xs btn-danger"><i class="fa fa-download"></i> Descargar audio</a></div>
				                        </div>
		                         		<!-- <div class="play-audio"><?php if(!empty($co[1])): echo do_shortcode($au); else: echo ''; endif; ?></div> -->
		                         		<!-- <a href="<?php echo $ad[0]; ?>" download class="btn btn-xs btn-descarga"><i class="fa fa-download"></i> Descargar audio</a> -->
			                        </div>	                         
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
</div>

<?php
//get_sidebar();
get_footer();

?>