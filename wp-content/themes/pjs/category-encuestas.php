<?php
global $query_string;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts($query_string.'&paged='.$paged.'&posts_per_page=5');

get_header();

?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5&appId=1109526155745993";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php //if (have_posts()) : while (have_posts()) : the_post();?>
<div class="container"> 
    <div class="main-titulo"><h1><?php single_cat_title(); ?></h1></div>
    <div class="row">
	<div class="col-sm-8">
		<div class="breads"><?php get_breadcrumbs(); ?></div>
		<h2 class="enc-title" style="margin-bottom: 5px;"><?php the_title(); ?></h2>	
		<div style="margin-bottom: 30px;min-height: 15px"><div class="fb-like" data-href="https://www.facebook.com/ideca.peru/?fref=ts" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div></div>
			
			<?php 
				
				$my_postid = get_the_id();//This is page id or post id
                $content_post = get_post($my_postid);
                $content = $content_post->post_content;     
                
                $el_id = intval(preg_replace('/[^0-9]+/', '', $content), 10);
			?>		
		<div>

			<?php 
			
			$myrows = $wpdb->get_results( "SELECT * FROM wp_poll_wp_results WHERE juna_IT_Poll_add_Question_FieldID='".$el_id."'" );
			//var_dump($myrows);
			$si = $myrows[0]->Juna_IT_Poll_Count; // SI
			$no = $myrows[1]->Juna_IT_Poll_Count; // NO
			$total = $si+$no;
			$para_si = number_format(($si*100)/$total,1,'.','');
			$para_no = number_format(($no*100)/$total,1,'.','');
			
			?>
			<div class="for-si-no">
				<div class="progress">
				  	<div class="progress-bar para-si" role="progressbar" aria-valuenow="<?php echo $para_si; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $para_si; ?>%">
				    	<span class="sr-only"><?php echo $para_si; ?>% Complete (success)</span>
				    	<p>SI: <strong><?php echo $para_si; ?></strong>%</p>
				  	</div>
				</div>
				<div class="progress">
				  	<div class="progress-bar para-no" role="progressbar" aria-valuenow="<?php echo $para_no; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $para_no; ?>%">
				    	<span class="sr-only"><?php echo $para_no; ?>% Complete (warning)</span>
				    	<p>NO: <strong><?php echo $para_no; ?></strong>%</p>
				  	</div>
				</div>
			</div>
		</div>
		<div>
			<h3 class="tit dorado" style="margin-top: 50px;">Otras encuestas</h3>
			<table class="table table-hover">
				<tbody>
		            <?php $custom_query =  new WP_Query( array( 'post_type' => 'any', 'post__not_in' => array(get_the_ID()),'category_name'=>'encuestas', 'posts_per_page'=>5 ,'orderby'=>'date', 'order' => 'DESC','paged' => get_query_var('page')) ); ?>  	            
		            <?php $exis = 0; while($custom_query->have_posts()) : $custom_query->the_post(); ?>                     	                            		            
		            <tr>
						<td class="enla-au"> 
							<a href="<?php the_permalink() ?>">								
								<h5><?php the_title(); ?></h5>
								<p><i class="fa fa-calendar"></i> <?php echo get_elapsed_time(); ?></p>
							</a>
						</td>
						<td><a href="<?php the_permalink(); ?>" class=" tool btn btn-xs btn-radio pull-right"><i class="fa fa-link"></i> Ver resultados</a></td>
					</tr>                   	                
		            <?php 
		            endwhile;
		            ?>	
	            </tbody>
	            </table>
		</div>
	            <?php
	            $big = 999999999;
	            $paginacion = paginate_links(array(
	                    'base' => str_replace( $big, '%#%', get_pagenum_link($big) ),
	                    'current' => max( 1, get_query_var('paged') ),
	                    'total' => $wp_query->max_num_pages,
	                    'mid_size' => 1,
	                    'type' => 'list'
	            ));
	            echo str_replace( "<ul class='page-numbers'>", '<ul class="pagination paginacion">', $paginacion );
	    wp_reset_query(); ?>
	</div>
	<?php get_sidebar(); ?>

</div>
<?php wp_reset_query(); ?>
</div>

<?php
//get_sidebar();
get_footer();

?>