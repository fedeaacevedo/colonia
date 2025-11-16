 <?php
/**
 *Template Name: Inicio
 */
get_header(); ?>



<?php // The Query
$the_query = new WP_Query( array( 'post_type' => 'page', 'post_status' => 'publish', 'post_parent' => 0 , 'order' => 'ASC' , 'orderby' => 'menu_order')  );
	// The Loop
	if ( $the_query->have_posts() ) {$count=0;
		while ( $the_query->have_posts() ) { 
			$the_query->the_post(); ?>
		
			<?php if ( $count === 0 ){?>

					<?php include(TEMPLATEPATH .'/page-templates/inscripciones.php'); //LLAMO TEMPLATE ?>


			
			<?php }else if ( $count === 1 ){?>
					<div  id ="<?php echo $post->post_name;?>" class="section section-height">	
						<div class="fade">
						  
						  
						  <?php
							$fields = CFS()->get( 'imagenes_portada' );
							foreach ( $fields as $field ) { ?>
							<div  style="background-image:url('<?php $thumb = wp_get_attachment_image_src( $field['imagen'], 'full' );$url = $thumb['0']; echo $url; ?>');"></div>	
							
							<?php } ?>

						</div>
								
						<div class="marca-portada"> <img src="<?php echo get_template_directory_uri() . '/img/marca-grande.png' ?>" title="Colonia estudiantes"> </div>
					</div>	

				<?php }else if ( $count === 2 ){?>
					<div  id ="<?php echo $post->post_name;?>" class="section ">
						<?php include(TEMPLATEPATH .'/page-templates/la-colonia.php'); //LLAMO TEMPLATE ?>

					</div>
				<?php }else if ( $count === 3 ){?>
					<div  id ="<?php echo $post->post_name;?>" class="section section-min">
						<?php include(TEMPLATEPATH .'/page-templates/actividades.php'); //LLAMO TEMPLATE ?>
					</div>
				<?php }else if ( $count === 4 ){?>
					<div  id ="<?php echo $post->post_name;?>" class="section section-min">
						<?php include(TEMPLATEPATH .'/page-templates/informacion.php'); //LLAMO TEMPLATE ?>
					</div>	
				<?php }else if ( $count === 5 ){?>
					<div  id ="<?php echo $post->post_name;?>" class="section section-min">
						<?php include(TEMPLATEPATH .'/page-templates/tarifas.php'); //LLAMO TEMPLATE ?>
					</div>		
			<?php }else{?>
				<div  id ="<?php echo $post->post_name;?>" class="section section-height">		
					<h2><?php echo the_title(); ?> </h2> 
					<p><?php the_content(); ?></p>
				</div>
			<?php }?>


		
		<?php $count++;}
		/* Restore original Post Data */
		wp_reset_postdata(); } else {
		// no posts found
	} ?>




<?php
get_footer();
