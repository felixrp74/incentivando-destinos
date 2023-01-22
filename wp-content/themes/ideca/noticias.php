<?php
/*Template Name: Noticias*/
 global $query_string;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts($query_string.'&paged='.$paged.'&posts_per_page=1');

get_header();
 //if (have_posts()) : while (have_posts()) : the_post();



?>
<div class="container">	
	<div class="main-titulo"><h1><?php the_title(); ?></h1>
		</div>
	<div class="row">
		<div class="container breads"><?php get_breadcrumbs(); ?></div>
		<div class="col-sm-8">
			<h2 class="tit not">Noticias</h2>
            <?php $custom_query =  new WP_Query( array( 'post_type' => 'any','category_name'=>'noticias', 'posts_per_page'=>-1 ,'orderby'=>'menu_order', 'order' => 'ASC','paged' => get_query_var('page')) ); ?>  
            <?php while($custom_query->have_posts()) : $custom_query->the_post(); ?>                     
            <div class="noticias">
                <div class="for-fecha"><span class="fa fa-calendar"></span> Publicado: <?php the_date(); ?></div>
                <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                <div class="cont-noticia">
                    <?php 
                        $galeria = get_post_gallery(get_the_ID(), false);
                        $galeria_ids = explode(',', $galeria['ids']);
                        $var1=wp_get_attachment_image( $galeria_ids[0], 'thumbnail' );//img galeria	
                        $var2=get_image_post('medium');//img primera img	
                                               	

                        if(has_post_thumbnail()){
                            the_post_thumbnail('img-333x187');
                        }else{
                            if($var2!=''){
                            	
                                echo $var2;
                                /*$ima1 = explode('width="',$var2);
                                echo $ima1[0].' />';*/
                            }else{
                                if($var1!=''){
                                    echo $var1;
                                }
                            }
                        }
                    ?> 
                    <p>
                    	<?php 
                            //the_content();
                            $contenidop=get_the_content();
                            //$coni = explode('<p>',$contenidop);
                            $stxt = explode('/>',$contenidop);
                            echo substr($stxt[1],0,400).' ...';
                            //echo $stxt[1];
                         ?>
                    <a href="<?php the_permalink(); ?>">Leer más</a></p>
                    
                </div>
            </div>
        	<?php endwhile;?>
            <div class="tac" style="border:1px solid red;">
    <?php
            $big = 999999999;
            $paginacion = paginate_links(array(
                    'base' => str_replace( $big, '%#%', get_pagenum_link($big) ),
                    'current' => max( 1, get_query_var('paged') ),
                    'total' => $wp_query->max_num_pages,
                    'mid_size' => 1,
                    'type' => 'list'
            ));
            echo str_replace( "<ul class='page-numbers'>", '<ul class="pagination">', $paginacion );
            
    ?> 
</div>
		</div>
		<?php get_sidebar(); ?>
	</div>
    
</div>
<?php
//endwhile; endif;
get_footer();
