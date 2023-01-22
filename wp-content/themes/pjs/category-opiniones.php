<?php
global $query_string;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts($query_string.'&paged='.$paged.'&posts_per_page=4');

get_header();

?>
<?php //if (have_posts()) : while (have_posts()) : the_post();?>
<div class="container"> 
    <div class="main-titulo"><h1><?php single_cat_title(); ?></h1></div>
    <div class="row">
	<div class="col-sm-8">
		<div class=" opini">
				<div class="breads"><?php get_breadcrumbs(); ?></div>
				<div><h1 class="pst"><?php the_title(); ?></h1></div>
				<div class="opinion-img">
				<?php 
	                $galeria = get_post_gallery(get_the_ID(), false);
	                $galeria_ids = explode(',', $galeria['ids']);
	                $var1=wp_get_attachment_image( $galeria_ids[0], 'thumbnail' );//img galeria	
	                $var2=get_image_post('medium');//img primera img		                        	
	                if(has_post_thumbnail()){
	                    the_post_thumbnail('thumbnail');
	                }else{
	                    if($var2!=''){
	                        $ima1 = explode('width="',$var2);
	                        echo $ima1[0].' />';
	                    }else{
	                        if($var1!=''){
	                            echo $var1;
	                        }
	                    }
	                }
	            ?> 
	        	</div>
				<?php 
				//$cont = get_the_content(); 
				//$contenido = explode("/>", $cont);
				//echo $contenido[1];
				$content_post = get_post();
		        $content = $content_post->post_content;
		        $content = apply_filters('the_content', $content);
		        $content = str_replace(']]>', ']]&gt;', $content);
		        
				$contenido = explode('" />', $content);
				if(!empty($contenido[1])){
					echo '<div style="text-align:justify">'.$contenido[1].'</div>';
				}else{
					the_content();
				}	        
				?>
			</div>
	</div>
	<?php get_sidebar('opiniones'); ?>

</div>
<?php wp_reset_query(); ?>
</div>

<?php
//get_sidebar();
get_footer();

?>