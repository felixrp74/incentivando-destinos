<?php 
/*Template Name: Formacion y Postgrado*/ 
get_header();
$id= 2;
$id_pagina = get_the_id();
?>
<?php if (have_posts()) : while (have_posts()) : the_post();?>
	<div class="container">	
		<div class="main-titulo"><h1><?php the_title();?></h1></div>
		<div class="row">
			<div class="col-sm-8  arreglo4">	
				<div class="breads"><?php get_breadcrumbs(); ?></div>	
				<?php the_content(); ?>
				<hr>
				<div class="cont-otros row">
					<h6 class="cursos">Nuestros Cursos</h6>
					<?php 					
					$cols = 'col-sm-6';
					?>
					<?php   $id=get_the_ID(); $custom_query =  new WP_Query( array( 'post_type' => 'page', 'post_parent__in' => array( $id) , 'posts_per_page'=>-1 ,'orderby'=>'title', 'order' => 'ASC') );?>        
				     <?php while($custom_query->have_posts()) : $custom_query->the_post(); ?>  
				     	<div class="<?php echo $cols; ?> cursosf">
					     	<a href="<?php the_permalink(); ?>">
					     		<div class="well cont-cursos">
					     			<strong><?php the_title(); ?></strong>
					     			<p style="margin-bottom:0">
					     				<?php 
				            			$galeria = get_post_gallery(get_the_ID(), false);
				            			$galeria_ids = explode(',', $galeria['ids']);
				            			$var1=wp_get_attachment_image( $galeria_ids[0], 'thumbnail' );//img galeria	
				            			$var2=get_image_post('thumbnail');//img primera img		                        	
				            		    if(has_post_thumbnail()){
				            		    	the_post_thumbnail('thumbnail');
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
					     			</p>					     			 
					     		</div>
					     	</a>				     		
				     	</div>
                    
                     <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?> 
				</div>
				<hr>
				<a href="http://idecaperu.org/aulavirtual/" class="btn btn-aula pull-right"><i class="fa fa-graduation-cap"></i> Aula Virtual</a>

			</div>
			<?php get_sidebar(); ?>
		</div>


	</div>
		
<?php endwhile; endif; ?>
<?php  get_footer(); ?>