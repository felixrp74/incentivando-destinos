<?php  
/*Template Name: Somos*/

get_header(); 
?>
<?php if (have_posts()) : while (have_posts()) : the_post();?>
	<div class="container">	
		<div class="main-titulo"><h1><?php the_title(); ?></h1></div>		
			<div class="row">				
				<div class="col-sm-8 for-fotos">
					<div class="breads"><?php get_breadcrumbs(); ?></div>
					<?php 
					$content = get_the_content(); 
					$cont = explode("<h3>", $content);
					$conta = count($cont);
					//echo $conta;
					//$x = 1;
					for ($i = 1;$i<$conta;$i++) {
						?>
					<div class="cont-somos">
						
							<?php
							$tit = explode("</h3>", $cont[$i]);							
							echo '<h2 class="titulo_'.$i.'">'.$tit[0].'</h2>';
							$gall = explode('[gallery', $tit[1]);
							$cont_gall = count($gall);
							
							if($cont_gall > 1){
							echo '<p>'.$gall[0].'</p>';
							echo '<div class="row">';
							$galeria = get_post_gallery(get_the_ID(),false);
							$galeria_ids = explode(',', $galeria['ids']);
							$resultado = count($galeria_ids);

							if($galeria!=''){
							?>
							<?php 
							$temp = 0;
							foreach($galeria_ids as $img_id): 
								$temp++;
								$pt = get_post($img_id);
								$titulop = $pt->post_title;
								$anios = $pt->post_excerpt;
							?>							
								<div class="col-sm-3">
									<div class="cont-omas">
										<?php echo wp_get_attachment_image( $img_id, 'thumbnail' ); ?>
										<strong><?php echo $titulop; ?></strong>
										<span><?php echo $anios; ?></span>
									</div>
								</div>
							<?php if($temp % 4 == 0){echo '</div><div class="row">'; } endforeach; ?>	
							<?php } echo '</div>'; 
						}else{ echo '<p>'.$tit[1].'</p>'; }
							?>
						
						
					</div>
						<?php
						
					}
					?>


					<div>
						<?php $custom_query =  new WP_Query( array( 'post_type' => 'any','category_name'=>'miembros-ideca', 'posts_per_page'=>-1 ,'orderby'=>'menu_order', 'order' => 'DESC','paged' => get_query_var('page')) ); ?>  
	            		<?php $x=0; while($custom_query->have_posts()) : $custom_query->the_post(); ?> 
	            			<div class="row cont-miembros">
		            			<div class="col-sm-2">
		            				<?php 
		            				$x++;
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
		            			</div>
		            			<div class="col-sm-10">
		            				<h4><?php the_title(); ?></h4>
		            				<?php 	            				
		            				$institucion=get_post_meta($post->ID, 'Institucion', true); 
		            				$correo = get_post_meta($post->ID,'Correo',true);
		            				?>
		            				<?php if(!empty($institucion)){echo '<span>'.$institucion.'</span>';} ?>
		            				<?php if(!empty($correo)){echo '<div class="ema">'.$correo.'</div>';} ?>
		            				<div class="cont-cv">
		            					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
										  <div class="panel panel-default">
										    <div class="panel-heading btn-cv" role="tab" id="heading<?php echo $x;?>">
										      
										        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $x;?>" aria-expanded="false" aria-controls="collapseThree">
										          <h4 class="panel-title">+ Curriculum Resumido</h4>
										        </a>
										      
										    </div>
										    <div id="collapse<?php echo $x;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $x;?>">
										      <div class="panel-body">
										        <?php 
												$content_post = get_post();
										        $content = $content_post->post_content;
										        $content = apply_filters('the_content', $content);
										        $content = str_replace(']]>', ']]&gt;', $content);
										        
												$contenido = explode('" />', $content);

										        echo '<div style="text-align:justify">'.$contenido[1].'</div>';
												?>
										      </div>
										    </div>
										  </div>
										</div>
		            				</div>
		            			</div>
	            			</div>
	            			<hr>
	            			
	            		<?php endwhile; ?>
					</div>
				</div>
				<?php get_sidebar(); ?>
			</div>
			<!--h1><?php the_title() ?> g</h1-->
					
		</div>
	</div>
		
<?php endwhile; endif; ?>
<?php  get_footer(); ?>