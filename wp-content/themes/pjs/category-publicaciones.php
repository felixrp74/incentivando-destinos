<?php

get_header(); 

?>
<?php if (have_posts()) : while (have_posts()) : the_post();?>
	<div class="container">	
		<div class="main-titulo"><h1><?php $categoria = get_the_category();
			$parent = get_cat_name($categoria[0]->category_parent);
			if (!empty($parent)) {
			    echo $parent;
			} else {
			    echo $categoria[0]->cat_name.' Dos';
			}?></h1>
		</div>
		<div class="">
			<div class="">	
				<div>
					<div id="menu" class="arreglo4">
						<?php 
						$my_postid = 19;//This is page id or post id
						$content_post = get_post($my_postid);
						$content = $content_post->post_content;
						$content = apply_filters('the_content', $content);
						$content = str_replace(']]>', ']]>', $content);
						echo $content;
						?>
					</div>
				</div>

				<div style="margin:20px 0 30px 0;">
					<p><?php //the_excerpt(); ?></p>
					<div >
					    <?php 
					    /*$category = get_the_category(); 
					    $ider = $category[0]->slug;
					    if(category_description()){
					        echo category_description();
					    }else{echo "";}*/
					     ?>

					</div>
				</div>
<div style="margin-bottom:20px;">


	<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs tab-ideca-link" role="tablist">
  	<?php
  	//$idcategoria = get_query_var('publicaciones');
  	//var_dump($idcategoria);
	$category = get_the_category();
	//var_dump($category);
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
	    	<li role="presentation" class="<?php if($x++ == 0) {echo 'active';}?>"><a href="#tab_<?php echo $y;?>" aria-controls="tab_<?php echo $y;?>" role="tab" data-toggle="tab"><?php echo $category->cat_name; ?></a></li>
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
    <div role="tabpanel" class="tab-pane active arreglo4" id="tab_1">
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
				<th style="min-width:100px;max-width:200px;">Autor (es)</th>
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
                    $vide = explode("[embed]https://youtu.be/", $cont);
                    $vides = explode("[/embed]", $vide[1]);
                    $youtube = $vides[0];
                    if(!empty($youtube))echo ' <a  class="fancybox-video tool" title="Ver video" href="https://www.youtube.com/watch?v='.$youtube.'&autoplay=true" ><span class="fa fa-youtube-play"></span></a>';
                    
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

    <div role="tabpanel" class="tab-pane arreglo4" id="tab_2">
    	<?php $custom_query =  new WP_Query( array( 'post_type' => 'any','category_name'=>'testimonios-de-fe', 'posts_per_page'=>-1 ,'orderby'=>'date', 'order' => 'DESC','paged' => get_query_var('page')) ); ?>    
		<?php 
		    $category = get_category_by_slug('testimonios-de-fe'); 
		    $titulo_cat =  $category->name;
		    $descripcion_cat = $category->description;
		?>
		<h4><?php echo $titulo_cat; ?></h4>
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
    <div role="tabpanel" class="tab-pane arreglo4" id="tab_3">
    	<?php $custom_query =  new WP_Query( array( 'post_type' => 'any','category_name'=>'dialogos-andinos', 'posts_per_page'=>-1 ,'orderby'=>'date', 'order' => 'DESC','paged' => get_query_var('page')) ); ?>    
		<?php 
		    $category = get_category_by_slug('dialogos-andinos'); 
		    $titulo_cat =  $category->name;
		    $descripcion_cat = $category->description;
		?>
		<h6><?php echo $titulo_cat; ?></h6>
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



    <div role="tabpanel" class="tab-pane arreglo4" id="tab_4">
    	<?php $custom_query =  new WP_Query( array( 'post_type' => 'any','category_name'=>'otros', 'posts_per_page'=>-1 ,'orderby'=>'date', 'order' => 'DESC','paged' => get_query_var('page')) ); ?>    
		<?php 
		    $category = get_category_by_slug('otros'); 
		    $titulo_cat =  $category->name;
		    $descripcion_cat = $category->description;
		?>
		<h2><?php echo $titulo_cat; ?></h2>
		<p><?php echo $descripcion_cat; ?></p>
		<div class="row">
			<div class="col-sm-4">
				<table class="table table-hover" style="border:1px solid #dddddd">
					<tr>
						<th colspan="2" class="bg-info">VIDEOS</th>						
					</tr>
					<?php while($custom_query->have_posts()) : $custom_query->the_post(); ?>
						
							<?php 
							$cont = get_the_content();
		                    $conteo1 = substr_count($cont,"youtu.be");
		                    $vide = explode('[embed]https://youtu.be/', $cont);
                            $vides = explode('[/embed]', $vide[1]);                            

                            if(!empty($vides[0])){
                                $youtube = 'https://www.youtube.com/watch?v='.$vides[0];
                                $clase = 'fancybox-video';
                                $mas = '&';
                            }else{
                                $vid2 = explode('src="https://www.youtube.com', $cont);
                                $vid2a = explode('"', $vid2[1]);
                                //echo $vid2[1].'hola ';
                                $youtube = 'https://www.youtube.com'.$vid2a[0];
                                $clase = 'fancybox fancybox.iframe';
                                $mas = '?';
                            }
		                    if($conteo1 > 0){
							?>
							<tr>
								<td class="tit-arch"><?php the_title(); ?></td>
								<td class="for-descargar" style="width:50px;">
									<?php				                    
				                    if(!empty($youtube)){echo ' <a  class="fancybox-video tool" title="Ver video" href="'.$youtube.$mas.'autoplay=1" ><span class="fa fa-youtube-play"></span></a>';}			                    
				                    ?>
								</td>
							</tr>
							<?php }?>
										
					<?php 
					endwhile;
					?>
				</table>
			</div>
		
		
			<div class="col-sm-4">
				<table class="table table-hover" style="border:1px solid #dddddd">
					<tr>
						<th colspan="2" class="bg-success">MUSICA / AUDIOS</th>						
					</tr>
					<?php while($custom_query->have_posts()) : $custom_query->the_post(); ?>
						
							<?php 
							$cont = get_the_content();
							$sc = explode('src="https://w.soundcloud.com', $cont);
	                        $scl = explode('"', $sc[1]);
	                        $soundcloud = $scl[0];
	                        $conte2 = substr_count($cont,"w.soundcloud.com");
	                        if($conte2 > 0){
							?>
							<tr>
								<td class="tit-arch"><?php the_title(); ?></td>
								<td class="for-descargar" style="width:50px;">
									<?php
				                    echo '<a href="https://w.soundcloud.com'.trim($soundcloud).'" class="fancybox fancybox.iframe tool"><span class="fa fa-volume-up tool" title="Escuchar Musica"></span></a>';
				                    ?>
								</td>
							</tr>	
							<?php }?>
									
					<?php 
					endwhile;
					?>
				</table>
			</div>
		
		
			<div class="col-sm-4">
				<table class="table table-hover" style="border:1px solid #dddddd">
					<tr>
						<th colspan="2" class="bg-danger">ARCHIVOS .PDF</th>						
					</tr>
					<?php while($custom_query->have_posts()) : $custom_query->the_post(); ?>
						
							<?php 		
							$cont = get_the_content();
							$may = explode('.pdf"', $cont);
							$pay = explode('http://', $may[0]);
							$pdf = $pay[1];
							$cont_pdf = substr_count($cont, '.pdf');
							if ($cont_pdf > 0) {
							?>
							<tr>
								<td class="tit-arch"><?php the_title(); ?></td>
								<td class="for-descargar" style="width:50px;">
									<?php	?>
				                      
				                        <a href="http://<?php echo $pdf; ?>.pdf" target="_blank" class="btn btn-xs tool" title="Descargar PDF"><span class="fa fa-file-pdf-o"></span></a>                        
				                        <?php                        
				                      
				                    ?>
								</td>
							</tr>	
							<?php }?>
									
					<?php 
					endwhile;
					?>
				</table>
			</div>
			
		</div>
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