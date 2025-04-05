<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;
	
if (isset($_SESSION['msgRequired']) && isset($_SESSION['msgRequired'])=='accinfo') {
	echo '<div id="ilm-registration-messages" class="c-ilm-registration__messages type-warning" style="display: block;"><p>Please provide information that is missing from your user profile, so we can contact you.</p></div>';
	unset($_SESSION['msgRequired']);
}

do_action( 'woocommerce_before_edit_account_form' ); 

?>


<form class="woocommerce-EditAccountForm edit-account" action="" method="post" <?php do_action( 'woocommerce_edit_account_form_tag' ); ?> >
	<input type="hidden" value="<?=site_url();?>" name="site_url" id="site_url" />
	<?php do_action( 'woocommerce_edit_account_form_start' ); ?>
	<fieldset>
	
    <legend class="c-event__meta-label">Profile Information</legend>
	<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
		<label for="account_first_name"><?php esc_html_e( 'First name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
		<input type="text" class="<?php if($user->first_name == '') {echo 'focus-text-2';}?> woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" autocomplete="given-name" value="<?php echo esc_attr( $user->first_name ); ?>" />
	</p>
	<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
		<label for="account_last_name"><?php esc_html_e( 'Last name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
		<input type="text" class="<?php if($user->last_name == '') {echo 'focus-text-2';}?> woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" autocomplete="family-name" value="<?php echo esc_attr( $user->last_name ); ?>" />
	</p>
	<div class="clear"></div>
    
	<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
		<label for="account_email"><?php esc_html_e( 'Username and Primary Email address (Primary)', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
		<input type="email" class="<?php if($user->user_email == '') {echo 'focus-text-2';}?> woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" autocomplete="email" value="<?php echo esc_attr( $user->user_email ); ?>" />
        <a class="ahref my-account-add-address-link" onclick="javascript: jQuery('#frmemailaddress1').toggle();">Add new email address </a>

        <div class="email_container" id="frmemailaddress1" style="display: none">
              <div class="email_container_text">
                  <input placeholder="enter email address" type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="txtemail" id="txtemail" value="" />
              </div>
              <div class="email_container_button">
                  <input type="button" class="woocommerce-Button button cls_primary_emailaddress" data-action="add_email" value="Add Email" />
              </div>
        </div>
        <span style="clear:both; display: block; margin: 1rem 0" id='messages2'> </span>
		<div id="lstemailaddress" style="width:100%;"></div>
        <input type="hidden" id="ilm-user-id" value="<?= get_current_user_id() ?>">
		<div style="width:100%;">
			<?php
			$user_meta_additonal_emails = get_user_meta(get_current_user_id(), 'user_additional_emailaddress', true);
			$emails = array_filter(array_map(function ($item) {
				return ($item !== NULL && $item !== '') ? trim($item) : [];
			}, explode(',', $user_meta_additonal_emails)));
			?>
            <fieldset id="user-additional-emails" style="<?= $emails ?: 'display: none'?>">
                <legend><label><b>Additional Email Addresses</b></label></legend>
                <div id="user-additional-emails-items">
                    <?php foreach ($emails as $email): ?>
                        <div class="my-account-additional-address-wrap">
                            <span>- <?= $email ?></span>
                            <?php if (get_user_by('id', get_current_user_id())->user_email != $email) : ?>
                            <a class="cls_primary_emailaddress js-set-default-email"
                               data-email="<?= $email ?>"
                               title="Set as Primary Email Address"
                            ><i class="fa fa-check-square" style="color:#0C0"> </i></a>
                            <a class="cls_primary_emailaddress js-remove-email"
                               data-email="<?= $email ?>"
                               title="Remove Email Addres"
                            ><i class="fa fa-times"> </i></a>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <br />
                <label class='ahref'>
                    <i>
                        <i class='fa fa-info-circle'></i> By clicking on
                        <i class='fa fa-check-square' style='color:#0C0'></i>
                        you can make that email address as primary and that can also be used for next logins.
                    </i>
                </label>
                <hr />
            </fieldset>
        </div>
	</p>
    <div class="clear"></div>
    
    </fieldset>

	<div class="clear"></div>

	<?php do_action( 'woocommerce_edit_account_form' ); ?>

	<p>
		<?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
		<button type="submit" class="woocommerce-Button button" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>"><?php esc_html_e( 'Save changes', 'woocommerce' ); ?></button>
		<input type="hidden" name="action" value="save_account_details" />
	</p>

	<?php do_action( 'woocommerce_edit_account_form_end' ); ?>
</form>

<?php do_action( 'woocommerce_after_edit_account_form' ); ?>