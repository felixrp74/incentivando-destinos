<?php

get_header();
 if (have_posts()) : while (have_posts()) : the_post();

?>
<div class="container">	
	<div class="main-titulo"><h1><?php $categoria = get_the_category();
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
			<div><h1 class="pst"><?php the_title(); ?></h1></div>
			<div class="audio-img">
				<?php 
				$cont = get_the_content(); 
				$contenido = explode("[/audio]", $cont);
				
				if(!empty($contenido[1])):
					$audi = $contenido[0]."[/audio]";
					$conten = wpautop($contenido[1]);					
				else:
					$audi = '<p style="text-align:left;color:gold;">Sin audio</p>';
					$conten = get_the_content();
					$imang = '<img src="'.get_template_directory_uri().'/image/icons/audio.png" alt="" style="height:130px;width:auto !important;margin-left:10%" >';
				endif;
				
				$autores = get_post_meta($post->ID, 'Autores', true);
    			$aud = get_post_meta($post->ID, 'enclosure', true);
    			$ad = explode('<br />', nl2br($aud));
				//var_dump($audi);
				?>
				<div class="">
					<div class="for-audio back2">
						<div class="" style="padding: 15px 0 10px 0;display: inline-block;width: 100%">							
							<div class="col-sm-7 for-text">
								<h4 style="text-align: left;color: #fff">RADIO IDECA</h4>
								<?php if(!empty($autores)): ?><p><strong>Autores: </strong><?php echo $autores; ?></p><?php endif; ?>
								<p style="margin-bottom: 0">Instituto de Estudios de las Culturas Andinas (IDECA)</p>
								<p class="fecha"><i class="fa fa-calendar"></i> <?php the_date(); ?></p>
							</div>
							<div class="col-sm-5 audi-im"><?php if(!empty($contenido[1])): the_post_thumbnail('large');  else: echo $imang; endif; ?></div>
						</div>
						<div class="">
						<div class="col-sm-7">
								<div class="para-cont">

									<?php if(!empty($contenido[1])): ?><a href="<?php echo $ad[0] ?>" download class="btn btn-xs"><i class="fa fa-download"></i> Descargar</a><?php endif; ?>
									<div class="para-play"><?php echo do_shortcode($audi); ?></div>
								</div>
							</div>
							<div class="col-sm-5"></div>
							
						</div>
					</div>
				</div>
        	</div>
        	<div class="f-rad">
			<?php 
				echo $conten;
			?>
			</div>
			<!--a href="<?php echo get_category_link(3); ?>" class="btn btn-mas pull-right">Mas noticias » </a-->
			<div class="otro-rad">
				<h3 class="tit dorado">Otros </h3>
	            <table class="table table-hover">
					<tbody>
			            <?php $custom_query =  new WP_Query( array( 'post_type' => 'any', 'post__not_in' => array(get_the_ID()),'category_name'=>'radio-ideca', 'posts_per_page'=>15 ,'orderby'=>'date', 'order' => 'DESC','paged' => get_query_var('page')) ); ?>  	            
			            <?php $exis = 0; while($custom_query->have_posts()) : $custom_query->the_post(); ?>                     	                            
			            <?php 				
			            ?>
			            <tr>
							<td class="enla-au"> 
								<div class="mi-vide">
									<a href="<?php the_permalink(); ?>">
										<div class="esconde-12">
											<?php the_post_thumbnail('thumbnail'); ?>
										</div>
										<h5><?php the_title(); ?></h5>
										<p><i class="fa fa-calendar"></i> <?php echo get_elapsed_time(); ?></p>
									</a>
								</div>
							</td>
							<td class="for-ics">
								<a href="<?php the_permalink() ?>" class="btn btn-xs btn-radio pull-right"><i class="fa fa-play"></i> Escuchar</a>
							</td>
						</tr>                   	                
			            <?php
			            endwhile;
			            ?>	
						
		            </tbody>
	            </table>	        
			</div>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php
endwhile; endif;
get_footer();
