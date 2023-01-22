<?php
global $query_string;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts($query_string.'&paged='.$paged.'&posts_per_page=4');

get_header();

?>
<?php //if (have_posts()) : while (have_posts()) : the_post();?>
<div class="container"> 
    <div class="main-titulo fnd-rojo"><h1><?php single_cat_title(); ?></h1></div>
    <div class="row">
	<div class="col-sm-8">
		<div class="breads"><?php get_breadcrumbs(); ?></div>
		<h2 class="tit not"><?php single_cat_title(); ?></h2>
	            
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div class="noticias">
	                
	                <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
	                <div class="for-fecha"><span class="fa fa-calendar"></span> Publicado: <?php the_date(); ?></div>
	                <div class="cont-noticia">
	                    <?php $img = get_image_post('thumbnail', get_the_id(), 'left'); if(!empty($img)): ?>
	                    <div class="corte-img">
		                    <a href="<?php the_permalink(); ?>">
		                    <?php echo $img; ?>
		                    <strong class="hover-uno"><span>[<i class="fa fa-plus"></i>]</span></strong>
		                    </a>
	                    </div>
	                    <?php endif; ?>
	                    <div style="text-align:justify">
	                    	<?php 
	                            /*//the_content();
	                            $contenidop=get_the_content();
	                            //$coni = explode('<p>',$contenidop);
	                            $stxt = explode('/>',$contenidop);
	                            echo substr($stxt[1],0,400).' ...';
	                            //echo $stxt[1];*/
	                            the_excerpt(120);
	                         ?>
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
<?php wp_reset_query(); ?>
</div>

<?php
//get_sidebar();
get_footer();

?>