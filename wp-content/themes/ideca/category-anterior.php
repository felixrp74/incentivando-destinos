<?php

// paginando, IMPORTANTE!!! NO OLVIDAR FIJAR A '1' EN LA CONFIGURACION
global $query_string;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts($query_string.'&paged='.$paged.'&posts_per_page=2');

get_header();

?>
<?php //if (have_posts()) : while (have_posts()) : the_post();?>
<div class="container"> 
    <div class="main-titulo"><h1><?php single_cat_title(); ?></h1></div>
    <div class="breads"><?php get_breadcrumbs(); ?></div>
    
<!--h1 style="background:green;"><?php single_cat_title(); ?></h1-->
<p><?php the_excerpt(); ?></p>
<div >
    <?php 
    $category = get_the_category(); 
    $ider = $category[0]->slug;
    //echo $ider.'<br>';
    //var_dump($category);
    //echo  get_page_template_slug( $ider).'<br>';
    if(category_description()){
        echo category_description();
    }else{echo "";}
     ?>

</div>
<h4 style="font-weight:bold;">Publicaciones</h4>
<?php $custom_query =  new WP_Query( array( 'post_type' => 'any','category_name'=>$ider, 'posts_per_page'=>-1 ,'orderby'=>'date', 'order' => 'DESC','paged' => get_query_var('page')) ); ?>    
                <?php //the_excerpt(); ?>
                <table class="table table-bordered table-hover tabla-publica">
                    <tr class="bg-info">
                        <th>Código</th>
                        <th style="min-width:100px;width:200px;">Autor (es)</th>
                        <th>País</th>
                        <th>Título</th>
                        <th>Contenido</th>
                    </tr>                   
                <?php while($custom_query->have_posts()) : $custom_query->the_post(); ?>                        
                <?php
                
                $codigo=get_post_meta($post->ID, 'Codigo', true); 
                $autores = get_post_meta($post->ID,'Autores',true);
                $pais = get_post_meta($post->ID,'Pais',true);
                ?>
                    <tr>                        
                        <td><?php echo $codigo; ?></td>
                        <td><?php if(empty($autores)){the_author();}else{echo $autores;} ?></td>
                        <td><?php if(!empty($pais)){ echo $pais;} else {echo 'Perú';} ?></td>
                        <td><?php the_title(); ?></td>
                        <td class="for-descargar">
                    <?php
                    $args = array(
                      'post_type' => 'attachment',
                      'numberposts' => null,
                      'post_status' => null,
                      'post_parent' => $post->ID,
                    );
                    $attachments = get_posts($args);
                    if ($attachments) {
                      foreach ($attachments as $attachment) {
                       $file = get_the_attachment_link($attachment->ID,true);
                       $file_pdf = explode(".pdf", $file);
                       $pdf = explode('http', $file_pdf[0]);
                       $lin = $pdf[1];
                        ?>
                        <a href="<?php echo 'http'.$lin.'.pdf'; ?>" class="btn btn-xs tool" title="Descargar PDF"><span class="fa fa-file-pdf-o"></span></a>                        
                        <?php                        
                      }
                    }
                    $cont = get_the_content();
                    $cont2 = get_the_content();
                    $vide = explode("[embed]https://www.you", $cont);
                    $vides = explode("[/embed]", $vide[1]);
                    $youtube = $vides[0];
                    if(!empty($youtube))echo ' <a  class="fancybox-video tool" title="Ver video" href="https://www.you'.$youtube.'" ><span class="fa fa-youtube-play"></span></a>';
                    
                    $sc = explode('src="', $cont2);
                    $scl = explode('"', $sc[1]);
                    $soundcloud = $scl[0];
                    if(!empty($soundcloud))echo ' <a  class="fancybox fancybox.iframe tool" title="Escuchar musica" href="'.$soundcloud.'" ><span class="fa fa-soundcloud"></span></a>';                    
                    ?>
                </td>
                    </tr>               
                <?php 
                //the_content(); 
                endwhile;
                ?>
                </table>


<div class="tac">
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
<?php wp_reset_query(); ?>


<?php
//get_sidebar();
get_footer();

?>