<?php
/*Template Name: Publicaciones*/

get_header(); 

?>
<?php if (have_posts()) : while (have_posts()) : the_post();?>
	<div class="container">	
		<div class="main-titulo"><h1><?php /*$categoria = get_the_category();
			$parent = get_cat_name($categoria[0]->category_parent);
			if (!empty($parent)) {
			    echo $parent.' uno';
			} else {
			    echo $categoria[0]->cat_name.' Dos';
			}*/the_title();?></h1>
		</div>
		<div class="">
			<div class="">	
				<div style="border:1px solid green">
					<div id="menu">
</div>
				</div>
				<?php 
					the_content(); 
					echo "<br>";
					/*$custom_query1 =  new WP_Query( array( 'post_type' => 'any','category_name'=>'publicaciones', 'posts_per_page'=>-1 ,'orderby'=>'date', 'order' => 'DESC','paged' => get_query_var('page')) );
					while($custom_query1->have_posts()) : $custom_query1->the_post();
					echo '<br><span style="border:1px solid red"'.the_title().'</span>';
					endwhile;*/
					
				?>	
				
				
				<!--div class="excerpt-post">
					<h2 id="post-<?php the_ID(); ?>">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
					<?php the_title(); ?></a></h2>
					<div class="catslist"><?php the_category(' and '); ?></div>
					    <div class="entry">
					        <?php the_excerpt('Continue Reading...') ?>
					    </div>
					<?php trackback_rdf(); ?>
				</div-->
<div style="margin-bottom:20px;">


	<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs tab-ideca-link" role="tablist">
  	<?php
	$category = get_the_category(127);
	$catid=$category[0]->category_parent;
	if($catid==0){
	  $catid=$category[0]->cat_ID;
	}
	$categories = get_categories('child_of='.intval($catid).'&orderby=id&order=ASC'); 		
	$x = 0;	$y = 0;	 $suma=0;

	foreach ($categories as $category) {
		$y++;
	    if ($category->parent ==$catid):
	    	?>
	    	<li role="presentation" class="<?php if($x++ == 0) echo 'active';?>"><a href="#tab_<?php echo $y;?>" aria-controls="tab_<?php echo $y;?>" role="tab" data-toggle="tab"><?php echo $category->cat_name; ?></a></li>
	    	<?php	    
	        //echo '<span class="category"><a href="">'.$category->cat_name.'</a></span>';
	        $subcategories=  get_categories('child_of='.intval($category->cat_ID));
	        foreach ($subcategories as $subcategory) {
	            echo '<span class="subcategory" style="padding-left:12px">';
	            echo '<a href="">'.$subcategory->cat_name.'</a></span>';
	        }
	    endif;
	    $suma = $suma+1;;
	}
	//echo $suma;
	?>
    </ul>

  <!-- Tab panes -->
  <div class="tab-content tab-ideca">
    <div role="tabpanel" class="tab-pane active" id="tab_1">
    	<?php $custom_query =  new WP_Query( array( 'post_type' => 'any','category_name'=>'pueblos-indigenas', 'posts_per_page'=>-1 ,'orderby'=>'date', 'order' => 'DESC','paged' => get_query_var('page')) ); ?>    
		<?php /*the_excerpt();*/?>

		<?php 
		    $category = get_category_by_slug('pueblos-indigenas'); 
		    $titulo_cat =  $category->name;
		    $descripcion_cat = $category->description;
		?>
		<h3><?php echo $titulo_cat; ?></h3>
		<p><?php echo $descripcion_cat; ?></p>

		<table class="table table-bordered table-hover tabla-publica">
			<tr class="bg-info">
				<th>Código</th>
				<th style="min-width:100px;">Autor (es)</th>
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
				<td><?php if(!empty($pais)) echo $pais; else echo 'Perú'; ?></td>
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
    </div><!-- termina primero -->

    <div role="tabpanel" class="tab-pane" id="tab_2">
    	<?php $custom_query =  new WP_Query( array( 'post_type' => 'any','category_name'=>'testimonios-de-fe', 'posts_per_page'=>-1 ,'orderby'=>'date', 'order' => 'DESC','paged' => get_query_var('page')) ); ?>    
		<?php 
		    $category = get_category_by_slug('testimonios-de-fe'); 
		    $titulo_cat =  $category->name;
		    $descripcion_cat = $category->description;
		?>
		<h3><?php echo $titulo_cat; ?></h3>
		<p><?php echo $descripcion_cat; ?></p>
		<table class="table table-bordered table-hover tabla-publica">
			<tr class="bg-info">
				<th>Código</th>
				<th style="min-width:100px;">Autor (es)</th>
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
				<td><?php if(!empty($pais)) echo $pais; else echo 'Perú'; ?></td>
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
    </div>
    <div role="tabpanel" class="tab-pane" id="tab_3">
    	<?php $custom_query =  new WP_Query( array( 'post_type' => 'any','category_name'=>'dialogos-andinos', 'posts_per_page'=>-1 ,'orderby'=>'date', 'order' => 'DESC','paged' => get_query_var('page')) ); ?>    
		<?php 
		    $category = get_category_by_slug('dialogos-andinos'); 
		    $titulo_cat =  $category->name;
		    $descripcion_cat = $category->description;
		?>
		<h3><?php echo $titulo_cat; ?></h3>
		<p><?php echo $descripcion_cat; ?></p>
		<table class="table table-bordered table-hover tabla-publica">
			<tr class="bg-info">
				<th>Código</th>
				<th style="min-width:100px;">Autor (es)</th>
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
				<td><?php if(!empty($pais)) echo $pais; else echo 'Perú'; ?></td>
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
    </div>



    <div role="tabpanel" class="tab-pane" id="tab_4">
    	<?php $custom_query =  new WP_Query( array( 'post_type' => 'any','category_name'=>'otros', 'posts_per_page'=>-1 ,'orderby'=>'date', 'order' => 'DESC','paged' => get_query_var('page')) ); ?>    
		<?php 
		    $category = get_category_by_slug('otros'); 
		    $titulo_cat =  $category->name;
		    $descripcion_cat = $category->description;
		?>
		<h3><?php echo $titulo_cat; ?></h3>
		<p><?php echo $descripcion_cat; ?></p>
		
		<!--table class="table table-bordered table-hover tabla-publica">
			<tr class="bg-info">
				<th>Código</th>
				<th style="min-width:100px;">Autor (es)</th>
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
				<td><?php if(!empty($pais)) echo $pais; else echo 'Perú'; ?></td>
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
		</table-->
    </div>
  </div>

</div>



</div>
			</div>
			<?php //get_sidebar(); ?>
		</div>

	</div>
		
<?php endwhile; endif; ?>
<?php  get_footer(); ?>