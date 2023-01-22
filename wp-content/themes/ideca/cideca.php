<?php 
/*Template Name: CIDECA
*/
get_header();
if (have_posts()) : while (have_posts()) : the_post();

?>
	<div class="container">	
		<div class="main-titulo fnd-azul" ><h1><?php the_title();?></h1></div>
		<div class="row">
			<div class="col-sm-8 for-fotos arreglo4">	
			<div class="breads"><?php get_breadcrumbs(); ?></div>	
				<?php 
					$galeria = get_post_gallery(get_the_ID(), false);
	              $galeria_ids = explode(',', $galeria['ids']);
	              $var1=wp_get_attachment_image( $galeria_ids[0], 'img-80x70' );//img galeria 
	              $var2=get_image_post('img-80x70');//img primera img                             
	                if(has_post_thumbnail()){
	                  the_post_thumbnail('img-80x70');
	                }else{
	                  if($var2!=''){
	                    echo $var2;
	                  }else{
	                    if($var1!=''){
	                      echo $var1;
	                    }
	                  }
	                }
	                                              
				 ?>
				<?php 
			        $conte = get_the_content();
			        $conten = explode('/>', $conte);
			        $content = $conten[1];
			        $content = apply_filters('the_content', $content);
			        $content = str_replace(']]>', ']]&gt;', $content);
			        
			        if(!empty($content)){
			        	echo $content;
			        }else{
			        	the_content();
			        }
				 ?>
				<hr>
				<h4 class="cursos" style="padding-left:0;">Miembros CIDECA</h4>
				<div>
					<?php $custom_query =  new WP_Query( array( 'post_type' => 'any','category_name'=>'miembros-cideca', 'posts_per_page'=>-1 ,'orderby'=>'menu_order', 'order' => 'DESC','paged' => get_query_var('page')) ); ?>  
            		<?php $x=0; while($custom_query->have_posts()) : $custom_query->the_post(); ?> 
            			<div class="col-sm-6 cont-miembros">
            				<div class="row">
	            			<div class="col-sm-4">
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
	            			<div class="col-sm-8">
	            				<div style="font-weight:bold"><?php the_title(); ?></div>
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
									          <div class="panel-title" style="font-size:14px;">+ Curriculum Resumido</div>
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
            			</div>		
            		<?php endwhile; ?>
				</div>
				
				<a href="http://idecaperu.org/aulavirtual/" class="btn btn-aula pull-right"><i class="fa fa-graduation-cap"></i> Ingresar a nuestra Aula Virtual</a>
			</div>
			<?php get_sidebar(); ?>
		</div>

	</div>
<?php 
endwhile; endif;
get_footer(); 