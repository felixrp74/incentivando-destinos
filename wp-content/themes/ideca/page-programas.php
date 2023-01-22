<?php
/*Template Name: Programas*/
get_header(); 
$cate  = get_the_id();
// echo $cate;
switch ($cate) {
    case 8679: $fondo = 'fnd-azul'; break;
    case 8682: $fondo = 'fnd-celeste'; break;
    case 8684: $fondo = 'fnd-verde'; break;
    case 8686: $fondo = 'fnd-naranja'; break;
    case 8688: $fondo = 'fnd-rojo'; break;
    
    default:
        # code...
        break;
}
?>
<?php if (have_posts()) : while (have_posts()) : the_post();?>
	<div class="container">	
		<div class="main-titulo <?php echo $fondo; ?>" ><h1><?php the_title();?></h1>
		</div>
		<div class="row">
			<div class="col-sm-8 arreglo4">		
				<?php the_content(); ?>
				<hr>
				<h4 class="cursos" style="padding-left:0;">Otros Programas</h4>
				<div>
					<?php   $id=get_the_ID(); $padre=wp_get_post_parent_id($id); $custom_query =  new WP_Query( array( 'post_type' => 'page', 'post__not_in' => array($id),'post_parent__in' => array( $padre) , 'posts_per_page'=>-1 ,'orderby'=>'menu_order', 'order' => 'ASC') );?>                                       
                    <ul class="otros-c">
                    <?php while($custom_query->have_posts()) : $custom_query->the_post(); ?>                                            
                      	<li>
                          <a href="<?php the_permalink(); ?>" class="br5-owh" style="font-weight:bold;"><i class="fa fa-hand-o-right"></i>                                
                            <?php the_title();?>                            
                          </a> 
                       	</li>
                     <?php endwhile; ?>
                     </ul>
				</div>
			</div>
			<?php get_sidebar(); ?>
		</div>

	</div>
		
<?php endwhile; endif; ?>
<?php  get_footer(); ?>