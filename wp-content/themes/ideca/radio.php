<?php 
/* Template Name: Radio IDECA */

get_header(); 
?>
<?php if (have_posts()) : while (have_posts()) : the_post();?>
	<div class="container">	
		<div class="main-titulo"><h1><?php the_title();?></h1></div>
		
		<div class="row">
			<div class="col-sm-8 for-fotos">	
			<div class="breads"><?php get_breadcrumbs(); ?></div>	

			<div class="">
				<div class="">
					<!--iframe src="http://www.pachamamaradio.org/transmitir/radio-tv.php" height="400" frameborder="0" marginwidth="0" scrolling="yes" style="width:100%"></iframe-->

				</div>
				<div>
					jj
				</div>
			</div>
				<?php 
			        
				 ?>
				<hr>
			</div>
			<?php get_sidebar(); ?>
		</div>

	</div>
		
<?php endwhile; endif; ?>
<?php  get_footer(); ?>