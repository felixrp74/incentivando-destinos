<?php  
/*  Template Name: Contactos*/
get_header(); 
?>
<?php if (have_posts()) : while (have_posts()) : the_post();?>
	<div class="container">	
		<div class="main-titulo fnd-rojo"><h1><?php the_title();?></h1>
		</div>
		<div class="row">
			<div class="col-sm-6">	
				<div class="breads"><?php get_breadcrumbs(); ?></div>
				<div class="d-c">
					<p>Agradecemos sus comentarios y sugerencias, atenderemos sus consultas con la mayor brevedad posible.</p>					
					<ul>
						<li><span class="fa fa-home"></span>Direccion: Jr. Miguel de Cervantes Nº 125 - Barrio Machallata</li>
						<li><span class="fa fa-phone"></span>Teléfono: +51 51 205547</li>
						<li><span class="fa fa-fax"></span>Fax: +51 51 357415 </li>
						<li><span class="fa fa-mobile"></span>Celular: 942412119</li>
						<li><span class="fa fa-envelope"></span>Email: ideca.emaus@gmail.com </li>						
						<li style="padding-left:21px">idecaperu@gmail.com</li>						
					</ul>
				</div>
				<?php the_content(); ?>
			</div>
			<div class="col-sm-6" style="padding-top:30px;">
				<div class="mapa" id="mapa"></div>				
			</div>
		</div>

	</div>
		
<?php endwhile; endif; ?>
<?php  get_footer(); ?>