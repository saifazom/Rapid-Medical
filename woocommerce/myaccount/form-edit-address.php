<?php
/**
 * Edit address form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-address.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

$page_title = ( 'billing' === $load_address ) ? esc_html__( 'Billing address', 'woocommerce' ) : esc_html__( 'Shipping address', 'woocommerce' );

if (isset($_SESSION['msgRequired']) && isset($_SESSION['msgRequired'])=='billing') {
	echo '<div id="ilm-registration-messages" class="c-ilm-registration__messages type-warning" style="display: block;"><p>Please update your billing address in your user profile, so we can contact you.</p></div>';
	unset($_SESSION['msgRequired']);
}
do_action( 'woocommerce_before_edit_account_address_form' ); ?>

<?php if ( ! $load_address ) : ?>
	<?php  wc_get_template( 'myaccount/my-address.php' ); ?>
<?php else : ?>
<style type="text/css">
 .focus-text .input-text { 
	border:1px solid red;
	background-color: lightyellow;
}

 .focus-text .woocommerce-input-wrapper select{ 
	border:1px solid red;
	background-color: lightyellow;
}

</style>
	 <form method="post">
	 <?php $user = wp_get_current_user(); // echo '<pre>'; print_r($user); ?>

		<h3><?php echo apply_filters( 'woocommerce_my_account_edit_address_title', $page_title, $load_address ); ?></h3><?php // @codingStandardsIgnoreLine ?>

		<div class="woocommerce-address-fields">
			<?php do_action( "woocommerce_before_edit_address_form_{$load_address}" ); ?>

			<div class="woocommerce-address-fields__field-wrapper">
				<?php 
				foreach ( $address as $key => $field ) {
					//echo "<pre>"; print_r($field);
					$strTemp = ''; $field['class'][1] = '';
					
		    if (!isset($_POST['action']) && empty($_POST['action']))  {
					
					switch ($key)
						{
							case 'billing_first_name':
							case 'shipping_first_name':
								if ($field['value']=='') {
									$strTemp = $user->first_name; 
									$field['class'][1] = 'focus-text';								
								}
							break;
	
							case 'billing_last_name':
							case 'shipping_last_name':
								if ($field['value']=='') {
									$strTemp = $user->last_name; 
									$field['class'][1] = 'focus-text';								
								}
							break;
	
							case 'billing_email':
							case 'shipping_email':
								if ($field['value']=='') {
									$strTemp = $user->user_email; 
									$field['class'][1] = 'focus-text';								
								}
							break;
	
							case 'shipping_address_1':
							case 'shipping_phone':
							case 'shipping_postcode':
							case 'shipping_state':
							case 'shipping_city':
							
							case 'billing_address_1':
							case 'billing_phone':
							case 'billing_postcode':
							case 'billing_state':
							case 'billing_city':
								if ($field['value'] == '') {
									$field['class'][] = 'focus-text';								
								}
							break;
							
							default:
							   // $field['class'][1] = '';
						
						} 
					
					} elseif (isset($_POST['action']) && $_POST['action']!='') {					
						// unset($field['class'][1]);
						switch ($key){
							case 'shipping_email':
							case 'shipping_last_name':	
							case 'shipping_first_name':
							case 'shipping_address_1':
							case 'shipping_phone':
							case 'shipping_postcode':
							case 'shipping_state':
							case 'shipping_city':
							
							case 'billing_email':
							case 'billing_last_name':	
							case 'billing_first_name':
							case 'billing_address_1':
							case 'billing_phone':
							case 'billing_postcode':
							case 'billing_state':
							case 'billing_city':
								if ($_POST[$key] == '' && $field['class'][1] == ''){
									$field['class'][1] = 'focus-text';
								}else{
									$field['class'][1] = '';
								}
							break;
							
							default:
							   $field['class'][1] = '';
						}
					}
					
					if ($key == 'billing_country' || $key == 'shipping_country'){
						woocommerce_form_field( $key, $field, wc_get_post_data_by_key($key, (($field['value']=='') ? 'US'  : $field['value']) ));	
					}else{
						woocommerce_form_field( $key, $field, wc_get_post_data_by_key($key, (($field['value']=='') ? $strTemp  : $field['value']) ));	
					}
				}
				?>
			</div>

			<?php do_action( "woocommerce_after_edit_address_form_{$load_address}" ); ?>

			<p>
				<button type="submit" class="button" name="save_address" value="<?php esc_attr_e( 'Save address', 'woocommerce' ); ?>"><?php esc_html_e( 'Save address', 'woocommerce' ); ?></button>
				<?php wp_nonce_field( 'woocommerce-edit_address', 'woocommerce-edit-address-nonce' ); ?>
				<input type="hidden" name="action" value="edit_address" />
			</p>
		</div>

	</form>

<?php endif; ?>

<?php do_action( 'woocommerce_after_edit_account_address_form' ); ?>
