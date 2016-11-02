<?php
/**
 * Created by PhpStorm.
 * User: waqasriaz
 * Date: 17/12/15
 * Time: 4:47 PM
 */
global $ls_en_ru, $ls_cats, $type_to_icon;
$ls_property = get_post_meta(get_the_id(), 'additional_features', true);
$ls_terms = get_the_terms(get_the_id(), $ls_cats['type']);
// print_r($ls_terms->);
// print_r($ls_property);

global $post, $prop_images, $houzez_local, $current_page_template, $taxonomy_name;
?>
<ul class="list-unstyled actions pull-right">
  <?php foreach ($ls_property as $ls_property_value): ?>
    <?php if($ls_property_value['fave_additional_feature_title'] == $ls_en_ru['code_id']): ?>
      <li>
        <?=$ls_property_value['fave_additional_feature_value']?>
      </li>
    <?php elseif($ls_property_value['fave_additional_feature_title'] == $ls_en_ru['area']): ?>
      <li>
        <?=$ls_property_value['fave_additional_feature_value']?>
      </li>
    <?php endif; ?>
  <?php endforeach; ?>
  
</ul>
<div class="clearfix"></div>
<ul class="list-unstyled actions pull-right">
    <!-- <li> -->
      <?php foreach ($ls_terms as $ls_terms_value): ?>
        <li>
          <span data-toggle="tooltip" data-placement="top" data-original-title="<?php echo $ls_terms_value->name; ?>"><?= $type_to_icon[$ls_terms_value->name] ?></span>
        </li>
      <?php endforeach; ?>
    <!-- </li> -->
    <li>
        <span data-placement="top" data-toggle="tooltip" data-original-title="<?php echo $houzez_local['favorite']; ?>">
            <?php get_template_part( 'template-parts/favorite' ); ?>
        </span>
    </li>

    <!-- <li class="share-btn">
        <?php get_template_part( 'template-parts/share' ); ?>
    </li> -->
    <li>
        <span data-toggle="tooltip" data-placement="top" title="(<?php echo count( $prop_images ); ?>) <?php echo $houzez_local['photos']; ?>">
            <i class="fa fa-camera"></i>
            <!--<span class="count">(<?php /*echo count( $prop_images ); */?>) </span>-->
        </span>
    </li>
    <?php if( $current_page_template == 'template/property-listing-template.php' ||
              $current_page_template == 'template/property-listing-fullwidth.php' ||
              $current_page_template == 'template/template-search.php' ||
              $taxonomy_name == 'property_status' ||
              $taxonomy_name == 'property_type' ||
              $taxonomy_name == 'property_area' ||
              $taxonomy_name == 'property_city' ||
              $taxonomy_name == 'property_feature' ||
              $taxonomy_name == 'property_state'
    ) {?>
    <li>

        <span id="compare-link-<?php esc_attr_e( $post->ID ); ?>" class="compare-property" data-propid="<?php esc_attr_e( $post->ID ); ?>" data-toggle="tooltip" data-placement="top" title="<?php esc_html_e( 'Compare', 'houzez' ); ?>">
            <i class="fa fa-plus"></i>
        </span>
    </li>
    <?php } ?>
</ul>
