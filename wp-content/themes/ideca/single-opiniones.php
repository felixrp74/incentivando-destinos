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
		
		<div class="col-sm-8">
			<div class=" opini">
				<div class="breads"><?php get_breadcrumbs(); ?></div>
				<div class="parte-titulo">
				<h1 class="pst f-francois"><?php the_title(); ?></h1>
				<div class="parte-autor">
					<?php $cat = get_the_category(); ?>
					<strong><i class="fa fa-user"></i></strong> <?php the_author(); ?> | <strong><?php echo $cat[0]->name; ?></strong> - <strong><i class="fa fa-clock-o"></i></strong> <?php echo the_date(); ?>					
				</div>
			</div>
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
				    if(COUNT($contenido) > 2){
        				$cont = "";
        				foreach ($contenido as $i => $value) {
        				    if($i>0){
        				        if($i > 1) $cont .= '" />';
        					    $cont .= $value;
        				    }
        				}
        			}else{
        				$cont = $contenido[1];
        			}
				    
					echo '<div style="text-align:justify" class="cnt-body">'.$cont.'</div>';
				}else{
					the_content();
				}	        
				?>
				
				<div class="for-tags">
					<?php $eti = get_the_tags();  ?>
					<?php //echo get_tag_link($eti[0]->term_id); ?>
					<strong>Etiquetas </strong> 
					<?php if(!empty($eti)):?>
					<?php 
					foreach ($eti as $key) {
					?>
					<a href="<?php echo get_tag_link($key->term_id); ?>"><?php echo $key->name; ?></a>
					<?php
					}
					?>	
					<?php endif; ?>			
				</div>
				<a href="<?php echo get_category_link($cat[0]->term_id); ?>" class="btn btn-mas pull-right">Ver más » </a>
				
			</div>
			<!--a href="<?php echo get_category_link(3); ?>" class="btn btn-mas pull-right">Mas noticias » </a-->
			
		</div>
		
		<?php get_sidebar(); ?>
	</div>
</div>
<?php
endwhile; endif;
get_footer();
