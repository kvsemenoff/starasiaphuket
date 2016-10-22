<?php
/**
 * Template Name: Payment Page
 * Created by PhpStorm.
 * User: waqasriaz
 * Date: 06/09/16
 * Time: 3:27 PM
 */
$selected_package_id = isset( $_GET['selected_package'] ) ? $_GET['selected_package'] : '';
$property_id = isset( $_GET['prop-id'] ) ? $_GET['prop-id'] : '';
if( empty( $selected_package_id ) && empty( $property_id ) ) {
    wp_redirect( home_url() );
}
set_time_limit (600);

get_header();
global $current_user;

wp_get_current_user();
$user_id                 = $current_user->ID;
$user_pack_id            = get_the_author_meta( 'package_id' , $user_id );
$user_package_activation = get_the_author_meta( 'package_activation' , $user_id );
$user_registered         = get_the_author_meta( 'user_registered' , $user_id );

$is_membership = 0;
$paid_submission_type = esc_html ( houzez_option('enable_paid_submission','') );
$membership_currency = houzez_option( 'currency_paid_submission' );
$currency_symbol = houzez_option( 'currency_symbol' );
$where_currency = houzez_option( 'currency_position' );
$enable_wireTransfer = houzez_option('enable_wireTransfer');
$enable_paypal = houzez_option('enable_paypal');
$enable_stripe = houzez_option('enable_stripe');
$enable_paid_submission = houzez_option('enable_paid_submission');
$packages_page_link = houzez_get_template_link('template/template-packages.php');
$stripe_processor_link = houzez_get_template_link('template/template-stripe-charge.php');

?>
    <div class="membership-page-top">
        <?php get_template_part('template-parts/create-listing-top'); ?>
    </div>

    <div class="membership-content-area">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 container-contentbar">
                <div class="membership-content">
                    <form method="post" id="houzez_payment_form" action="<?php echo $stripe_processor_link; ?>">
                        <!--<div class="info-title">
                            <h2 class="info-title-left"> Account Information </h2>
                            <p class="already-account pull-right"> Already have an account? <a href="#"><strong>Login here</strong></a></p>
                        </div>
                        <div class="info-detail">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="first_name">First Name *</label>
                                        <input type="text" id="first_name" class="form-control" placeholder="Enter your first name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="last_name"> Last Name * </label>
                                        <input type="text" id="last_name" class="form-control" placeholder="Enter your last name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email_address"> Email Address * </label>
                                        <input type="email" id="email_address" class="form-control" placeholder="Enter your email address">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password"> Password * </label>
                                        <input type="password" id="password" class="form-control" placeholder="Choose a password">
                                    </div>
                                </div>
                            </div>
                        </div>-->

                        <div class="info-title">
                            <h2 class="info-title-left"> Payment Method </h2>
                        </div>
                        <?php
                        if( $enable_paid_submission == 'membership' ) {
                            get_template_part('template-parts/membership/payment-methods');
                        } else if ( $enable_paid_submission == 'per_listing' ) {
                            get_template_part('template-parts/per-listing/payment-methods');
                        }
                        ?>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-md-offset-0 col-sm-offset-3 container-sidebar">
                <aside id="sidebar">
                    <div class="payment-side-block">
                       <?php
                       if( $enable_paid_submission == 'membership' ) {
                           get_template_part('template-parts/membership/price');
                       } else if ( $enable_paid_submission == 'per_listing' ) {
                           get_template_part('template-parts/per-listing/price');
                       }
                       ?>
                    </div>
                    <!--<div class="payment-side-block">
                        <h3 class="side-block-title"> Need help? </h3>
                        <a href="#" class="btn btn-primary btn-block">Contact us</a>
                    </div>-->
                </aside>
            </div>
        </div>
    </div>

<?php get_footer(); ?>