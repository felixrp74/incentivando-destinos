<?php
/*Template Name: Encuestas*/

get_header();
 //if (have_posts()) : while (have_posts()) : the_post();



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
	<div class="main-titulo"><h1><?php the_title(); ?></h1></div>
	<div class="col-sm-8">
		<div style="border: 1px solid red"></div>
		<div style="border:1px solid green;">
			<div class="fb-comments" data-href="http://idecaperu.org" data-width="550" data-numposts="5"></div>
		</div>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php
//endwhile; endif;
get_footer();
