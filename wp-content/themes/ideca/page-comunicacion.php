<?php
/*Template Name: Comunicacion*/
get_header(); 
?>
<?php if (have_posts()) : while (have_posts()) : the_post();?>
	<div class="container">	
		<div class="main-titulo fnd-rojo" ><h1><?php the_title();?></h1>
		</div>
		<div class="row">
			<div class="col-sm-8 arreglo4">		
				<?php the_content(); ?>
				<!-- <div class="row">
					<?php $custom_query =  new WP_Query( array( 'post_type' => 'post','category_name'=>'biblioteca', 'posts_per_page'=>6 ,'orderby'=>'date', 'order' => 'DESC') ); ?>  
				        			<?php while($custom_query->have_posts()) : $custom_query->the_post();?>
				        				<?php the_title(); ?><br>
				        			<?php endwhile; ?>
				</div> -->
			</div>
			<?php get_sidebar(); ?>
		</div>

	</div>
		
<?php endwhile; endif; ?>
<?php  get_footer(); ?>