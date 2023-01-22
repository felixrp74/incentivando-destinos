<?php
@ini_set( 'upload_max_size' , '128M' );
@ini_set( 'post_max_size', '128M');
@ini_set( 'max_execution_time', '3000' );
// registrar menus
function register_my_menus() {
	register_nav_menus(
		array(
			'main-menu' => __( 'Main Menu' ),
			'extra-menu' => __( 'Extra Menu' )
			)
		);
}
add_action( 'init', 'register_my_menus' );

require_once('wp_bootstrap_navwalker.php');

// extraer primera imagen del post
function get_image_post($size,$id_post=''){
    global $more;
    preg_match('/wp-image-([0-9]*)/', get_post($id_post)->post_content, $imag);
    if( !empty($imag)){
        $id_imagen = (integer)$imag[1];
        $img = get_image_tag($id_imagen, get_post($id_post)->post_title, get_post($id_post)->post_title, '',$size); 
    } else {
        $img = '';
    }
    return $img;
}


// shortcode para glyphicons
function glyphicon_func( $atts ) {
	return '<span class="glyphicon glyphicon-'.$atts['nombre'].'"></span>';
}
add_shortcode('glyphicon', 'glyphicon_func');


// obtener fecha de publicacion en formato facebook
function get_elapsed_time($id_post = ''){
    $time = 0;
    $time = current_time('timestamp') - get_the_time('U', $id_post);
    $time_p = array(
        array(60*60*24,__('día','gs'),__('d','gs')),
        array(60*60,__('hora','gs'),__('h','gs')),
        array(60,__('minuto','gs'),__('m','gs')),
        array(1,__('segundo','gs'),__('s','gs'))
    );
    if($time <= 172800){
        for($i = 0; $i < count($time_p);$i++){
            $seconds = $time_p[$i][0];
            if(($count = floor($time/$seconds)) != 0)
                break;
            
        }
        $output = (1 == $count ) ? '1 '. $time_p[$i][1] : $count . ' ' . $time_p[$i][2];
        
        if( !(int)trim($output)){
            $output = '0 '.__('seconds','gs');
        }
        
        //$output .= __(' ago','wpradio');
        
        return 'Hace '. $output;
        //return 'Hace ' . human_time_diff(get_the_time('U', $id_post),current_time('timestamp'));
    } else {
        return get_the_time('l, j F Y', $id_post);
        //the_time('l, F jS, Y')
    }
}

//Gets post cat slug and looks for single-[cat slug].php and applies it
add_filter('single_template', create_function(
        '$the_template',
        'foreach( (array) get_the_category() as $cat ) {
                if ( file_exists(TEMPLATEPATH . "/single-{$cat->slug}.php") )
                return TEMPLATEPATH . "/single-{$cat->slug}.php"; }
        return $the_template;' )
);

// ofuscador de direcciones de email
function mail_shortcode_func( $atts, $content = null){
    if( !is_email($content) ){
        return;
    } else {
        $mail = $content;
        $element = explode('@', $mail);
        //return antispambot( $content );
        return $element[0].'@<span style="display:none;">nulo</span>'.$element[1];
    }
    
}
add_shortcode('email', 'mail_shortcode_func');

