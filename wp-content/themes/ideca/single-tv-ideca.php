<?php

get_header();
 if (have_posts()) : while (have_posts()) : the_post();

?>
<div class="container">	
	<div class="main-titulo fnd-naranja"><h1><?php $categoria = get_the_category();
			$parent = get_cat_name($categoria[0]->category_parent);
			if (!empty($parent)) {
				echo $parent;
				$nom = $parent;
			} else {
			    echo $categoria[0]->cat_name;
			}?></h1>
		</div>
	<div class="row">
		
		<div class="col-sm-8 fuente">
			<div class="breads"><?php get_breadcrumbs(); ?></div>
			<div><h1 class="pst f-francois"><?php the_title(); ?></h1></div>
			<div class="parte-autor">
					<?php $cat = get_the_category(); ?>
					<strong><i class="fa fa-user"></i></strong> <?php the_author(); ?> | <strong><?php echo $cat[0]->name; ?></strong> - <strong><i class="fa fa-clock-o"></i></strong> <?php echo the_date(); ?>
					<?php 
					// var_dump(the_author());
					// var_dump(get_the_category());
					
					; 
					// $parentcat = get_cat_name($category[0]->category_parent);
					?>
				</div>
			<div class="for-videm" style="text-align: justify;">
				<?php 
				the_content();
				?>
        	</div>
        	<div class="f-rad">
			<?php 
				//echo wpautop($contenido[1]);
			?>
			<div class="for-tags">
				<?php $eti = get_the_tags(); ?>
				<?php //echo get_tag_link($eti[0]->term_id); ?>
				<strong>Etiquetas </strong> 
				<?php 
				if($eti):
				foreach ($eti as $key) {
				?>
				<a href="<?php echo get_tag_link($key->term_id); ?>"><?php echo $key->name; ?></a>
				<?php
				}
				else:
					echo "Sin Etiquetas";
				endif;
				?>				
			</div>
			</div>
			<!--a href="<?php echo get_category_link(3); ?>" class="btn btn-mas pull-right">Mas noticias » </a-->
			<div class="otro-rad">
				<h3 class="tit dorado">Todos los programas</h3>
				<table class="table table-hover table-condensed tablita">
					<tbody>
			            <?php $custom_query =  new WP_Query( array( 'post_type' => 'any', 'post__not_in' => array(get_the_ID()),'category_name'=>'tv-ideca', 'posts_per_page'=>7 ,'orderby'=>'date', 'order' => 'DESC','paged' => get_query_var('page')) ); ?>  	            
			            <?php $exis = 0; while($custom_query->have_posts()) : $custom_query->the_post(); 
			            	/*$for_c = explode('[/embed]', get_the_content());
							$for_con = explode('.be/', $for_c[0]);
							$vid_img = 'https://i.ytimg.com/vi/'.$for_con[1].'/mqdefault.jpg';*/
							$for_c = explode('[/embed]', get_the_content());
							// if(!empty($for_c)){echo "Hola";}else{echo "Como";}
	      //           		var_dump($thumbID);
							$for_con = explode('.be/', $for_c[0]);
							/*var_dump($for_con[1]);
							if(isset($for_con[1])){							
								$vid_img = 'https://i.ytimg.com/vi/'.$for_con[1].'/mqdefault.jpg';
							}else{
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
							}*/
			            ?>
			            	<tr>
								<td class="enla-au"> 
									<div class="mi-vide">
										<a href="<?php the_permalink(); ?>">
											<?php if(isset($for_con[1])): $vid_img = 'https://i.ytimg.com/vi/'.$for_con[1].'/mqdefault.jpg';?>
											<img src="<?php echo $vid_img; ?>" alt="<?php echo the_title(); ?>">
											<?php else: 
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
											endif; ?>
											<h5><?php the_title(); ?></h5>
											<p><i class="fa fa-calendar"></i> <?php echo get_elapsed_time(); ?></p>
										</a>
									</div>
								</td>
								<td class="for-ics">
									<a href="#" class="btn btn-xs btn-radio pull-right"><i class="fa fa-play"></i> Ver</a>
								</td>
							</tr>                   	                
			            <?php 
			            endwhile;
			            ?>	
		        	</tbody>
	            </table>
	            <a href="<?php echo get_category_link($cat[0]->term_id); ?>" class="btn btn-mas pull-right">Ver más » </a>	        
			</div>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php
endwhile; endif;
get_footer();
