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
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css?v=2.2">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
    <script src="<?php echo get_template_directory_uri(); ?>/js/modernizr-2.6.2.min.js"></script>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/fontello.css">        
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/js/fancy/jquery.fancybox.css?v=2.1.5" media="screen" />
  <!-- <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/mediaelementplayer.min.css" media="screen" /> -->
  
  <!-- FONTS 2023 -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
  <!-- FONTS 2023 -->

	<?php wp_head(); ?>
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-132446717-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-132446717-1');
	</script>

</head>
<body>
        <header class="header">
          
          <div class="linea-top">
            <div class="container">    
                  <!-- <span><i class="fa fa-phone"></i>+51 51 205547</span> -->
                  <!-- <span><i class="fa fa-print"></i>+51 51 357415</span> -->
               
                <div class="row" style="margin-left: 0; margin-right: 0; margin-top: 10px; margin-bottom: 10px">
                  <div class="col-sm-6 col-xs-4">
                    <div class="row redesleft">
                      <a class='btn-don' href="<?= get_the_permalink(14634)?>">
                         <i class="fa fa-heart" aria-hidden="true"></i> COLABORA
                      </a>
                    </div>
                  </div>
            
                  <div class="col-sm-6 col-xs-12">   
                  <div class="row redesright">
                         <!-- <div class="row redes"> -->
					  
            <!-- <a href="https://www.youtube.com/channel/UC_KrAF8ZLvysXE2EtJHzpFQ" target="_blank" class="btn yt" title="Youtube"><span class="fa fa-youtube-play"></span></a>
            <a href="http://pe.linkedin.com/pub/ideca-emaus/68/bb1/758" target="_blank" class="btn in" title="Linkedin"><span class="fa fa-linkedin"></span></a>
            <a href="https://twitter.com/idecaperu" target="_blank" class="btn tw" title="Twitter"><span class="fa fa-twitter"></span></a>
            <a href="https://www.facebook.com/ideca.peru" target="_blank" class="btn fb" title="Facebook"><span class="fa fa-facebook"></span></a>
            <a href="http://idecaperu.blogspot.com/" target="_blank" class="btn bl" title="Blog"><span class="icon-blogger"></span></a> -->
            
        <!-- </div>  -->
               
             
                      <span><i class="fa fa-phone"></i>+51 51 205547</span>
                    </div>
                  </div>
              </div>                        
            </div>    
          </div>
        </header>
        
        <div class="container">
           <!-- <div class=" principal headd"> -->
           <div class="" style="margin-top: 10px; margin-bottom: 10px;">
               <div class="row" style="margin-left: 0; margin-right: 0;">
                <div class="col-sm-2 col-xs-4 cont-logo"><div class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/image/logo-incentivando.png" alt="INCENTIVANDO" /></a></div></div>             
                <div class="col-sm-8 col-xs-8">
                   <div class="titulo">
                       <h1>incentivando destinos</h1>
                   </div>                    
                </div>
                <div class="col-sm-2 col-xs-12">                  
                               <!-- <div class="row redes">
					  
            <a href="https://www.youtube.com/channel/UC_KrAF8ZLvysXE2EtJHzpFQ" target="_blank" class="btn yt" title="Youtube"><span class="fa fa-youtube-play"></span></a>
            <a href="http://pe.linkedin.com/pub/ideca-emaus/68/bb1/758" target="_blank" class="btn in" title="Linkedin"><span class="fa fa-linkedin"></span></a>
            <a href="https://twitter.com/idecaperu" target="_blank" class="btn tw" title="Twitter"><span class="fa fa-twitter"></span></a>
            <a href="https://www.facebook.com/ideca.peru" target="_blank" class="btn fb" title="Facebook"><span class="fa fa-facebook"></span></a>
            <a href="http://idecaperu.blogspot.com/" target="_blank" class="btn bl" title="Blog"><span class="icon-blogger"></span></a>
            
        </div>  -->
             
                   <div class="row">
                       <!--form class="navbar-form navbar-right" role="search" style="margin-bottom:0;margin-top:5px;padding-right:0" >
                        <div class="form-group buscar">
                          <input type="text" class="form-control">
                        </div>
                      </form-->
                      <?php $nombrem= home_url();?>
                      <form method="get" action="<?php echo $nombrem; ?>" class=" right" style="">
                        <div class="input-group buscar">
                          
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" style="background-color: transparent;"><span class="fa fa-search"></span></button>
                          </span>
                          <input type="text" class="form-control" name="s" id="s" style="background-color: transparent;" placeholder="Buscar">
                          
                        </div><!-- /input-group -->               
                      </form>
                   </div>      
                </div>
                </div>
          </div>
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
							'menu' => 'menu-principal', 
							'menu_class'=> 'nav navbar-nav navbar-right'
							) );

						?> 
                  
                </div><!--/.nav-collapse -->

                </nav>
                
            </div>
            <div class="container">
              <nav class="navbar navbar-default for-menu2">
                <div class="navbar-inner">
                  <div class="navbar-header">

                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar2" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand hidden-lg" href="#"></a>
                    </div>
                    <!-- Note that the .navbar-collapse and .collapse classes have been removed from the #navbar -->
                    <div id="navbar2" class="navbar-collapse collapse menub">
                      <?php wp_nav_menu( array(
                        'theme_location' => 'extra-menu' ,
                        'container' => false,
                        'menu' => 'menu-top2', 
                        'menu_class'=> 'nav navbar-nav'
                        ) ); ?>
                    </div>
                  </div>
                 </nav>
            </div>
            <div id="fb-root"></div>
            <ul id="social_side_links">
              <li><a title="Siguenos en Facebook" href="https://www.facebook.com/IncentivandoDestinos" target="_blank"><i class="fa fa-facebook"></i></a></li>
              <li><a title="Siguenos en Twitter" href="https://twitter.com/ong_id" target="_blank"><i class="fa fa-twitter"></i></a></li>
              <li><a title="Suscribete" href="https://www.youtube.com/@asociacionincentivandodest8933/featured" target="_blank"><i class="fa fa-youtube"></i></a></li>
              <li><a title="Siguenos en Instagram" href="https://www.instagram.com/incentivandodestinos/" target="_blank"><i class="fa fa-instagram"></i></a></li>
              <li><a title="Siguenos en LinkedIn" href="https://www.linkedin.com/incentivandodestinos/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
            </ul>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
