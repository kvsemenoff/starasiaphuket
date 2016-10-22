<?php
/**
 * Template Name: User Dashboard Invoices
 * Created by PhpStorm.
 * User: waqasriaz
 * Date: 11/09/16
 * Time: 11:00 PM
 */
if ( !is_user_logged_in() ) {
    wp_redirect(  home_url() );
}

global $current_user;

wp_get_current_user();
$userID         = $current_user->ID;
$user_login     = $current_user->user_login;

get_header();
?>

<?php get_template_part( 'template-parts/dashboard-title'); ?>

<div class="user-dashboard-full">
    <?php get_template_part( 'template-parts/dashboard', 'menu' ); ?>

    <div class="profile-top">
        <div class="profile-top-left">
            <h2 class="title"><?php the_title(); ?></h2>
        </div>
    </div>
    <?php
    global $wp_query, $paged;
    if ( is_front_page()  ) {
        $paged = (get_query_var('page')) ? get_query_var('page') : 1;
    }

    ob_start();

    $invoices_args = array(
        'post_type' => 'houzez_invoice',
        'posts_per_page' => '-1',
        'meta_query' => array(
            array(
                'key' => 'HOUZEZ_invoice_buyer',
                'value' => $userID,
                'compare' => '='
            )
        ),
        'paged' => $paged
    );

    $wp_query = new WP_Query( $invoices_args );
    $total = 0;
    if ( $wp_query->have_posts() ) :
        while ( $wp_query->have_posts() ) : $wp_query->the_post();

            $fave_meta = houzez_get_invoice_meta( get_the_ID() );
            get_template_part('template-parts/invoices');

            $total += $fave_meta['invoice_item_price'];

        endwhile; endif;

    $invoices_content = ob_get_contents();
    ob_end_clean();
    wp_reset_postdata();
    ?>
    <div class="profile-area-content">
        <div class="invoice-area">
            <div class="area-title">
                <h2 class="title-left"><?php esc_html_e('Search Invoices', 'houzez'); ?></h2>
                <div class="title-right"><?php esc_html_e( 'Total Invoices:', 'houzez' );?> <span id="invoices_total_price"><?php echo houzez_get_invoice_price($total); ?></span></div>
            </div>
            <div class="invoice-form">
                <form>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group ">
                                <label for="startDate"><?php esc_html_e('Start date', 'houzez'); ?></label>
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="startDate" class="input_date form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="endDate"><?php esc_html_e('End date', 'houzez'); ?></label>
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" id="endDate" class="input_date form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="invoice_type"><?php esc_html_e('Type', 'houzez'); ?></label>
                                <select class="selectpicker" id="invoice_type" data-live-search="false" data-live-search-style="begins">
                                    <option value=""><?php esc_html_e( 'Any', 'houzez' ); ?></option>
                                    <option value="Listing"><?php esc_html_e( 'Listing', 'houzez' ); ?></option>
                                    <option value="package"><?php esc_html_e( 'package', 'houzez' ); ?></option>
                                    <option value="Listing with Featured"><?php esc_html_e( 'Listing with Featured', 'houzez' ); ?></option>
                                    <option value="Upgrade to Featured"><?php esc_html_e( 'Upgrade to Featured', 'houzez' ); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="invoice_status"><?php esc_html_e( 'Status', 'houzez' ); ?></label>
                                <select class="selectpicker" id="invoice_status" data-live-search="false" data-live-search-style="begins">
                                    <option value=""><?php esc_html_e( 'Any', 'houzez' ); ?></option>
                                    <option value="1"><?php esc_html_e( 'Paid', 'houzez' ); ?></option>
                                    <option value="0"><?php esc_html_e( 'Not Paid', 'houzez' ); ?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="invoice-list">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th><?php esc_html_e( 'Order', 'houzez' ); ?></th>
                        <th><?php esc_html_e( 'Date', 'houzez' ); ?></th>
                        <th><?php esc_html_e( 'Status', 'houzez' ); ?></th>
                        <th><?php esc_html_e( 'Total', 'houzez' ); ?></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="invoices_content">
                        <?php echo $invoices_content; ?>
                    </tbody>
                </table>

            </div>
        </div>

        <hr>

        <!--start Pagination-->
        <?php houzez_pagination( $wp_query->max_num_pages, $range = 2 ); ?>
        <!--start Pagination-->
    </div>
</div>
<?php get_footer(); ?>