// obtener ratro o ruta del post actual
function get_breadcrumbs()
{
    global $wp_query;

    if ( !is_home() ){

        // Start the UL
        echo '<ul class="breadcrumbs">';
        // Add the Home link
        echo '<li><a href="'. home_url() .'">Inicio</a></li>';

        if ( is_category() )
        {
            $catTitle = single_cat_title( "", false );
            $cat = get_cat_ID( $catTitle );
            echo "<li> &raquo; ". get_category_parents( $cat, TRUE, " &raquo; " ) ."</li>";
        }
        elseif ( is_archive() && !is_category() )
        {
            echo "<li> &raquo; Archivos</li>";
        }
        elseif ( is_search() ) {

            echo "<li> &raquo; Busqueda</li>";
        }
        elseif ( is_404() )
        {
            echo "<li> &raquo; 404 No Encontrado</li>";
        }
        elseif ( is_single() )
        {
            $category = get_the_category();
            $category_id = get_cat_ID( $category[0]->cat_name );
            echo '<li> &raquo; '. get_category_parents( $category_id, TRUE, " &raquo;</li><li> " );
            echo the_title('','', FALSE) ."</li>";
        }
        elseif ( is_page() )
        {
            $post = $wp_query->get_queried_object();

            if ( $post->post_parent == 0 ){

                echo "<li> &raquo; ".the_title('','', FALSE)."</li>";

            } else {
                /* Kindly borrowed and adapted from Breadcrumb Titles For Pages plugin
                http://wordpress.org/extend/plugins/page-breadcrumbs-for-wptitle/ */
                $title = the_title('','', FALSE);
                $prefix = "</li><li> &raquo; ";

                $seplocation = ( $prefix === substr( $title, strlen( $prefix ) * -1 ) ) ? 'right' : 'left';

                $ancestors = array_reverse( $post->ancestors );
                $ancestors[] = $post->ID;

                $titles = array();
                foreach ( $ancestors as $ancestor ){
                    if( $ancestor != end($ancestors) ){
                        $titles[] = '<a href="'. get_permalink($ancestor) .'">'. strip_tags( apply_filters( 'single_post_title', get_the_title( $ancestor ) ) ) .'</a>';
                    } else {
                        $titles[] = strip_tags( apply_filters( 'single_post_title', get_the_title( $ancestor ) ) );
                    }
                }

                $title = implode( $prefix, $titles );

                if ( $seplocation == 'right' )
                    $title = $title . $prefix;
                else
                    $title = $prefix . $title;

                echo $title;
            }
        }
        // End the UL
        echo "</ul>";
    }
}

// borrar estilo por defecto de galeria
add_filter( 'use_default_gallery_style', '__return_false' );

add_theme_support('post-thumbnails');
/*add_image_size( 'img-noticia',350, 220, true);
if ( function_exists( 'add_image_size' ) ) {
  add_image_size( 'img-agenda',458, 270, true);
   add_image_size( 'imagen-banner-grande',480, 84, true);
   add_image_size( 'imagen-banner-pequenio',280, 85, true);
}
*/
if ( function_exists( 'add_image_size' ) ) {
  add_image_size( 'princ',560, 430, true);
}
/* Funcion para controlar el tamanio del excerpt */
function custom_excerpt_length( $length ) {
    if(!empty($_GET['s'])){
        return 20;
    }else if(is_category(53)){
        return 25;
	}else if(is_category(90)){
        return 30;
    }else if(is_category(84)){
        return 20;
    }else{
        return 80;
    }
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


function new_excerpt_more( $more ) {
    return '... <a class="mais" href="'.get_the_permalink().'">Leer más</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

function getIdImageFromUrl($attachment_url = '')
{
    global $wpdb;
    $attachment_id = false;

    // If there is no url, return.
    if ( '' == $attachment_url )
            return;

    // Get the upload directory paths
    $upload_dir_paths = wp_upload_dir();

    // Make sure the upload path base directory exists in the attachment URL, to verify that we're working with a media library image
    if ( false !== strpos( $attachment_url, $upload_dir_paths['baseurl'] ) ) {

            // If this is the URL of an auto-generated thumbnail, get the URL of the original image
            $attachment_url = preg_replace( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );

            // Remove the upload path base directory from the attachment URL
            $attachment_url = str_replace( $upload_dir_paths['baseurl'] . '/', '', $attachment_url );

            // Finally, run a custom database query to get the attachment ID from the modified attachment URL
            $attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url ) );

    }

    return $attachment_id;
}
/*function getSimpleFirstImage($content)
{
    $first_img = '';
    preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
    $first_img = $matches[1][0];

    return $first_img;
}
function getFirstImage($content, $size)
{
    $simple_image = getSimpleFirstImage($content);
    $id = getIdImageFromUrl($simple_image);
    $data_image = wp_get_attachment_image_src($id, $size);
    $image = $data_image[0]; // Obtenemos el src
    return $image;
}


*/

function latest_post($cat) {  
    $args = array(
       'posts_per_page' => 1, // we need only the latest post, so get that post only
       'cat' => $cat // Use the category id, can also replace with category_name which uses category slug
    );

    $str = "";
    $posts = get_posts($args);

    return $posts;
}
function cortar_t($text){
    return wp_trim_words($text,10,"...");
    //return substr($text,0,30);
}