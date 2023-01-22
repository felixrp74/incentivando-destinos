<?php 
/*Template Name: Tecnico ambiental
*/
get_header();
if (have_posts()) : while (have_posts()) : the_post();

?>
	<div class="container">	
		<div class="main-titulo fnd-verde" ><h1><?php the_title();?></h1></div>
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
			</div>
			<?php get_sidebar(); ?>
		</div>

	</div>
<?php 
endwhile; endif;
get_footer(); 