<?php
 
    $post = get_post($_POST['id']);
 
?>
   

    <?php while (have_posts()) : the_post(); ?>
 
    	<div class="caja-info" id="caja-<?php echo $countPost; ?>">
					

			<h2><?php echo the_title() ; ?> <h2>
			<div class="contenido"> <p><?php the_content();?></p>	</div>


		</div>			

    <?php endwhile;?> 
