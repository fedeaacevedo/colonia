<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package colonia
 */

?>

	</div><!-- #content -->


<div class="section-min" id="contacto">

	<div id="map"></div>
	
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<img src="<?php echo get_template_directory_uri() . '/img/marca-footer.png'?>">
			<p class="f-datos">
				Calle 462 (Alvear) esquina 28 #1896<br>
				City Bell - Provincia de Buenos Aires.<br>
				+54 (221) 425 7025 - Interno 3 (Secretaría de Deportes)
			</p>	

			<span class="f-derechos">Colonia Estudiantes © 2016. Todos los derechos reservados</span>
		</div><!-- .site-info -->

		<div class="contactanos"> 
			<h2>Dejanos tu consulta</h2>
			<?php echo do_shortcode( '[contact-form-7 id="77" title="Dejanos tu consulta"]' )  ?> 
		</div>
		<div class="proyectar"> <img src="<?php echo get_template_directory_uri() . '/img/proyectar.png' ?>"> </div>
	</footer><!-- #colophon -->
</div>

</div><!-- #page -->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDziEnTw7Mh0wjpwxQhOxnoTScK2Wp0XD0&callback=initMap" async defer></script>
<script type="text/javascript">
function initMap() {
	var mapDiv = document.getElementById('map');
	var map = new google.maps.Map(mapDiv, {
	  center: {lat:-34.8886585, lng:-58.0706085},
	  zoom: 15,
	  scrollwheel: false
	});

//Fincass de Duggan
var contentFincas = '<div id="content">'+									
				  '<h2 class="firstHeading">Country Estudiantes de La Plata</h2>'+
				  '<div class="bodyContent">'+
				  'Calle 462 (Alvear) esquina 28 #1896 <br>City Bell - Provincia de Buenos Aires.' +
				  '</div>'+
				  '</div>';
var infowindowFincas = new google.maps.InfoWindow({ content: contentFincas });
					
markerFincas = new google.maps.Marker({
				map:map,
				animation: google.maps.Animation.DROP,
				position: new google.maps.LatLng(-34.888934,  -58.070648),
				title: 'Country Estudiantes de la Plata',
				//icon: 'http://www.proyectar.com.ar/one-gonnet/wp-content/themes/one-gonnet/img/one-gonnet-marker-solo.png' // null = default icon
				});
				
				infowindowFincas.open(map, markerFincas);

			markerFincas.addListener('click', function() {
				infowindowFincas.open(map, markerFincas);
			});

map.set ('styles', [
  {
    "featureType": "poi.business",
    "elementType": "labels.text",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "poi.sports_complex",
    "elementType": "labels.text",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  }
]);
				
					
}/*Cierre InitMap*/	
</script>

<?php wp_footer(); ?>

</body>
</html>
