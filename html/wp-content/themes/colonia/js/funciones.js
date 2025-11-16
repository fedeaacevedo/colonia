$(document).ready(function(){

/*Carousel Inicio*/
$('.fade').slick({
  dots: true,
  infinite: true,
  speed: 500,
  fade: true,
  cssEase: 'linear',
  arrows: true,

  nextArrow: '<buton class="slick-arrow slick-next" type="button"></buton>',
  prevArrow: '<buton class="slick-arrow slick-prev" type="button"></buton>',

});
   

/*MENU RESPONSIVE*/
$('.menu-toggle').click(function(){
    $('.main-navigation').toggleClass('toggled');
    $('.site-header').toggleClass('toggled');
    $('.inscripciones').removeClass('oculto');
});


$('.menu a').click(function(){
    $('.main-navigation').removeClass('toggled');
    $('.site-header').removeClass('toggled');
    $('.inscripciones').removeClass('oculto');
});


/*INSCRIPCIONES*/
$('.abrir-inscripcion').click(function(){
    $('.inscripciones').toggleClass('oculto');
});

/*CAMBIAR TARIFAS*/
$('.cambiarSocios').click(function(){
    $('.cambiarSocios').removeClass('current-item');
    $(this).addClass('current-item');

    var idBtn = $(this).attr('id');
    var divBtn = idBtn.split('-')[1];
    $('.formulario-tarifas').removeClass( 'current-tarifa');
    $('#tarifa-' + divBtn ).addClass( 'current-tarifa' );
});

/*CAMBIAR BTN INFO*/
$('.cambiar-btn-info').click(function(){
    $('.cambiar-btn-info').removeClass('current-item');
    $(this).addClass('current-item');

    var idPost = $(this).attr('id');
    var divPost = idPost.split('-')[1];
    $('.flechita').removeClass( 'cajita-0 cajita-1 cajita-2');
    $('.flechita').addClass( 'cajita-' + divPost );
});

/*CAMBIAR SLIDER*/
$('.cambiar-slide').click(function(){
    $('.cambiar-slide').removeClass('current-item');
    $(this).addClass('current-item');

    var id = $(this).attr('id');
    var dividir = id.split('-')[1] * 100;
    var posLeft =  dividir * -1;
//    alert(posLeft);
    $('.contenedor-sliders').css( {'left' : posLeft + '%' });

});


/*One page*/
$('.section-height').css('height' , $(window).innerHeight() );
$('.section-min').css('min-height' , $(window).innerHeight() );
$('.section-height-pop').css('height' , $(window).innerHeight() - 70);
var bottomOculto = $(window).innerHeight() - 128;
$('.inscripciones').css( { 'bottom' : - bottomOculto } );

if( $(window).innerWidth() > 900){
  $('#la-colonia').css('min-height' , $(window).innerHeight() );
  $('.contenedor-sliders').css('min-height' , $(window).innerHeight() );
}
$('.contenedor-sliders').css('height' , $('.fondo-white').innerHeight());
$('.fondo-fotos').css('height' , $('#actividades').innerHeight());
$('#map').css( 'height' , $('#contacto').innerHeight()/2 );


/*--------------------------------------------------------------
# Calcular ubicacion del scroll para cambiar el header
--------------------------------------------------------------*/

 //Calcular donde esta el scroll
    $(window).scroll(function() {
       if($(window).scrollTop() >= $( '#la-colonia').offset().top - 100 )  { 
          $('.site-header').removeClass('portada');
          $('.site-branding').removeClass('portada');
          $('.main-navigation').removeClass('portada');
        }else {
          $('.site-header').addClass('portada');
          $('.site-branding').addClass('portada');
          $('.main-navigation').addClass('portada');

        }   
    }); 

/*--------------------------------------------------------------
# Scroll Nice
--------------------------------------------------------------*/
$(function() {
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});
 


$.ajaxSetup({cache:false});
        $(".post-link").click(function(){
            var post_link = $(this).attr("href");
 
            $("#single-post-container").html("<div class='loading-galeria' ><i class='fa fa-spinner fa-pulse fa-3x fa-fw'></i></div>");
            $("#single-post-container").load(post_link);
        return false;
});




}); 


/*--------------------------------------------------------------
## Load 
--------------------------------------------------------------*/
$(window).load(function() {

  /*--------------------------------------------------------------
    ## Loader 
    --------------------------------------------------------------*/
    $("#status").fadeOut(); // will first fade out the loading animation
    $("#preloader").delay(1000).fadeOut("slow"); // will fade out the white DIV that covers the website.

  $( "#btn-0" ).trigger( "click" );

});// ##window--load


  
/*--------------------------------------------------------------
## Resize Pantalla - Video
--------------------------------------------------------------*/

//FUNCION ESPERAR QUE TERMINE DE RESIZEAR LA PANTALLA
    var waitForFinalEvent = (function () {
    var timers = {};
    return function (callback, ms, uniqueId) {
            if (!uniqueId) {
                uniqueId = "Don't call this twice without a uniqueId";
            }
            if (timers[uniqueId]) {
                clearTimeout (timers[uniqueId]);
            }
            timers[uniqueId] = setTimeout(callback, ms);
        };
})();


 $(window).resize(function () {
    waitForFinalEvent(function(){
    //EVENTOS EN RESIZE
    $('.section-height').css('height' , $(window).innerHeight() );
    $('.section-min').css('min-height' , $(window).innerHeight() );
    $('.section-height-pop').css('height' , $(window).innerHeight() - 70);
    var bottomOculto = $(window).innerHeight() - 128;
    $('.inscripciones').css( { 'bottom' : -bottomOculto } );

    if( $(window).innerWidth() > 900){
      $('#la-colonia').css('min-height' , $(window).innerHeight() );
      $('.contenedor-sliders').css('min-height' , $(window).innerHeight() );
    }
    $('.contenedor-sliders').css('height' , $('#la-colonia').innerHeight());
    $('.fondo-fotos').css('height' , $('#actividades').innerHeight());
    $('#map').css( 'height' , $('#contacto').innerHeight()/2 );
    //    videoFondoResize();
    }, 500,'resize');

});

