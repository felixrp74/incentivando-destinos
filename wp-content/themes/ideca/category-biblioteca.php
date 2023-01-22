<?php
global $query_string;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
//query_posts($query_string.'&paged='.$paged.'&posts_per_page=12&orderby=meta_value_num&meta_key=Codigo&order=ASC');
query_posts($query_string.'&paged='.$paged.'&posts_per_page=12&orderby=date&order=DESC');

get_header();

?>
<?php //if (have_posts()) : while (have_posts()) : the_post();?>
<div class="container"> 
    <div class="main-titulo fnd-dorado" ><h1><?php single_cat_title(); ?></h1></div>
    <div class="breads">
    
    <a href="<?php echo home_url(); ?>">Inicio   </a>» <a href="#" class="activo"><?php single_cat_title(); ?> </a>
		
	</div>
	<div class="arreglo4">
		<?php 
		$my_postid = 4331;//This is page id or post id
		$content_post = get_post($my_postid);
		$content = $content_post->post_content;
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]>', $content);
		echo $content;
		?>
		<a target="_blank" href="https://biblioteca.idecaperu.org">Biblioteca en linea</a>
	</div>
</div>
<?php
get_footer();

?>