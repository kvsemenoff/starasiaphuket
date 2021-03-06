<?php
if( !function_exists('houzez_property_by_ids') ) {
    function houzez_property_by_ids($atts, $content = null)
    {

        extract(shortcode_atts(array(
            'property_ids' => ''
        ), $atts));

        ob_start();

        $ids_array = explode(',', $property_ids);

        $args = array(
            'post_type' => 'property',
            'post__in' => $ids_array,
            'post_status' => 'publish'
        );

        //do the query
        $the_query = New WP_Query($args);
        ?>

        <div id="property-item-module" class="houzez-module property-item-module">
            <div class="row grid-row">

                <?php
                if ($the_query->have_posts()) :
                    while ($the_query->have_posts()) : $the_query->the_post();
                        echo '<div class="col-sm-4">';
                        get_template_part('template-parts/property-for-listing-vc');
                        echo '</div>';
                    endwhile;
                    wp_reset_postdata();
                else:
                    get_template_part('template-parts/property', 'none');
                endif;
                ?>
            </div>
            <!-- end container-content -->
        </div>

        <?php
        $result = ob_get_contents();
        ob_end_clean();
        return $result;

    }

    add_shortcode('houzez-prop-by-ids', 'houzez_property_by_ids');
}
?>
