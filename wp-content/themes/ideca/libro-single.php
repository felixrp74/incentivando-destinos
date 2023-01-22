<?php
/*Template Name: Single Libro*/


// get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post();?>
	<div class="container">	
		<div class="main-titulo"><h1><?php /*$categoria = get_the_category();
			$parent = get_cat_name($categoria[0]->category_parent);
			if (!empty($parent)) {
			    echo $parent.' uno';
			} else {
			    echo $categoria[0]->cat_name.' Dos';
			}*/the_title();?></h1>
		</div>
		<div class="row">
			<div class="col-sm-8">	
			<?php $img = get_image_post('medium', get_the_id(), 'left'); 
								$id = esc_url( $category_link );
								if(!empty($img)){
									echo $img;
								}else{
									echo '<div class="libro-vacio"><span class="fa fa-book"></span></div>';
								}
								?> 	
				<?php //the_content(); ?>
			</div>
			<?php //get_sidebar(); ?>
		</div>

	</div>
		
<?php endwhile; endif; ?>
<?php  //get_footer(); ?>
<div class="col-sm-6">
<img src="<?php echo get_template_directory_uri(); ?>/image/libro1.png" />
</div>
<div class="col-sm-6">
	<?php echo $_GET['l']; ?>
</duiv>