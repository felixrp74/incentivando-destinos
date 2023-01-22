<?php

get_header();
 if (have_posts()) : while (have_posts()) : the_post();

?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5&appId=1109526155745993";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="container">	
	<div class="main-titulo"><h1><?php $categoria = get_the_category();
			$parent = get_cat_name($categoria[0]->category_parent);
			if (!empty($parent)) {
				echo $parent;
				$nom = $parent;
			} else {
			    echo $categoria[0]->cat_name;
			}?></h1>
		</div>
	<div class="row">
		
		<div class="col-sm-8 fuente">
			<div class="breads"><?php get_breadcrumbs(); ?></div>
			<div><h1 class="pst"><?php the_title(); ?></h1></div>
			<div style="margin-bottom: 30px;"><div class="fb-like" data-href="https://www.facebook.com/ideca.peru/?fref=ts" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div></div>
			<?php 
				$my_postid = get_the_id();//This is page id or post id
                $content_post = get_post($my_postid);
                $content = $content_post->post_content;     
                
                $el_id = intval(preg_replace('/[^0-9]+/', '', $content), 10);
			?>		
		<div>
			<?php 
			
			$myrows = $wpdb->get_results( "SELECT * FROM wp_poll_wp_Results WHERE Juna_IT_Poll_Add_Question_FieldID='".$el_id."'" );
			//var_dump($myrows);
			$si = $myrows[0]->Juna_IT_Poll_Count; // SI
			$no = $myrows[1]->Juna_IT_Poll_Count; // NO
			$total = $si+$no;
			$total = ($total == 0)?1:$total;
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
			<div>
				<a href="<?php echo get_category_link(85); ?>" class="btn btn-publi pull-right"> <i class="fa fa-chevron-circle-right"></i> Ver todas las Encuestas</a>
			</div>
		</div>
		<div >
			<h3 class="tit dorado" style="margin-top: 70px;">Comentarios</h3>
			<?php comments_template('/comenta.php'); 
			//http://localhost/ideca/wp-comments-post.php
			?>
		</div>
			<!--a href="<?php echo get_category_link(3); ?>" class="btn btn-mas pull-right">Mas noticias » </a-->
			
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php
endwhile; endif;
get_footer();
