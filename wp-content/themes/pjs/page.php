<?php  get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post();?>
	<div class="container">	
		<div class="main-titulo"><h1><?php the_title();?></h1></div>
		<div class="row">
			<div class="col-sm-8 for-fotos">	
			<div class="breads"><?php get_breadcrumbs(); ?></div>	
				<?php 
					$galeria = get_post_gallery(get_the_ID(), false);
	              $galeria_ids = explode(',', $galeria['ids']);
	              $var1=wp_get_attachment_image( $galeria_ids[0], 'img-80x70' );//img galeria 
	              $var2=get_image_post('img-80x70');//img primera img                             
	                if(has_post_thumbnail()){
	                  the_post_thumbnail('img-80x70');
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
				<?php 
			        $conte = get_the_content();
			        $conten = explode('/>', $conte);
			        $content = $conten[1];
			        $content = apply_filters('the_content', $content);
			        $content = str_replace(']]>', ']]&gt;', $content);
			        echo $content;        
				 ?>
				<hr>
				<h4 class="cursos" style="padding-left:0;">Otros Cursos</h4>
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
				<hr>
				<a href="http://idecaperu.org/aulavirtual/" class="btn btn-aula"><i class="fa fa-graduation-cap"></i> Ingresar a nuestra Aula Virtual</a>
			</div>
			<?php get_sidebar(); ?>
		</div>

	</div>
		
<?php endwhile; endif; ?>
<?php  get_footer(); ?>