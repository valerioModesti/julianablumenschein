<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

echo wc_get_stock_html( $product ); // WPCS: XSS ok.

if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>
	<div id="cartnotice" style="position: absolute; bottom: 5rem; width: auto; height: auto; background: rgba(0,0,0,0.7); display: none; border-radius: 10px; padding: 0 1rem;">
		<p>Added to the Cart!</p>
	</div>
	<form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
	<!--<form class="cart" action="javascript:cartNotice();" method="post" enctype='multipart/form-data'> TEST -->
		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		<?php
		do_action( 'woocommerce_before_add_to_cart_quantity' );

		woocommerce_quantity_input(
			array(
				'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
				'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
				'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
			)
		);

		do_action( 'woocommerce_after_add_to_cart_quantity' );
		?>

		<div class="cta-wrap">   
			<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="btn cta single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
		</div>
		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>


<script>
	function cartNotice(){
		document.querySelector('#cartnotice').style.display= "block";
		setTimeout(function() {
			document.querySelector('#cartnotice').style.display= "none";
		}, 1000);
		// test
		//alert('Added to the Cart!');	
	};
</script>

<!--
<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>
-->
<!--
<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', '#' ) ); ?>
-->
<!--
<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', 'javascript:cartNotice();' ) ); ?>
-->
<!--
<?php echo add_filter( 'woocommerce_add_to_cart_form_action', '__return_empty_string' ); ?>
-->