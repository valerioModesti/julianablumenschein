<div id="shop">
<!-- content-shop -->
	<div class="section-content centered">
		
		<?php
		$args = array(
			'post_type' => 'product',
		);
		$loop = new WP_Query($args);
		if ($loop->have_posts()) {
		?>
		<h2>Shop</h2>
		<div class="woocommerce">
		<?php
		while ( $loop->have_posts() ) : 
			$loop->the_post();
			?>

			<!--<div class="single-product" data-product-page-preselected-id="0">-->
			<div class="single-product">
				<?php
				wc_get_template_part( 'content', 'single-product' );
				//wc_get_template('../single-product.php');
				//get_template_part( 'template-parts/content', get_post_type() );
				?>
			</div>
		<?php
		endwhile;
			} else {
				echo __( 'No products found' );
			}
		wp_reset_postdata();
		?>
		</div>
	</div>

	<script>
		const singleProducts = document.querySelectorAll('.single-product');
		if (singleProducts.length > 1) {
			productsSlider.setup({
				target: document.querySelector('.woocommerce'),
				singleProducts: singleProducts,
			});
		}
	</script>

</div>