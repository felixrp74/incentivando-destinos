<?php
/*Template Name: Biblioteca*/
get_header(); 
?>
<?php if (have_posts()) : while (have_posts()) : the_post();?>
	<div class="container">	
		<div class="main-titulo" style="background: url(<?php echo get_template_directory_uri(); ?>/image/banners/dorado.jpg) no-repeat"><h1><?php /*$categoria = get_the_category();
			$parent = get_cat_name($categoria[0]->category_parent);
			if (!empty($parent)) {
			    echo $parent.' uno';
			} else {
			    echo $categoria[0]->cat_name.' Dos';
			}*/the_title();?></h1>
		</div>
		<div class="row">
			<div class="col-sm-8">		
				<?php the_content(); ?>
				<div class="row">
					<?php $custom_query =  new WP_Query( array( 'post_type' => 'post','category_name'=>'biblioteca', 'posts_per_page'=>6 ,'orderby'=>'date', 'order' => 'DESC') ); ?>  
        			<?php while($custom_query->have_posts()) : $custom_query->the_post();?>
        				<?php the_title(); ?><br>
        			<?php endwhile; ?>
				</div>
				<!-- <div class="row" style="margin-top:30px;">
					<div class="col-sm-4 col-xs-6">
						<a href="http://localhost/ideca/?page_id=144&l=nuevo libro" class="fancybox fancybox.iframe">
							<div class="cont-libro">
								<img src="<?php echo get_template_directory_uri(); ?>/image/libro1.png" class="img-responsive" alt="libro">
								<strong>Titulo del libro</strong>
							</div>
						</a>
					</div>
					<div class="col-sm-4 col-xs-6">
						<a href="#">
							<div class="cont-libro">
								<div class="libro-vacio"><span class="fa fa-book"></span></div>
								<strong>Fortalecimiento en Liderazgo y Participación Política de las Mujeres Indígenas</strong>
							</div>
						</a>
					</div>
					<div class="col-sm-4 col-xs-6">
						<a href="#">
							<div class="cont-libro">
								<img src="<?php echo get_template_directory_uri(); ?>/image/libro1.png" class="img-responsive" alt="libro">
				
							</div>
						</a>
					</div>
					<div class="col-sm-4 col-xs-6">
						<a href="#">
							<div class="cont-libro">
								<img src="<?php echo get_template_directory_uri(); ?>/image/libro1.png" class="img-responsive" alt="libro">
				
							</div>
						</a>
					</div>
				</div> -->
			</div>
			<?php get_sidebar(); ?>
		</div>

	</div>
		
<?php endwhile; endif; ?>
<?php  get_footer(); ?>