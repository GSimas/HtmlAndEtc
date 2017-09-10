<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout
if ( ! $checkout->enable_signup && ! $checkout->enable_guest_checkout && ! is_user_logged_in() ) {
	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', '3dprinting' ) );
	return;
}
$class = "col-md-6";
if ( is_user_logged_in() || 'no' === get_option( 'woocommerce_enable_checkout_login_reminder' ) ) {
	$class="col-md-12";
}
?>
<div class="login-form-and-total clearfix">
	<div class="<?php echo esc_attr($class)?>">
		<div class="zo-shipping-totals">
			<?php woocommerce_checkout_login_form(); ?>
		</div>
	</div>
	<div class="<?php echo esc_attr($class)?>">
		<div class="zo-shipping-totals">

			<?php
			woocommerce_cart_totals(); ?>
		</div>
	</div>
</div>
<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">


	<?php if ( sizeof( $checkout->checkout_fields ) > 0 ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

		<div class="clearfix" id="customer_details">
			<div class="col-md-6">
				<div class="zo-shipping-totals">
				<?php do_action( 'woocommerce_checkout_billing' ); ?>
				</div>
			</div>

			<div class="col-md-6">
				<div class="zo-shipping-totals">
				<?php do_action( 'woocommerce_checkout_shipping' ); ?>
				</div>
			</div>
		</div>

		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

	<?php endif; ?>
	<div class="col-md-12">
	<div class="zo-shipping-totals">
	<h2 id="order_review_heading"><?php _e( 'Payment', '3dprinting' ); ?></h2>
	<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

	<div id="order_review" class="woocommerce-checkout-review-order">
		<?php do_action( 'woocommerce_checkout_order_review' ); ?>
	</div>

	<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
	</div>
	</div>
</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
