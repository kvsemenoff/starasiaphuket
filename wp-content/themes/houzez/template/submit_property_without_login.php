<?php
/**
 * Template Name_dep: Submit Property ( without account header button )
 * Created by PhpStorm.
 * User: waqasriaz
 * Date: 06/10/15
 * Time: 3:49 PM
 */
if ( is_user_logged_in() ) {
    wp_redirect( home_url('url') );
}
set_time_limit (600);

global $properties_page, $current_user, $properties_page, $hide_add_prop_fields, $required_fields;

$invalid_nonce = false;
$submitted_successfully = false;
$updated_successfully = false;

$errors = array();

$dashboard_listings = houzez_dashboard_listings();

$hide_add_prop_fields = houzez_option('hide_add_prop_fields');
$required_fields = houzez_option('required_fields');
$sticky_sidebar = houzez_option('sticky_sidebar');



if( isset( $_POST['action'] ) ) {

    if (wp_verify_nonce($_POST['property_header_btn_nonce'], 'submit_property_header_btn')) {

        $new_property = array(
            'post_type'	    =>	'property'
        );

        $allowed_html = array();

        $email = wp_kses( $_POST['user_email'], $allowed_html );
        if( email_exists( $email ) ) {
            $errors[] = esc_html__('This email address is already registered.', 'houzez');
        }

        if( !is_email( $email ) ) {
            $errors[] = esc_html__('Invalid email address.', 'houzez');
        }

        if( empty($errors) ) {
            $username = explode("@", $email);

            $username = $username[0];

            $random_password = wp_generate_password( $length=12, $include_standard_special_chars=false );
            $user_id = wp_create_user( $username, $random_password, $email );
                 
            $user = get_user_by('login', $username );
            if( $user_id ) {

                houzez_update_profile( $user_id );
                houzez_wp_new_user_notification( $user_id, $random_password );
                $user_as_agent = houzez_option('user_as_agent');
                if( $user_as_agent == 'yes' ) {
                    houzez_register_as_agent ( $username, $email, $user_id );
                }

                if( !is_wp_error($user) ) {
                    wp_clear_auth_cookie();
                    wp_set_current_user ( $user->ID );
                    wp_set_auth_cookie  ( $user->ID );

                    apply_filters( 'houzez_submit_listing', $new_property );

                    if ( !empty( $dashboard_listings ) ) {
                        $separator = ( parse_url( $dashboard_listings, PHP_URL_QUERY ) == NULL ) ? '?' : '&';
                        $parameter = ( $updated_successfully ) ? 'property-updated=true' : 'property-added=true';
                        wp_redirect( $dashboard_listings . $separator . $parameter );
                    }
                    exit();
                }

            }

        }
        

    }// end verify nonce
}


get_header(); 

if( is_active_sidebar( 'create-listing-sidebar' ) ) { 
    $content_area = 'col-lg-8 col-md-8 col-sm-12 col-xs-12 list-grid-area container-contentbar';
} else {
    $content_area = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
}
?>

<?php get_template_part( 'template-parts/dashboard-title'); ?>

<div class="row">
    <div class="<?php echo esc_attr( $content_area ); ?>">
        <?php
        if( !empty($errors) ) {
            foreach ($errors as $error ) {
                echo esc_attr( $error );
            }
        }
        if (is_plugin_active('houzez-theme-functionality/houzez-theme-functionality.php')) {
        
                get_template_part('template-parts/property-submit-without-login');
        } else {
            esc_html_e( 'Please install and activate Houzez theme functionality plugin', 'houzez' );
        }
        ?>
    </div>

    <?php if( is_active_sidebar( 'create-listing-sidebar' ) ) { ?>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 container-sidebar <?php if( $sticky_sidebar['create_listing'] != 0 ){ echo 'houzez_sticky'; }?>">
        <aside id="sidebar" class="sidebar-white">
            <?php dynamic_sidebar( 'create-listing-sidebar' ); ?>
        </aside>
    </div>
    <?php } ?>

</div>

<?php get_footer();?>
