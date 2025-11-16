 <?php
/**
 *Template Name: Tarifas */
?>

<div class="tarifas">

	<div class="title">
	    <h2><?php echo the_title() ; ?></h2>
	    <h3><?php the_content() ; ?></h3> 
	</div>    
	<div class="botonera-tarifas">
		<a href="javascript:void();" title="socios" class="cambiarSocios current-item" id="btnTarifa-0" >Socios<i class="fa fa-angle-down" aria-hidden="true"></i></a>
		<a href="javascript:void();" title="no socios" class="cambiarSocios" id="btnTarifa-1" >No socios<i class="fa fa-angle-down" aria-hidden="true"></i></a>
	</div>


	<!-- CHILDREN -->
	<?php $countTarifas = 0; $queryTarifas = new WP_Query( array( 'post_parent' => $post->ID, 'post_type' => 'page', 'post_status' => 'publish', 'order' => 'ASC', 'orderby' => 'menu_order') );
   	while ( $queryTarifas->have_posts() ) {  $queryTarifas->the_post(); ?>
		<div class="formulario-tarifas  <?php if( $countTarifas === 0 ){ echo 'current-tarifa'; } ?>" id="tarifa-<?php echo $countTarifas; ?>">
			<h2>Tarifas (<?php echo the_title();?>)</h2>	
			<h3><?php the_content();?></h3>


			<?php $fields = CFS()->get( 'mes' ); foreach ( $fields as $field ) { ?>
				   <div class="ta-table">
					  <div class="ta-row">
					    <div class="ta-cell titulo-mes"><?php echo $field['title']; ?></div>
					    <div class="ta-cell categorias-precios">Colonia</div>
					    <div class="ta-cell categorias-precios">Comedor</div>
					    <div class="ta-cell categorias-precios">Transporte</div>
					    <div class="ta-cell categorias-precios">Matr&iacute;cula</div>
					    <div class="ta-cell categorias-precios">Total S/MAT</div>
					</div>

					<?php foreach ( $field['item'] as $field2 ) { ?> 
						<div class="ta-row row-tipos">
							<div class="ta-cell titulo-precios"><?php echo $field2['title']; ?></div>
						    <div class="ta-cell"><span>Colonia: </span><?php echo $field2['colonia_precio']; ?></div>
						    <div class="ta-cell"><span>Comedor: </span><?php echo $field2['comedor_precio']; ?></div>
						    <div class="ta-cell"><span>Transporte: </span><?php echo $field2['transporte_precio']; ?></div>
						    <div class="ta-cell"><span>Matr&iacute;cula: </span><?php echo $field2['matricula_precio']; ?></div>
						    <div class="ta-cell"><span>Total: </span><?php echo $field2['total']; ?></div>
						</div>
					<?php }?>				  

					</div>
					<span class="ta-matricula"><?php echo $field['mes_matricula'];?></span>
				<?php } ?>

				<span class="ta-comentarios"><?php echo CFS()->get( 'comentarios' );?>	</span>				

		</div>	
	<?php $countTarifas++; }wp_reset_postdata();	?><!-- //CHILDREN --> 



</div>
	    