<?php
/**
 * Template Name: Compare Properties
 *
 * Created by PhpStorm.
 * User: waqasriaz
 * Date: 02/08/16
 * Time: 11:51 PM
 */
?>

<?php get_header(); ?>
<?php get_template_part( 'template-parts/page', 'title' ); ?>

<?php
$prop_ids = $_SESSION[ 'houzez_compare_properties' ];
$counter        =   0;
$properties     =   array();

if( !empty($prop_ids) ) {

$args = array(
    'post_type' => 'property',
    'post__in' => $prop_ids,
    'post_status' => 'publish'
);

//do the query
$the_query = New WP_Query($args);

$basic_info = $prop_address = $prop_city = $prop_state = $prop_zipcode = $prop_additional_features = $prop_country = $prop_beds = $prop_baths = $property_id = $prop_size = $prop_garage = $prop_garage_size = $prop_year = '';
if( $the_query->have_posts() ): while( $the_query->have_posts() ): $the_query->the_post();

    $address = get_post_meta( get_the_ID(), 'fave_property_address', true );
    $zipcode = get_post_meta( get_the_ID(), 'fave_property_zip', true );
    $country = get_post_meta( get_the_ID(), 'fave_property_country', true );
    $city = houzez_taxonomy_simple('property_city');
    $state = houzez_taxonomy_simple('property_state');
    $neighbourhood = houzez_taxonomy_simple('property_area');
    $country = get_post_meta( get_the_ID(), 'fave_property_country', true );

    $prop_id = get_post_meta( get_the_ID(), 'fave_property_id', true );
    $property_size = get_post_meta( get_the_ID(), 'fave_property_size', true );
    $bedrooms = get_post_meta( get_the_ID(), 'fave_property_bedrooms', true );
    $bathrooms = get_post_meta( get_the_ID(), 'fave_property_bathrooms', true );
    $year_built = get_post_meta( get_the_ID(), 'fave_property_year', true );
    $garage = get_post_meta( get_the_ID(), 'fave_property_garage', true );
    $garage_size = get_post_meta( get_the_ID(), 'fave_property_garage_size', true );

    $basic_info .= '
            <th>
                <div class="compare-media">
                    <div class="compare-thumb">
                        <a href="'.get_permalink().'">
                            '.get_the_post_thumbnail( get_the_id(), 'houzez-image570_340', array( 'class' => '' ) ).'
                        </a>
                    </div>
                    <div class="compare-caption">
                        <h3 class="compare-title">'.get_the_title().'</h3>
                        <p class="compare-price">'.houzez_listing_price().'</p>
                        <p class="compare-type"><strong>'.esc_html__('Type', 'houzez').':</strong> '.houzez_taxonomy_simple('property_type').'</p>
                    </div>
                </div>
            </th>';

    if( !empty($address) ) {
        $prop_address .= '<td>' . $address . '</td>';
    } else {
        $prop_address .= '<td>---</td>';
    }
    if( !empty($city) ) {
        $prop_city .= '<td>' . $city . '</td>';
    } else {
        $prop_city .= '<td>---</td>';
    }

    if( !empty($state) ) {
        $prop_state .= '<td>' . $state . '</td>';
    } else {
        $prop_state .= '<td>---</td>';
    }

    if( !empty($zipcode) ) {
        $prop_zipcode .= '<td>' . $zipcode . '</td>';
    } else {
        $prop_zipcode .= '<td>---</td>';
    }

    if( !empty( $country ) ) {
        $prop_country .= '<td>' . houzez_country_code_to_country($country) . '</td>';
    }

    if( !empty($prop_id) ) {
        $property_id .= '<td>' . $prop_id . '</td>';
    } else {
        $property_id .= '<td>---</td>';
    }

    if( !empty($bedrooms) ) {
        $prop_beds .= '<td>' . $bedrooms . '</td>';
    } else {
        $prop_beds .= '<td>---</td>';
    }

    if( !empty($bathrooms) ) {
        $prop_baths .= '<td>' . $bathrooms . '</td>';
    } else {
        $prop_baths .= '<td>---</td>';
    }

    if( !empty($property_size) ) {
        $prop_size .= '<td>' . houzez_property_size( 'after' ) . '</td>';
    } else {
        $prop_size .= '<td>---</td>';
    }

    if( !empty($year_built) ) {
        $prop_year .= '<td>' . $year_built . '</td>';
    } else {
        $prop_year .= '<td>---</td>';
    }

    if( !empty($garage) ) {
        $prop_garage .= '<td>' . $garage . '</td>';
    } else {
        $prop_garage .= '<td>---</td>';
    }

    if( !empty($garage_size) ) {
        $prop_garage_size .= '<td>' . $garage_size . '</td>';
    } else {
        $prop_garage_size .= '<td>---</td>';
    }

    $counter++;

endwhile; endif;
?>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div id="content-area">
            <div class="compare-table-wrap">
                <table class="compare-table table-striped">
                    <thead>
                    <tr>
                        <th class="table-title"></th>
                        <?php echo $basic_info; ?>
                    </tr>
                    </thead>
                    <tbody>

                    <?php if( !empty($prop_address) ) { ?>
                    <tr>
                        <td class="table-title"><?php esc_html_e( 'Address', 'houzez' ); ?></td>
                        <?php echo $prop_address; ?>
                    </tr>
                    <?php } ?>

                    <?php if( !empty($prop_city) ) { ?>
                    <tr>
                        <td class="table-title"><?php esc_html_e( 'City', 'houzez' ); ?></td>
                        <?php echo $prop_city; ?>
                    </tr>
                    <?php } ?>

                    <?php if( !empty($prop_state) ) { ?>
                    <tr>
                        <td class="table-title"><?php esc_html_e( 'State/County', 'houzez' ); ?></td>
                        <?php echo $prop_state; ?>
                    </tr>
                    <?php } ?>

                    <?php if( !empty($prop_zipcode) ) { ?>
                    <tr>
                        <td class="table-title"><?php esc_html_e( 'Zip/Post Code', 'houzez' ); ?></td>
                        <?php echo $prop_zipcode; ?>
                    </tr>
                    <?php } ?>

                    <?php if( !empty($prop_country) ) { ?>
                        <tr>
                            <td class="table-title"><?php esc_html_e( 'Country', 'houzez' ); ?></td>
                            <?php echo $prop_country; ?>
                        </tr>
                    <?php } ?>

                    <?php if( !empty($prop_size) ) { ?>
                        <tr>
                            <td class="table-title"><?php esc_html_e( 'Property Size', 'houzez' ); ?></td>
                            <?php echo $prop_size; ?>
                        </tr>
                    <?php } ?>

                    <?php if( !empty($property_id) ) { ?>
                        <tr>
                            <td class="table-title"><?php esc_html_e( 'Property ID', 'houzez' ); ?></td>
                            <?php echo $property_id; ?>
                        </tr>
                    <?php } ?>

                    <?php if( !empty($prop_beds) ) { ?>
                        <tr>
                            <td class="table-title"><?php esc_html_e( 'Bedrooms', 'houzez' ); ?></td>
                            <?php echo $prop_beds; ?>
                        </tr>
                    <?php } ?>

                    <?php if( !empty($prop_baths) ) { ?>
                        <tr>
                            <td class="table-title"><?php esc_html_e( 'Bathrooms', 'houzez' ); ?></td>
                            <?php echo $prop_baths; ?>
                        </tr>
                    <?php } ?>

                    <?php if( !empty($prop_garage) ) { ?>
                        <tr>
                            <td class="table-title"><?php esc_html_e( 'Garage', 'houzez' ); ?></td>
                            <?php echo $prop_garage; ?>
                        </tr>
                    <?php } ?>

                    <?php if( !empty($prop_garage_size) ) { ?>
                        <tr>
                            <td class="table-title"><?php esc_html_e( 'Garage Size', 'houzez' ); ?></td>
                            <?php echo $prop_garage_size; ?>
                        </tr>
                    <?php } ?>

                    <?php if( !empty($prop_year) ) { ?>
                        <tr>
                            <td class="table-title"><?php esc_html_e( 'Year Built', 'houzez' ); ?></td>
                            <?php echo $prop_year; ?>
                        </tr>
                    <?php } ?>


                    <!--Additional Details-->
                    <!--<tr class="tr-head">
                        <td class="table-title"><?php /*esc_html_e( 'Additional details', 'houzez' ); */?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>-->

                    <?php
                    /*foreach( $prop_ids as $pids ) {
                        $additional_features = get_post_meta( $pids, 'additional_features', true );

                        foreach( $additional_features as $ad_del ) {
                           echo esc_attr( $ad_del['fave_additional_feature_title'] ).' '.esc_attr( $ad_del['fave_additional_feature_value'] );
                        }
                    }*/
                    ?>

                    <!--Features-->
                    <!--<tr class="tr-head">
                        <td class="table-title"><?php /*esc_html_e( 'Features', 'houzez' ); */?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td class="table-title">Air Conditioning</td>
                        <td><div class="feature-mark mark-yes"><i class="fa fa-check"></i></div></td>
                        <td><div class="feature-mark mark-no"><i class="fa fa-remove"></i></div></td>
                        <td><div class="feature-mark mark-yes"><i class="fa fa-check"></i></div></td>
                        <td><div class="feature-mark mark-no"><i class="fa fa-remove"></i></div></td>
                    </tr>-->


                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

<?php } // End session not empty if ?>

<?php get_footer(); ?>
