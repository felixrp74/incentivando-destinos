<?php
global $query_string;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts($query_string.'&paged='.$paged.'&posts_per_page=4');

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
				                        <!-- <p><?php echo $autores; ?></p>
				                        		                         		<div class="play-audio"><?php if(!empty($co[1])): echo do_shortcode($au); else: echo ''; endif; ?></div>
				                        		                         		<a href="<?php echo $ad[0]; ?>" download class="btn btn-xs btn-descarga"><i class="fa fa-download"></i> Descargar audio</a> -->
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