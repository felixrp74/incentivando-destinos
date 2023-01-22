<?php 


get_header(); 


?>
<div class="container">
	<div class="row">
		<div class="col-sm-8">		
			<div class="breads"><?php get_breadcrumbs(); ?></div>				
			<?php

			global $query_string;
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			query_posts($query_string.'&paged='.$paged.'&posts_per_page=5');
			?>

				<h2>Resultados de la búsqueda</h2>
				<ul  class="list-reci busqueda">
				    <?php if (have_posts()) : while (have_posts()) : the_post();
						remove_filter('the_excerpt', 'wpautop'); ?>
						<?php

						if(get_the_excerpt()){$enlace = get_the_permalink(); $clame = '';}else{$enlace = get_permalink();/*$enlace = '#hola';*/$clame = ' class="fancybox fancybox.iframe"';}
						
						$codigo=get_post_meta($post->ID, 'Codigo', true);  
							$autor = get_post_meta($post->ID, 'Autores', true);  
							$paginas = get_post_meta($post->ID, 'Paginas', true);
						?>
						<li>
							<a href="<?php echo $enlace; ?>" <?php echo $clame; ?>>								
								<?php
								$img = get_image_post('thumbnail', get_the_id(), 'left'); 
								if(!empty($img)){
									echo $img;
								}else{
									if(!empty($_GET['cat'])){	
										echo '<div class="libro-vacio peque" title="'.$post->post_title.'"><span class="fa fa-book"></span></div>';
									}else{
										echo '<div class="chio"></div>';//echo '<div class="libro-vacio img-vacio peque" title="'.$post->post_title.'"><span class="fa fa-picture-o"></span></div>';
									}																		
								}
								?>
								<?php 
								the_title(); 								
								?> 
							</a>
							<?php
							if(!empty($codigo)){echo '<p class="arreglo-busqueda ab2"><strong>Código: </strong>'.$codigo.'</p>';}
							if(!empty($autor)){echo '<p class="arreglo-busqueda"><strong>Autor (es): </strong>'.$autor.'</p>';}
							if(!empty($paginas)){echo '<p class="arreglo-busqueda"><strong>Nro Páginas: </strong>'.$paginas.'</p>';}
							?>
							<p><?php the_excerpt('15'); ?></p>
						</li>
					<?php endwhile; ?>
				</ul>
				<div class="cont-pag">
				   <div class="tac">
					    <?php
				            $big = 999999999;
				            $paginacion = paginate_links(array(
				                    'base' => str_replace( $big, '%#%', get_pagenum_link($big) ),
				                    'current' => max( 1, get_query_var('paged') ),
				                    'total' => $wp_query->max_num_pages,
				                    'mid_size' => 1,
				                    'type' => 'list'
				            ));
				            echo str_replace( "<ul class='page-numbers'>", '<ul class="pagination">', $paginacion );
					    ?> 
					</div>
				</div>
				<?php  else: ?>
				<div class="entry"><?php _e('Lo sentimos, no hay resultados con este término de búsqueda.'); ?></div>

			<?php endif; ?>	
		</div>
		<?php get_sidebar(); ?>
	</div>
	
	
</div>						
<?php  get_footer(); ?>