$(document).ready(main);
function main(){

    $( ".sub-menu" ).prev().addClass( 'dropdown-toggle' ); 
    $( ".sub-menu" ).prev().attr("data-toggle", "dropdown");        
    $('.sub-menu').addClass('dropdown-menu');
    $( ".sub-menu" ).prev().append( '<b class="caret"></b>' );
    
    $(".legal > a").prepend('<span class="fa fa-gavel er"></span>');
    $(".ambi > a").prepend('<span class="fa fa-tint er"></span>');
    $(".ini a").prepend('<span class="fa fa-home er"></span>');
    $(".somo a").prepend('<span class="fa fa-users er"></span>');
    $(".forma a").prepend('<span class="fa fa-book er"></span>');
    $(".post-g a").prepend('<span class="fa fa-graduation-cap er"></span>');
    $(".bibli > a").prepend('<span class="fa fa-tasks er"></span>');
    $(".publi > a").prepend('<span class="fa fa-file-text er"></span>');
    $(".contac a").prepend('<span class="fa fa-envelope er"></span>');
    $(".noti a").prepend('<span class="fa fa-leanpub er"></span>');
    $(".rad a").prepend('<span class="fa fa-microphone er"></span>');
    $(".cide a").prepend('<span class="fa fa-globe er"></span>');
    $(".vide a").prepend('<span class="fa fa-video-camera er"></span>');
    $(".encues a").prepend('<span class="fa fa-bar-chart er"></span>');
    $(".event a").prepend('<span class="fa fa-calendar-o er"></span>');
     $(".invest a").prepend('<span class="fa fa-search-plus er"></span>');
     $(".audi a").prepend('<span class="fa fa-headphones er"></span>');
     $(".opinio a").prepend('<span class="fa fa-comments er"></span>');
     $(".pronun a").prepend('<span class="fa fa-bullhorn er"></span>');
     $(".bolet a").prepend('<span class="fa fa-file-text-o er"></span>');
     $(".tve a").prepend('<span class="fa fa-television er"></span>');
     $(".aste a").prepend('<span class="fa fa-check er"></span>');
     $(".aula a").prepend('<span class="fa fa-graduation-cap er"></span>');

     $(".people a").prepend('<span class="fa fa-users er2"></span>');
     $(".investi a").prepend('<span class="fa fa-search er2"></span>');
     $(".public a").prepend('<span class="fa fa-book er2"></span>');

    /*$("#menu-menu-top").each(function(index){
      var tmp = $(this).find("li");
      $(this)
      console.log(index);
    });*/
    var ave = $("#WidgetForm").find("a");
    console.log(ave);

  
    // alert("Hola");
    // $("#widgetDiv").after('<a href="">Mas</a>');
    //$('.slider').bxSlider({ mode: 'fade', auto: true, pause:6000,pager:false});
    $('.slider2').bxSlider({ mode: 'fade', auto: false, pause:9000,controls:false});
    $('.slider').bxSlider({ 
        mode: 'fade', 
        auto: true, 
        pause:6000,
        nextSelector: '#next2', 
        prevSelector: '#prev2',
        pager:false
    });
    $('#commen').bxSlider({ mode: 'fade', auto: false, pause:9000,controls:false});
    $('.tour-galeria').bxSlider({
      pagerCustom: '#peques',
        mode:'fade'
    });

    $('.tool').tooltip();
 $('.fancybox').fancybox({
        type: 'iframe',
        'padding' : 0,  
        'autoSize': false,      
        'width': 750, 
        'height': 420
    });
  $('#eventos').bxSlider({
        mode: 'fade',
      controls:false,      
      auto:true,
      autoHover:true,
      preloadImages:'all',
      adaptiveHeight:true
    });
 //https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/129531784&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true

    $(".fancybox-video").click(function() {
        $.fancybox({
            padding: 0,
            'autoScale'     : false,
            'transitionIn'  : 'none',
            'transitionOut' : 'none',
            'title'         : this.title,
            'width'         : 795,
            'height'        : 447,
            'href'          : this.href.replace(new RegExp("watch.*v=","i"), "v/"),
            'type'          : 'swf',
            'swf'           : {
            'wmode'             : 'transparent',
            'allowfullscreen'   : 'true'
             }

        });
        return false;
    });


  var isMobile={Android:function(){return navigator.userAgent.match(/Android/i)},BlackBerry10:function(){return navigator.userAgent.match(/BB10/i)},BlackBerry:function(){return navigator.userAgent.match(/BlackBerry/i)},iOS:function(){return navigator.userAgent.match(/iPhone|iPad|iPod/i)},iphoneiOS:function(){return navigator.userAgent.match(/iPhone|iPod/i)},Opera:function(){return navigator.userAgent.match(/Opera Mini/i)},Windows:function(){return navigator.userAgent.match(/IEMobile/i)},WindowsTouch:function(){return navigator.userAgent.match(/MSIE/i) &&  navigator.userAgent.match(/Touch/i) },any:function(){return isMobile.Android()||isMobile.BlackBerry10()||isMobile.BlackBerry()||isMobile.iOS()||isMobile.Opera()||isMobile.Windows()||isMobile.WindowsTouch()}}
  //document.write(isMobile.any());
  //alert(isMobile);
  
  $('.dropdown-toggle').dropdownHover().dropdown();
    
    $(document).on('click', '.fhmm .dropdown-menu', function(e) {
      e.stopPropagation()  
    });
    
  
  if(isMobile.any() === null){
    $('.dropdown-toggle').click(function() {
      document.location.replace($(this).attr('href'));
    });
    $('.no-clickeable').click(function(event){
      event.preventDefault();
    });
  }else{
    if(isMobile.Android()||isMobile.BlackBerry10()||isMobile.BlackBerry()||isMobile.Opera()){
      $('.dropdown-submenu>a:first-child').each(function() {
        $(this).removeAttr('href','');
      });
    }
    else if(isMobile.iOS()){
      if($('#isHome').length>0){
        $('.dropdown-submenu>a:first-child').each(function() {
          $(this).removeAttr('href','');
          if(isMobile.iphoneiOS()){
            $(this).click(function(event){
              event.preventDefault();
              $(this).parent().children('.dropdown-menu').toggle();
            });
          }
        });
      }else{
        $('#defaultmenu a').each(function() {
          $(this).click(function(event){
            var attrhref = $(this).attr('href');
            var attrdatatoogle = $(this).attr('data-toggle');
            if (typeof attrhref !== typeof undefined && attrhref !== false) {
              if (typeof attrdatatoogle === typeof undefined || attrdatatoogle === false) {             
                event.preventDefault();
                var hrefvalue = $(this).attr('href');
                setTimeout(function(){window.location = hrefvalue;}, 500);
                //$(this).css('color','#1ea59a');
              }
            }
          });
        });
      }
    }else if(isMobile.Windows()||isMobile.WindowsTouch()){
      $('.dropdown-submenu>a:first-child').each(function() {
        $(this).removeAttr('href','');
        $(this).click(function(event){
          event.preventDefault();
          $(this).parent().children('.dropdown-menu').toggle();
        });
      });
    }
  }

  $('.par').each(function() {
    var elem = $(this);
    setInterval(function() {
        if (elem.css('visibility') == 'hidden') {
            elem.css('visibility', 'visible');
        } else {
            elem.css('visibility', 'hidden');
        }    
    }, 500);
});

  
}