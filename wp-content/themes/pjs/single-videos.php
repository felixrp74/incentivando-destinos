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
			<div class="for-videm">
				<?php 
				the_content();
				?>
        	</div>
        	<div class="f-rad">
			<?php 
				//echo wpautop($contenido[1]);
			?>
			</div>
			<!--a href="<?php echo get_category_link(3); ?>" class="btn btn-mas pull-right">Mas noticias » </a-->
			<div class="otro-rad">
				<h3 class="tit dorado">Otros </h3>
				<table class="table table-hover table-condensed tablita">
					<tbody>
			            <?php $custom_query =  new WP_Query( array( 'post_type' => 'any', 'post__not_in' => array(get_the_ID()),'category_name'=>'videos', 'posts_per_page'=>5 ,'orderby'=>'date', 'order' => 'DESC','paged' => get_query_var('page')) ); ?>  	            
			            <?php $exis = 0; while($custom_query->have_posts()) : $custom_query->the_post(); 
			            	$for_c = explode('[/embed]', get_the_content());
							$for_con = explode('.be/', $for_c[0]);
							$vid_img = 'https://i.ytimg.com/vi/'.$for_con[1].'/mqdefault.jpg';
			            ?>
			            	<tr>
								<td class="enla-au"> 
									<div class="mi-vide">
										<a href="<?php the_permalink(); ?>">
											<img src="<?php echo $vid_img; ?>" alt="<?php echo the_title(); ?>">
											<h5><?php the_title(); ?></h5>
											<p><i class="fa fa-calendar"></i> <?php echo get_elapsed_time(); ?></p>
										</a>
									</div>
								</td>
								<td class="for-ics">
									<a href="#" class="btn btn-xs btn-radio pull-right"><i class="fa fa-play"></i> Escuchar</a>
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
