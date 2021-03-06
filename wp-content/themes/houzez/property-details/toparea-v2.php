<?php
/**
 * Property Top Area V2
 * Created by PhpStorm.
 * User: waqasriaz
 * Date: 08/01/16
 * Time: 2:46 PM
 */
global $ls_en_ru, $ls_cats, $type_to_icon;
$ls_add = get_post_meta( get_the_ID(), 'additional_features', true );
$ls_property = &$ls_add;
$ls_beds = get_post_meta( get_the_ID(), 'fave_property_bedrooms', true );
$ls_terms = get_the_terms(get_the_id(), $ls_cats['type']);
$ls_title_temp = 'нет названия';
$ls_stars = 0;
$ls_date_check = '';
foreach ($ls_add as $ls_add_value) {
    if($ls_add_value['fave_additional_feature_title'] == $ls_en_ru["name2"])
        $ls_title_second = esc_attr( $ls_add_value['fave_additional_feature_value'] );
    if($ls_add_value['fave_additional_feature_title'] == $ls_en_ru["stars"])
        $ls_stars = (int)esc_attr( $ls_add_value['fave_additional_feature_value'] );
    if($ls_add_value['fave_additional_feature_title'] == $ls_en_ru["date_check"])
        $ls_date_check = esc_attr( $ls_add_value['fave_additional_feature_value'] );
}


global $post, $property_map, $property_streetView, $prop_address, $prop_agent_email;

$featured_img = houzez_get_image_url('houzez-imageSize1170_738');
if( !empty($featured_img) ) {
    $featured_img = $featured_img[0];
} else {
    $featured_img = '';
}

$agent_display_option = get_post_meta( get_the_ID(), 'fave_agent_display_option', true );
$prop_agent_display = get_post_meta( get_the_ID(), 'fave_agents', true );
$prop_agent_num = $agent_num_call = $prop_agent_email = '';

if( $prop_agent_display != '-1' && $agent_display_option == 'agent_info' ) {
    $prop_agent_id = get_post_meta( get_the_ID(), 'fave_agents', true );
    $prop_agent_email = get_post_meta( $prop_agent_id, 'fave_agent_email', true );

} elseif ( $agent_display_option == 'author_info' ) {
    $prop_agent_email = get_the_author_meta( 'email' );
}
$print_property_button = houzez_option('print_property_button');

$gallery_view = $map_view = $street_view = '';
$prop_default_active_tab = houzez_option('prop_default_active_tab');
if( $prop_default_active_tab == "image_gallery" ) {
    $gallery_view = 'in active';
} elseif( $prop_default_active_tab == "map_view" ) {
    $map_view = 'in active';
} elseif( $prop_default_active_tab == "street_view" ) {
    $street_view = 'in active';
} else {
    $gallery_view = 'in active';
}

?>
<section class="detail-top detail-top-full">
    <div class="detail-media">
    <div class="tab-content">

        <div id="gallery" class="tab-pane fade <?php echo esc_attr( $gallery_view );?>" style="background-image: url('<?php echo esc_url( $featured_img ); ?>')">
            <a href="#" class="popup-trigger popup-trigger-v2"></a>
            <div class="media-tabs-up">
                <div class="container">
                    <!--<span class="label label-primary"><?php /*echo houzez_taxonomy_simple('property_status'); */?></span>-->
                    <span class="label-wrap">
                        <?php if( houzez_taxonomy_simple('property_status') ) { ?>
                            <span class="label label-primary label-status-<?php echo intval(houzez_get_taxonomy_id('property_status')); ?>"><?php echo houzez_taxonomy_simple('property_status'); ?></span>
                        <?php } ?>
                        <?php if( houzez_taxonomy_simple('property_label') ) { ?>
                            <span class="label label-danger label-color-<?php echo intval(houzez_get_taxonomy_id('property_label')); ?>"><?php echo houzez_taxonomy_simple('property_label'); ?></span>
                        <?php } ?>
                    </span>
                </div>
            </div>
            <div class="media-detail-down">
                <div class="container">
                    <div class="header-detail table-list">
                        <div class="header-left table-cell">

                            <?php get_template_part('inc/breadcrumb'); ?>
                            <?php
                            $ls_title = esc_attr( get_the_title() );
                            $ls_title = $ls_title?$ls_title:$ls_title_second;
                            ?>
                            <div class="table-cell"><h1 class="az-title1"><?=$ls_title?></h1></div>

                            <div class="table-cell">
                                <ul class="actions">
                                    <li class="share-btn"><?php get_template_part( 'template-parts/share' ); ?></li>
                                    <li class="fvrt-btn"><?php get_template_part( 'template-parts/favorite' ); ?></li>
                                    <?php if( $print_property_button != 0 ) { ?>
                                        <li class="print-btn">
                                            <span id="houzez-print" data-propid="<?php esc_attr_e( $post->ID );?>"><i class="fa fa-print"></i></span>
                                        </li>
                                    <?php } ?>
                                    <?php foreach ($ls_terms as $ls_terms_value): ?>
                                        <li>
                                          <span data-toggle="tooltip" data-placement="top" data-original-title="<?php echo $ls_terms_value->name; ?>"><?= $type_to_icon[$ls_terms_value->name] ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <address class="property-address"><?php foreach ($ls_property as $ls_property_value): ?>
                                <?php if($ls_property_value['fave_additional_feature_title'] == $ls_en_ru['code_id']): ?>
                                  <span class="az-text1">
                                    <?=$ls_property_value['fave_additional_feature_value']?>
                                  </span>
                                <?php elseif($ls_property_value['fave_additional_feature_title'] == $ls_en_ru['area']): ?>
                                  <span class="az-text1">
                                    <?=$ls_property_value['fave_additional_feature_value']?>
                                  </span class="az-text1">
                                <?php endif; ?>
                              <?php endforeach; ?>
                            </address>
                            <?php
                            if( 0/*!empty( $prop_address )*/) {
                                echo '<address class="property-address">'.esc_attr( $prop_address ).'</address>';
                            } ?>
                        </div>
                        <div class="header-right table-cell"><?php echo houzez_listing_price_v1(); ?></div>
                    </div>
                </div>
            </div>

        </div>

        <?php if( $property_map != 0 ) { ?>
            <div id="singlePropertyMap" class="tab-pane fade <?php echo esc_attr( $map_view );?>">
                <div class="mapPlaceholder">
                    <div class="loader-ripple">
                        <div></div>
                        <div></div>
                    </div>
                </div>
            </div>
            <?php wp_nonce_field('houzez_map_ajax_nonce', 'securityHouzezMap', true); ?>
            <input type="hidden" name="prop_id" id="prop_id" value="<?php echo esc_attr($post->ID); ?>" />
        <?php } ?>

        <?php if( $property_streetView != 'hide' ) { ?>
            <div id="street-map" class="tab-pane fade <?php echo esc_attr( $street_view );?>"></div>
        <?php } ?>

    </div>
    <div class="media-tabs-up">
        <div class="container">
            <?php get_template_part( 'property-details/media', 'tabs' ); ?>
        </div>
    </div>
    </div>
</section>
