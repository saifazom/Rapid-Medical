<div class="s-page-content s-page-content--login-form">
	<div class="c-ilm-registration">
		<h2>Login</h2>
		<div id="ilm-login-messages" class="c-ilm-registration__messages c-ilm-registration__messages--login-form" style="display: none;"></div>
		
		<div id="ilm-login-form-loader" class="c-ilm-registration__loader">
			<div class="c-ilm-registration__loader-inner">
				<div id="ilm-register-loader" class="lds-ellipsis">
					<div></div>
					<div></div>
					<div></div>
					<div></div>
				</div>
				<div class="c-ilm-registration__loading-message"></div>
			</div>
		</div>

		<form id="ilm-login-form" class="c-ilm-registration__form" action="" method="post">
		   <!-- <input type="button" id="cancel_button" value="X"> -->
			<div class="grid-x grid-margin-x">
				<div class="cell c-ilm-registration__field-wrap">
					<label for="ilm-login-user" class="c-ilm-registration__label">Email Address</label>
					<div class="c-ilm-registration__field-wrap-inner">
						<input type="text" id="ilm-login-user" name="ilm-login-user" class="c-ilm-registration__field" placeholder="youremail@domain.com" />
						<div class="c-ilm-registration__error-message">This field is required</div>
					</div>
				</div>
				<div class="cell c-ilm-registration__field-wrap">
					<label for="ilm-login-password" class="c-ilm-registration__label">Password</label>
					<div class="c-ilm-registration__field-wrap-inner">
						<input type="password" id="ilm-login-password" name="ilm-login-password" class="c-ilm-registration__field" />
						<div class="c-ilm-registration__error-message">This field is required</div>
					</div>
				</div>
				
				<div class="cell medium-24 c-ilm-registration__field-wrap">
					<div class="c-ilm-registration__field-wrap-inner">
						<input class="c-ilm-registration__field-type-checkbox" id="ilm-login-remember" type="checkbox" name="ilm-login-remember" value="1">
						<label for="ilm-login-remember">Remember me</label>
					</div>
				</div>
				
				<div class="cell medium-24 c-ilm-registration__field-wrap">
					<div class="c-ilm-registration__field-wrap-inner">
					   <div class="c-ilm-registration__link">Not registered yet? <a href="<?php echo site_url(); ?>/register">Register</a> | <a href="<?php echo site_url(); ?>/reset-password">Forgot Password?</a></div>
					</div>
				</div>
				
				<div class="cell small-24 c-ilm-registration__field-wrap c-ilm-registration__field-wrap--buttons">
					<?php wp_nonce_field( 'ajax-login-nonce', 'login-security' ); ?>
					<input type="hidden" name="action" value="ilm-login" />
					<?php global $wp; ?>
					<input type="hidden" name="current-url" value="<?php echo home_url( $wp->request ); ?>" />
					<input type="submit" id="ilm-login--submit" name="ilm-login--submit" value="Login" class="c-ilm-registration__button" />
				</div>
			</div>
		</form>
	</div>
</div>