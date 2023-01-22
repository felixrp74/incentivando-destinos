<?php
/*Template Name: Colabora*/
get_header(); 
?>
<style type="text/css">
.registro-donaciones {
    background-color: #086798;
    color: #fff;
}
.registro-donaciones img, .registro-voluntario img{
    width: 60%;
    height: auto;
}
.registro-voluntario {
    background-color: #cc3366;
    color: #cdcdcd;
}
.registro-voluntario, .registro-donaciones {
    font-size: 13px;
    line-height: 20px;
    text-align: center;
    /*padding: 20px 0 30px 0;*/
    margin-bottom: 40px;
}
.registro-donaciones h2 {
    color: #fff;
}
.registro-voluntario h2, .registro-donaciones h2 {
    font-size: 24px;
    background-position: center bottom;
    background-repeat: no-repeat;
    background-size: 30px 3px;
}
.registro-donaciones a.btn-registro{
    background-color: #086798;
    color: #fff;
    text-decoration: none;
    border: 1px solid #fff;
}
.registro-donaciones a.btn-registro:hover{
    background-color: #fff;
    color: #086798;
    border: 1px solid #086798;
}
.registro-voluntario a.btn-registro, .registro-donaciones a.btn-registro {
    display: inline-block;
    padding: 0 30px;
    line-height: 40px;
    font-size: 18px;
    text-transform: uppercase;
    font-weight: 800;
    -webkit-transition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    -ms-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;
}
.registro-voluntario a.btn-registro {
    background-color: #cc3366;
    color: #cdcdcd;
    text-decoration: none;
    border: 1px solid;
}
.registro-voluntario a.btn-registro:hover {
    background-color: #cdcdcd;
    color: #cc3366;
    border: 1px solid #cc3366;
}
.registro-voluntario a {
    color: #fff;
}
.form-group p {
    display:none;
}
div.in, div.in:hover {
    background: rgba(0,0,0,.5);
}
form input[type=submit]{
    background-color: #086798;
    color: #fff;
    text-decoration: none;
    border: 1px solid #fff;
    text-transform: uppercase;
    padding: 0 15px;
    line-height: 35px;
    font-size: 16px;
}
form input[type=submit]:hover{
    background-color: #fff;
    color: #086798;
    border: 1px solid;
}
.form-control {
	height: 30px;
	border-radius: 0px;
}
.comm{padding: 20px 0 40px 0;}
.img-don, .img-vol{
    height: 100%;
}
.img-don{
    background: #348ab4;
}
.img-vol{
    background: #d4557f;
}

</style>
<?php if (have_posts()) : while (have_posts()) : the_post();?>
	<div class="container">	
		<div class="main-titulo fnd-naranja" ><h1><?php the_title();?></h1>
		</div>
		<div class="row">
			<div class="col-sm-12">		
				<div class="breads"><?php get_breadcrumbs(); ?></div>
				<div class="row">
				    <div class="col-sm-6">
				        
						<div class="registro-donaciones">
						    <div class="row">
						        <div class="col-sm-4 tam">
						            <div class="img-don comm">
        						    <img src="<?php echo get_template_directory_uri(); ?>/image/donaciones.png">
        						    </div>
        						</div>
        						<div class="col-sm-8 tam nrml">
        						    <div class="comm">
            		                	<h2>Donaciones</h2>
            		                	<p>Si deseas colaborar económicamente con el IDECA</p>
            							<a class="btn-registro" href="#" data-toggle="modal" data-target="#dml-donaciones">ESCRÍBENOS</a>
            						</div>
        						</div>
							</div>
		                </div>
		                
					</div>
					<div class="col-sm-6">
						<div class="registro-voluntario">
						    <div class="row">
						        <div class="col-sm-4 tam">
						            <div class="img-vol comm">
						                <img src="<?php echo get_template_directory_uri(); ?>/image/voluntario.png">
						            </div>
        						</div>
        						<div class="col-sm-8 tam nrml">
        						    <div class="comm">
                			            <h2>Voluntariado</h2>
                			            <p>Si deseas colaborar como voluntario(a) en el IDECA</p>
                    		            <a class="btn-registro" href="#" data-toggle="modal" data-target="#mdl-voluntariado">ESCRÍBENOS</a>
                    		        </div>
                    	        </div>
                    	    </div>
                		</div>
					</div>
				</div>
			</div>
		</div>

	</div>
<div class="modal fade" id="mdl-voluntariado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>  
        <h2 class="modal-title" id="exampleModalLabel">Voluntariado</h2>
      </div>
      <div class="modal-body">
        <?= do_shortcode('[contact-form-7 id="14636" title="voluntariado"]') ?>
      </div>
      <div class="modal-footer">
        Sus datos personales están protegidos y no serán compartidos con nadie.
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="dml-donaciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>  
        <h2 class="modal-title" id="exampleModalLabel">Donaciones</h2>
      </div>
      <div class="modal-body">
        <?= do_shortcode('[contact-form-7 id="14637" title="donaciones"]') ?>
      </div>
      <div class="modal-footer">
        Sus datos personales están protegidos y no serán compartidos con nadie.
      </div>
    </div>
  </div>
</div>
<?php endwhile; endif; ?>
<?php  get_footer(); ?>
<script>
$(document).ready(function() {
    var heights = $(".tam").map(function() {
        return $(this).height();
    }).get(),
 
    maxHeight = Math.max.apply(null, heights);
 
    $(".tam").height(maxHeight);
});
</script>