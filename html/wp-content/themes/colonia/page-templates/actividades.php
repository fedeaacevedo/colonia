 <?php
/**
 *Template Name: Actividades
 */
?>

	    <div class="fondo-section slide-actividades">
	    <h2><?php echo the_title() ; ?></h2>
	    	<div class="contenido"><p><?php the_content() ; ?></p></div> 
	    </div>
	    <div  class="fondo-fotos">
	    	<div  style="background-image:url('<?php $thumb = wp_get_attachment_image_src( CFS()->get( 'imagen_1' ), 'large' );$url = $thumb['0']; echo $url; ?>');"></div>
	    	<div  style="background-image:url('<?php $thumb = wp_get_attachment_image_src( CFS()->get( 'imagen_2' ), 'large' );$url = $thumb['0']; echo $url; ?>');"></div>	
			<div  style="background-image:url('<?php $thumb = wp_get_attachment_image_src( CFS()->get( 'imagen_3' ), 'large' );$url = $thumb['0']; echo $url; ?>');"></div>
			<div  style="background-image:url('<?php $thumb = wp_get_attachment_image_src( CFS()->get( 'imagen_4' ), 'large' );$url = $thumb['0']; echo $url; ?>');"></div>
			<div  style="background-image:url('<?php $thumb = wp_get_attachment_image_src( CFS()->get( 'imagen_5' ), 'large' );$url = $thumb['0']; echo $url; ?>');"></div>
			<div  style="background-image:url('<?php $thumb = wp_get_attachment_image_src( CFS()->get( 'imagen_6' ), 'large' );$url = $thumb['0']; echo $url; ?>');"></div>					
		</div>

	
