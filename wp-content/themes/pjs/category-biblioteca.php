<?php
global $query_string;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
//query_posts($query_string.'&paged='.$paged.'&posts_per_page=12&orderby=meta_value_num&meta_key=Codigo&order=ASC');
query_posts($query_string.'&paged='.$paged.'&posts_per_page=12&orderby=date&order=DESC');

get_header();

?>
<?php //if (have_posts()) : while (have_posts()) : the_post();?>
<div class="container"> 
    <div class="main-titulo"><h1><?php single_cat_title(); ?></h1></div>
    <div class="breads">
    
    <a href="<?php echo home_url(); ?>">Inicio   </a>» <a href="#" class="activo"><?php single_cat_title(); ?> </a>
		
	</div>
	<div class="arreglo4">
		<?php 
		$my_postid = 4331;//This is page id or post id
		$content_post = get_post($my_postid);
		$content = $content_post->post_content;
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]>', $content);
		echo $content;
		?>
	</div>
	<div class="cont-busca">
		<div class="for-buscar pull-right">
			<form class="form-inline" method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
			  <div class="form-group">
			    <label for="inputPassword2" class="sr-only">Buscar libro</label>		    
			    <input type="text" class="form-control" placeholder="Buscar libro..." name="s" id="s" />
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
			  <button type="submit" class="btn btn-default">Buscar</button>
			</form>
		</div>
	</div>
	
			<!--h2 class="tit not"><?php single_cat_title(); ?></h2-->
		        <div class="row" style="margin-top:30px !important;margin-bottom:30px;">
		        	
					<?php $ex = 0; if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php
					$codigo=get_post_meta($post->ID, 'Codigo', true);  
					$autor = get_post_meta($post->ID, 'Autores', true);  
					$paginas = get_post_meta($post->ID, 'Paginas', true);  
					$ex++;
					
					?>

					<div class="col-sm-3 col-xs-6 espac" style="">
						<a href="<?php echo get_permalink(); ?>" class="fancybox fancybox.iframe">
							<div class="cont-libro">
								<div class="corte-tapa">
								<?php $img = get_image_post('thumbnail', get_the_id(), 'left'); ?>
								
								<?php
								if(!empty($img)){
									echo $img;
								}else{
									echo '<div class="libro-vacio" title="'.$post->post_title.'"><span class="fa fa-book"></span></div>';
								}
								?>    
								</div>                
								<p class="nom-libro"><strong><?php $cantid = strlen($post->post_title); echo substr($post->post_title, 0,50); if($cantid > 50){echo '...';} //cat_id(); ?></strong></p>
								<div class="sobre"><span class="fa fa-search-plus"></span></div>
							</div>
						</a>
						<!--div class="cont-libro2">							
							<?php $img = get_image_post('medium', get_the_id(), 'left'); 
							if(!empty($img)){
								echo $img;
							}else{
								echo '<div class="libro-vacio" title="'.$post->post_title.'"><span class="fa fa-book"></span></div>';
							}
							?>                   
							<div class="txt-arriba">
								<table>
									<tbody>
										<tr>
											<td class="ft">Código: </td>
											<td> <?php echo $codigo; ?></td>
										</tr>
										<tr>
											<td class="ft">Autor(es): </td>
											<td> <?php echo $autor; ?></td>
										</tr>
										<tr>
											<td class="ft">Paginas: </td>
											<td> <?php echo $paginas; ?></td>
										</tr>
									</tbody>									
								</table>
							</div> 
							<div class="new-titulo"><span><?php the_title(); ?></span></div>
							<div class="titulo-libro"><strong><?php $cantid = strlen($post->post_title); echo substr($post->post_title, 0,50); if($cantid > 50){echo '...';} //cat_id(); ?></strong></div>
						</div-->
					</div>
				
					<?php 
					if($ex%4 == 0){
						echo '</div><div class="row" style="margin-top:30px !important;margin-bottom:30px;">';
					}
					endwhile; endif; ?>
		        </div>   

		<?php //get_sidebar(); ?>
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
<?php
//get_sidebar();
get_footer();

?>