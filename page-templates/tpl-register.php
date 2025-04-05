<?php
/**
 * Template Name: Registration Template
 */

get_header();

$page_restriction = ilm_user_management()->get_page_restriction_details();
$url_redirect = $_SERVER['HTTP_REFERER'] == site_url().'/' ? null : $_SERVER['HTTP_REFERER'];
?>

<div id="ilm-page-contents" class="o-panel o-panel--page-contents">
    <div class="grid-container">
        <div class="grid-x">
            <div class="small-24 cell">
                <?php if ( $page_restriction['allow_access'] ): ?>
                    <div class="s-page-content s-page-content--register">
                        <h2>Register<span class="already-login-text" style="float: right; font-size: 20px;">Already have an account? <a href="<?php echo site_url(); ?>/login">Sign in</a></span></h2>

                        <div class="c-ilm-registration">
                            <div id="ilm-registration-messages-r" class="c-ilm-registration__messages" style="display: none;">
                                Seems like you are already registered. Please login
                            </div>
                            <div id="ilm-form-loader" class="c-ilm-registration__loader">
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

                            <form id="ilm-registration-form" class="c-ilm-registration__form" action="" method="post">
                                <div class="grid-x grid-margin-x">

                                    <div class="cell medium-12 c-ilm-registration__field-wrap">
                                        <div id="par_fname" class="cell medium-24 c-ilm-registration__field-wrap">
                                            <label for="ilm-reg-first-name" class="c-ilm-registration__label">First Name<span>*</span></label>
                                            <div class="c-ilm-registration__field-wrap-inner">
                                                <input type="text" id="ilm-reg-first-name" name="ilm-reg-first-name" class="c-ilm-registration__field" />
                                                <div class="c-ilm-registration__error-message">This field is required</div>
                                            </div>
                                        </div>
                                        <div id="par_lname" class="cell medium-24 c-ilm-registration__field-wrap">
                                            <label for="ilm-reg-last-name" class="c-ilm-registration__label">Last Name<span>*</span></label>
                                            <div class="c-ilm-registration__field-wrap-inner">
                                                <input type="text" id="ilm-reg-last-name" name="ilm-reg-last-name" class="c-ilm-registration__field" />
                                                <div class="c-ilm-registration__error-message">This field is required</div>
                                            </div>
                                        </div>
                                        <div id="par_email" class="cell medium-12 c-ilm-registration__field-wrap">
                                            <label for="ilm-reg-email" class="c-ilm-registration__label">Email Address<span>*</span></label>
                                            <div class="c-ilm-registration__field-wrap-inner">
                                                <input type="text" id="ilm-reg-email" name="ilm-reg-email" class="c-ilm-registration__field" />
                                                <div class="c-ilm-registration__error-message">This field is required</div>
                                            </div>
                                        </div>
                                        <div id="par_password" class="cell medium-24 c-ilm-registration__field-wrap">
                                            <label for="ilm-reg-password" class="c-ilm-registration__label">Password<span>*</span></label>
                                            <div class="c-ilm-registration__field-wrap-inner">
                                                <input type="password" id="ilm-reg-password" name="ilm-reg-password" class="c-ilm-registration__field" />
                                                <div class="c-ilm-registration__error-message">This field is required</div>
                                            </div>
                                        </div>
                                        <div id="par_password_repeat" class="cell medium-24 c-ilm-registration__field-wrap">
                                            <label for="ilm-reg-repeat-password" class="c-ilm-registration__label">Repeat Password<span>*</span></label>
                                            <div class="c-ilm-registration__field-wrap-inner">
                                                <input type="password" id="ilm-reg-repeat-password" name="ilm-reg-repeat-password" class="c-ilm-registration__field" />
                                                <div class="c-ilm-registration__error-message">This field is required</div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="cell medium-12 c-ilm-registration__field-wrap">
                                        <div class="cell small-24 c-ilm-registration__field-wrap">
                                            <br>
                                            <div class="margin-bottom-1">
                                                <h4 class="font-bold margin-bottom-1" style="color: #646464">Opt-In to email notifications</h4>
                                                <div class="c-ilm-registration__field-wrap-inner flex-container">
                                                    <input class="c-ilm-registration__field-type-checkbox"
                                                           type="checkbox"
                                                           name="ilm-emails-opt-in"
                                                           id="ilm-emails-opt-in"
                                                           checked
                                                    />
                                                    <label for="ilm-emails-opt-in" style="margin-top: -0.4rem;">Receive notifications about ILM's programs, services, and materials (e.g. events, updates, videos, audios, and offerings)</label>
                                                </div>
                                            </div>

                                            <h4 class="font-bold margin-0" style="color: #646464">Communities</h4>
                                            <div class="margin-bottom-1">
                                                <small>
                                                    If you would like to receive community specific announcements, please select the region you are a part of (choose one).
                                                </small>
                                            </div>
                                            <div class="margin-bottom-1">
                                                <label class="display-block" style="margin-bottom: 0.5rem">US & Canada</label>
                                                <div class="padding-left-1">
                                                    <div class="c-ilm-registration__field-wrap-inner">
                                                        <input class="c-ilm-registration__field-type-checkbox"
                                                               type="radio"
                                                               name="ilm-correspondence-email"
                                                               id="ilm-correspondence-email-us-cm"
                                                               value="USCanada CentralMountain"
                                                        />
                                                        <label for="ilm-correspondence-email-us-cm">
                                                            Central & Mountain
                                                        </label>
                                                    </div>
                                                    <div class="c-ilm-registration__field-wrap-inner">
                                                        <input class="c-ilm-registration__field-type-checkbox"
                                                               type="radio"
                                                               name="ilm-correspondence-email"
                                                               id="ilm-correspondence-email-us-hp"
                                                               value="USCanada HawaiiPacificRim"
                                                        />
                                                        <label for="ilm-correspondence-email-us-hp">
                                                            Hawaii & Pacific Rim
                                                        </label>
                                                    </div>
                                                    <div class="c-ilm-registration__field-wrap-inner">
                                                        <input class="c-ilm-registration__field-type-checkbox"
                                                               type="radio"
                                                               name="ilm-correspondence-email"
                                                               id="ilm-correspondence-email-us-me"
                                                               value="USCanada MidwestEastern"
                                                        />
                                                        <label for="ilm-correspondence-email-us-me">
                                                            Midwest & Eastern
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="c-ilm-registration__field-wrap-inner" style="margin-bottom: 0.4rem">
                                                <input class="c-ilm-registration__field-type-checkbox"
                                                       type="radio"
                                                       name="ilm-correspondence-email"
                                                       id="ilm-correspondence-email-eu"
                                                       value="Europe"
                                                />
                                                <label for="ilm-correspondence-email-eu">
                                                    Europe
                                                </label>
                                            </div>
                                            <div class="c-ilm-registration__field-wrap-inner margin-bottom-1">
                                                <input class="c-ilm-registration__field-type-checkbox"
                                                       type="radio"
                                                       name="ilm-correspondence-email"
                                                       id="ilm-correspondence-email-as"
                                                       value="Asia"
                                                />
                                                <label for="ilm-correspondence-email-as">
                                                    Asia
                                                </label>
                                            </div>
                                            <!--<a class="c-ilm-registration__correspondence-action js-correspondence-action"
                                               data-correspondence-action="select"
                                               href="#">
                                                Select all
                                            </a>-->
                                        </div>
                                    </div>

                                    <div class="cell small-24 c-ilm-registration__field-wrap">
                                        <h3>Additional Information</h3>
                                    </div>   
                                    
                                    <div class="cell small-24 c-ilm-registration__field-wrap">
                                        <label for="ilm-reg-company" class="c-ilm-registration__label">Company</label>
                                        <div class="c-ilm-registration__field-wrap-inner">
                                            <input type="text" id="ilm-reg-company" name="ilm-reg-company" class="c-ilm-registration__field" />
                                        </div>
                                    </div>
                                    <div class="cell small-24 c-ilm-registration__field-wrap">
                                        <label for="ilm-reg-country" class="c-ilm-registration__label">Country</label>
                                        <div class="c-ilm-registration__field-wrap-inner">
                                            <?php 
                                                global $woocommerce;
                                                $countries_obj = new WC_Countries();
                                                $countries = $countries_obj->__get('countries');
			                                    woocommerce_form_field('ilm-reg-country', array(
                                                        'type' => 'select',
														'default' => 'US',
                                                        'class' => array( 'c-ilm-registration__field' ),
                                                        'placeholder' => __('Enter something'),
                                                        'options' => $countries														
                                                    )
                                                );
                                            ?>
                                            <!-- <div class="c-ilm-registration__error-message">This field is required</div> -->
                                        </div>
                                    </div>
                                    <div class="cell medium-12 c-ilm-registration__field-wrap">
                                        <label for="ilm-reg-address1" class="c-ilm-registration__label">Street Address 1</label>
                                        <div class="c-ilm-registration__field-wrap-inner">
                                            <input type="text" id="ilm-reg-address1" name="ilm-reg-address1" class="c-ilm-registration__field" />
                                            <!-- <div class="c-ilm-registration__error-message">This field is required</div> -->
                                        </div>
                                    </div>
                                    <div class="cell medium-12 c-ilm-registration__field-wrap">
                                        <label for="ilm-reg-address2" class="c-ilm-registration__label">Street Address 2</label>
                                        <div class="c-ilm-registration__field-wrap-inner">
                                            <input type="text" id="ilm-reg-address2" name="ilm-reg-address2" class="c-ilm-registration__field" />
                                        </div>
                                    </div>
                                    <div class="cell medium-24 c-ilm-registration__field-wrap">
                                        <label for="ilm-reg-phone" class="c-ilm-registration__label">Phone Number</label>
                                        <div class="c-ilm-registration__field-wrap-inner">
                                            <input type="text" id="ilm-reg-phone" name="ilm-reg-phone" class="c-ilm-registration__field" />
                                            <!-- <div class="c-ilm-registration__error-message">This field is required</div> -->
                                        </div>
                                    </div>
                                    <div class="cell medium-8 c-ilm-registration__field-wrap">
                                        <label for="ilm-reg-city" class="c-ilm-registration__label">City</label>
                                        <div class="c-ilm-registration__field-wrap-inner">
                                            <input type="text" id="ilm-reg-city" name="ilm-reg-city" class="c-ilm-registration__field" />
                                            <!-- <div class="c-ilm-registration__error-message">This field is required</div> -->
                                        </div>
                                    </div>
                                    <div class="cell medium-8 c-ilm-registration__field-wrap">
                                        <label for="ilm-reg-state" class="c-ilm-registration__label">State</label>
                                        <div class="c-ilm-registration__field-wrap-inner">
                                            <input type="text" id="ilm-reg-state" name="ilm-reg-state" class="c-ilm-registration__field" />
                                            <!-- <div class="c-ilm-registration__error-message">This field is required</div> -->
                                        </div>
                                    </div>
                                    <div class="cell medium-8 c-ilm-registration__field-wrap">
                                        <label for="ilm-reg-zip" class="c-ilm-registration__label">Zip</label>
                                        <div class="c-ilm-registration__field-wrap-inner">
                                            <input type="text" id="ilm-reg-zip" name="ilm-reg-zip" class="c-ilm-registration__field" />
                                            <!-- <div class="c-ilm-registration__error-message">This field is required</div> -->
                                        </div>
                                    </div>
                                    
                                    <div class="cell medium-12 c-ilm-registration__field-wrap">
                                        <div class="g-recaptcha" data-sitekey="<?php echo G_ReCaptchaSiteKey; ?>"></div>
                                    </div>                                    
                                    <div class="cell small-24 c-ilm-registration__field-wrap c-ilm-registration__field-wrap--buttons">
                                        <?php wp_nonce_field( 'ajax-registration-nonce', 'registration-security' ); ?>
                                        <input type="hidden" name="action" value="ilm-registration" />
<!--                                        <input type="hidden" name="url_redirect" value="--><?//= $url_redirect ?><!--">-->
                                        <input type="hidden" id="ilm-reg-url-redirect" name="url_redirect">
                                        <input type="submit" id="ilm-reg--submit" name="ilm-reg--submit" value="Register" class="c-ilm-registration__button" />
                                        <input type="reset" id="ilm-reg--reset" name="ilm-reg--reset" value="Reset" class="c-ilm-registration__button" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php else: ?>
                    <?php ilm_user_management()->print_access_restriction_message( $page_restriction['message'] ); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>