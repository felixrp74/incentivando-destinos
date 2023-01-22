<?php 


get_header(); 

$control = $_GET['cat'];
?>
<div class="container">
<div class="main-titulo fnd-dorado"><h1>Busqueda</h1></div>
	<div class="row">
		<div class="col-sm-8">		
			<div class="breads"><?php get_breadcrumbs(); ?></div>		
			<div class="alert alert-success" style="width:100%">
				<h4 style="display:inline;font-weight:bold;font-size:1.6em">Buscar Texto: </h4>
				<form class="form-inline" method="get" id="searchform" action="<?php bloginfo('home'); ?>/" style="display:inline">
				  <div class="form-group" style="width:60%">
				    <label for="inputPassword2" class="sr-only">Buscar libro</label>		    
				    <input type="text" class="form-control" placeholder="<?php echo $_GET['s']; ?>" name="s" id="s"  style="width:100%"/>
				    
						<?php $id_categoria = get_cat_id('biblioteca'); ?>
						<?php $categorias = get_categories('child_of=$id_categoria');
						$catlist = '';
						foreach ($categorias as $cat) {
						$lista_cat.= $cat->cat_ID.',';
						}
						$lista_cat. $id_categoria;
						?>
					<input type="hidden" name="cat" value="<?php echo '$lista_cat'?>" />
					
				  </div>
				  <button type="submit" class="btn btn-success"> <i class="fa fa-search"></i> Buscar Libro</button>
				</form>
			</div>	
			<?php

			global $query_string;
			// var_dump($query_string);
			/*$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			query_posts($query_string.'&paged='.$paged.'&posts_per_page=5');*/
						
			if(!empty($control)):
				if(is_search()):
					$s = $_GET['s'];

					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					query_posts("s=$s&paged=$paged&cat=4&posts_per_page=6");
					$clame = ' class="fancybox fancybox.iframe"';
					// var_dump($paged);
				endif;
			else:
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				query_posts($query_string.'&paged='.$paged.'&posts_per_page=6');
				$clame = '';
			endif;
			// $custom_query =  new WP_Query( array( 'post_type' => 'page','post_parent__in' => 4, 'posts_per_page'=>-1,'orderby'=>'menu_order', 'order' => 'ASC') );
			?>

				<h2>Resultados de la búsqueda</h2>
				<ul  class="list-reci busqueda">
				    <?php if (have_posts()) : while (have_posts()) : the_post();
						remove_filter('the_excerpt', 'wpautop'); ?>
						<?php
						$categor = get_the_category();
						$catID = $categor[0]->term_id;
						// var_dump($catID);
						// if($catID == 4):
						
						
						// if(get_the_excerpt()){$enlace = get_the_permalink(); $clame = '';}else{$enlace = get_permalink();/*$enlace = '#hola';*/$clame = ' class="fancybox fancybox.iframe"';}
						
						$codigo=get_post_meta($post->ID, 'Codigo', true);  
							$autor = get_post_meta($post->ID, 'Autores', true);  
							$paginas = get_post_meta($post->ID, 'Paginas', true);
						?>
						<li>
							<a href="<?php the_permalink(); ?>" <?php echo $clame; ?>>								
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
						<?php //endif; ?>
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