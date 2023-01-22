<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<?php
// get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post();?>
	<div class="container">	
		<div class="row" style="padding:50px 30px;">
			<div class="col-xs-4 maya" style="border-right:1px solid #EDEDED">	
				<?php $img = get_image_post('medium', get_the_id(), 'left'); 
					//$id = esc_url( $category_link );
					if(!empty($img)){
						echo $img;
					}else{
						echo '<div class="libro-vacio"><span class="fa fa-book"></span></div>';
					}
				?> 	
				<?php //the_content(); ?>
			</div>
			<div class="col-xs-8">
				<h3 style="margin-top:0;margin-bottom:20px;font-weight:bold"><?php the_title(); ?></h3>
				<?php 
				$codigo=get_post_meta($post->ID, 'Codigo', true);  
				$autor = get_post_meta($post->ID, 'Autores', true);  
				$paginas = get_post_meta($post->ID, 'Paginas', true);  
				?>
				<p><strong>Código: </strong><?php echo $codigo;?></p>
				<p><strong>Autor (es): </strong><?php echo $autor;?></p>
				<p><strong>Nro Páginas: </strong><?php echo $paginas;?></p>
				<h4>Descripción</h4>
				<?php 	
				$cont = get_the_content();
				$sert = explode('</a>', $cont);
				if(empty($sert[1])){
					$content = explode('/>', $cont);
				}else{
					$content = explode('</a>', $cont);
				}
				echo $content[1];
				//var_dump($content);
				?>
			</div>
			<?php //get_sidebar(); ?>
		</div>

	</div>
		
<?php endwhile; endif; ?>
<?php  //get_footer(); ?>
