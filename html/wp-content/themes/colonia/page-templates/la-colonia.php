 <?php
/**
 *Template Name: La colonia 
 */
?>
 

		<div class="botonera-slider">
			
		<!--	<?php $childrenID = 0; $children = wp_list_pages( 'title_li=&child_of='.$post->ID.'&echo=0' ); if ( $children) : ?>
				<?php echo $children; ?> 
			<?php $childrenID++; endif; ?> -->


		<a href="javascript:void();" class="cambiar-slide current-item" id="btnSlide-0">Objetivos</a>
		<a href="javascript:void();" class="cambiar-slide" id="btnSlide-1">Estructura y organizaci&oacute;n</a>
		<a href="javascript:void();" class="cambiar-slide" id="btnSlide-2">Modalidades</a>


		</div> 

				<div class="contenedor-sliders">

				<!-- CHILDREN -->
				<?php $slide = 0; $query2 = new WP_Query( array(  'post_parent' => $post->ID, 'post_type' => 'page', 'post_status' => 'publish', 'order' => 'ASC', 'orderby' => 'menu_order') );
    	    		while ( $query2->have_posts() ) {  $query2->the_post(); ?>
				 	
    	    	<div class="slide">
    	    	<div class="slider-img" style="background-image:url('<?php the_post_thumbnail_url('full'); ?>');"></div> 
    	    		<div class="fondo-white">
    	    		<h2><?php echo the_title() ; ?></h2>
    	    		<div class="contenido"><p><?php the_content() ; ?></p></div> 
    	    		</div>
    	    	</div>

				<?php $slide++; }wp_reset_postdata();	?><!-- //CHILDREN -->   

				</div> 