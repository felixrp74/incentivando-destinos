<!DOCTYPE html>
<!--if lt IE 7html.no-js.lt-ie9.lt-ie8.lt-ie7
-->
<!--if IE 7html.no-js.lt-ie9.lt-ie8
-->
<!--if IE 8html.no-js.lt-ie9
-->
<!-- [if gt IE 8] <!-->
<html class="no-js" lang="es">
<!-- <![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>
	<?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );
	?>		
	</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">

	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/normalize.css">        
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/jquery.bxslider.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
    <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/modernizr-2.7.1.min.js"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/fontello.css">        
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/js/fancy/jquery.fancybox.css?v=2.1.5" media="screen" />
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/mediaelementplayer.min.css" media="screen" />
	<?php wp_head(); ?>
</head>
<body>
        <header class="header">
          <div class="linea-top">
             <div class="container">
                  <span><i class="fa fa-phone"></i>+51 51 205547</span>
                  <span><i class="fa fa-print"></i>+51 51 357415</span>
             </div>                        
          </div>
          <div class="container principal">
                <div class="col-sm-2 col-xs-4 cont-logo"><div class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/image/lolast.png" alt="IDECA" /></a></div></div>             
                <div class="col-sm-7 col-xs-8">
                   <div class="titulo">
                       <h1><span>instituto de estudios</span> de las culturas andinas</h1>
                   </div>                    
                </div>
                <div class="col-sm-3 col-xs-12">                  
                  <div class="row redes">
                       <a href="https://www.youtube.com/channel/UC_KrAF8ZLvysXE2EtJHzpFQ" target="_blank" class="btn yt" title="Youtube"><span class="fa fa-youtube-play"></span></a>
                       <a href="http://pe.linkedin.com/pub/ideca-emaus/68/bb1/758" target="_blank" class="btn in" title="Linkedin"><span class="fa fa-linkedin"></span></a>
                       <a href="#" target="_blank" class="btn tw" title="Twitter"><span class="fa fa-twitter"></span></a>
                       <a href="https://www.facebook.com/ideca.peru" target="_blank" class="btn fb" title="Facebook"><span class="fa fa-facebook"></span></a>
                       <a href="http://idecaperu.blogspot.com/" target="_blank" class="btn bl" title="Blog"><span class="icon-blogger"></span></a>
                   </div>  
                   <div class="row">
                       <!--form class="navbar-form navbar-right" role="search" style="margin-bottom:0;margin-top:5px;padding-right:0" >
                        <div class="form-group buscar">
                          <input type="text" class="form-control">
                        </div>
                      </form-->
                      <?php $nombrem= home_url();?>
                      <form method="get" action="<?php echo $nombrem; ?>" class=" right" style="">

                        <div class="input-group buscar">
                          <input type="text" class="form-control" name="s" id="s" >
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><span class="fa fa-search"></span></button>
                          </span>
                          
                        </div><!-- /input-group -->               
                      </form>
                   </div>      
                </div>
          </div>  
           <div class="container">
               
           </div>            
        </header>
        <div class="container">
           
            <nav class="navbar navbar-default for-menu">

                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                  <a class="navbar-brand" href="#"><div class="espacio"></div></a>
                </div>
                <!-- Note that the .navbar-collapse and .collapse classes have been removed from the #navbar -->
                <div id="navbar" class="navbar-collapse collapse menua">
                  
					<?php   
						wp_nav_menu( array(
						    'theme_location' => 'main-menu' ,
						    'container' => false,
							'menu' => 'menu-top', 
							'menu_class'=> 'nav navbar-nav navbar-right'
							) );
						?> 
                  
                </div><!--/.nav-collapse -->

                </nav>
                
            </div>
            <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
