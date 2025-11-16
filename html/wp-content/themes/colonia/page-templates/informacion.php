 <?php
/**
 *Template Name: Informacion
 */
?>

	    <div class="fondo-section">
	    <h2><?php echo the_title() ; ?></h2>
	    	<div class="contenido"><p><?php the_content() ; ?></p></div> 
	    </div>

	    <div class="fondo-informacion">


	    <div class="botonera-informacion">	
	    	<img class="flechita cajita-0" src="<?php echo get_template_directory_uri() . '/img/punta-flecha.png'?>">
	    	<?php
			// The Query
			$the_query_post = new WP_Query( array(  'post_type' => 'post', 'post_status' => 'publish', 'order' => 'ASC', 'orderby' => 'menu_order') );

			$countPost = 0;
			// The Loop
			if ( $the_query_post->have_posts() ) { while ( $the_query_post->have_posts() ) { $the_query_post->the_post(); ?>
					<!--<a href="javascript:void();" class="cambiar-btn-info" id="btn-<?php echo $countPost; ?>"> --> 
						<a class="post-link cambiar-btn-info" rel="<?php the_ID(); ?>" href="<?php the_permalink(); ?>" id="btn-<?php echo $countPost; ?>" ><img src="<?php the_post_thumbnail_url('full'); ?>" title="icono"></a>
				<?php $countPost++;}
				/* Restore original Post Data */
				 wp_reset_postdata();
			} else { } ?>
 		</div>


 	<div id="single-post-container"></div>

	    </div>

	
