<?php /* Template Name: pagina galeri*/  get_header(); ?>
		<div id="page">
		<?php if (have_posts()) : while (have_posts()) : the_post();?>

		    <div class="title1"><h1><?php the_title() ?></h1></div>
				<?php
				$galeria = get_post_gallery(get_the_ID(), false);
				$galeria_ids = explode(',', $galeria['ids']);
				$resultado = count($galeria_ids);
			?>
			<div id="galeria">
				<ul id="galeria-fotos">		
				<?php for($i=0; $i<$resultado; $i++): $img_id=$galeria_ids[$i]; ?>
				<?php echo '<li><img src="' , wp_get_attachment_image_src($img_id, 'large' )[0], '"></li>'; ?>
				<?php endfor; ?>
				</ul>
			</div>		
			<div id="control-pager">
					<div id="bx-pager" class="lh">
						<?php $i=0; foreach($galeria_ids as $img_id): ?>
						<a data-slide-index="<?php echo $i; ?>" href=""><?php echo wp_get_attachment_image( $img_id, 'thumbnail' ); ?></a>
						<?php $i++; endforeach; ?>
					</div>
					<div id="slider-next"></div>
				    <div id="slider-prev"></div>
			</div>

	   <?php endwhile; endif; ?>		
	</div>
<?php  get_footer(); ?>