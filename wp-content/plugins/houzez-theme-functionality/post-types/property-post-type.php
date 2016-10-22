<?php
/**************************************************************************
 * Property Custom Post Type
 **************************************************************************/

/*$houzez_local = houzez_get_localization();
print_r($houzez_local);*/

/**
 * Returns the capabilities for the property post type.
 *
 * @since  1.2.0
 * @access public
 * @return array
 */
function houzez_get_property_capabilities() {

    $caps = array(
        // meta caps (don't assign these to roles)
        'edit_post'              => 'edit_property',
        'read_post'              => 'read_property',
        'delete_post'            => 'delete_property',

        // primitive/meta caps
        'create_posts'           => 'create_properties',

        // primitive caps used outside of map_meta_cap()
        'edit_posts'             => 'edit_properties',
       'edit_others_posts'      => 'edit_others_properties',
       'publish_posts'          => 'publish_properties',
       'read_private_posts'     => 'read_private_properties',

        // primitive caps used inside of map_meta_cap()
        'read'                   => 'read',
        'delete_posts'           => 'delete_properties',
        'delete_private_posts'   => 'delete_private_properties',
        'delete_published_posts' => 'delete_published_properties',
        'delete_others_posts'    => 'delete_others_properties',
        'edit_private_posts'     => 'edit_private_properties',
        'edit_published_posts'   => 'edit_published_properties'
    );

    return apply_filters( 'houzez_get_property_capabilities', $caps );
}

if( !function_exists( 'houzez_property_post_type' ) ){
    function houzez_property_post_type(){

      $labels = array(
            'name' => __( 'Properties','houzez'),
            'singular_name' => __( 'Property','houzez' ),
            'add_new' => __('Add New','houzez'),
            'add_new_item' => __('Add New Property','houzez'),
            'edit_item' => __('Edit Property','houzez'),
            'new_item' => __('New Property','houzez'),
            'view_item' => __('View Property','houzez'),
            'search_items' => __('Search Property','houzez'),
            'not_found' =>  __('No Property found','houzez'),
            'not_found_in_trash' => __('No Property found in Trash','houzez'),
            'parent_item_colon' => ''
          );

      $args = array(
            'labels' => $labels,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'query_var' => true,
            'has_archive' => true,
            'capability_type' => 'post',
            'map_meta_cap'    => true,
            //'capabilities'    => houzez_get_property_capabilities(),
            'hierarchical' => true,
            'menu_icon' => 'dashicons-building',
            'menu_position' => 13,
            'can_export' => true,
            'supports' => array('title','editor','thumbnail','revisions','author','page-attributes','excerpt'),
            //'rewrite' => array( 'slug' => 'property' ),

             // The rewrite handles the URL structure.
            'rewrite' => array(
                  'slug'       => houzez_get_property_rewrite_slug(),
                  'with_front' => false,
                  'pages'      => true,
                  'feeds'      => true,
                  'ep_mask'    => EP_PERMALINK,
            ),
      );

      register_post_type('property',$args);

    }
}
add_action('init', 'houzez_property_post_type');


/**************************************************************************
 * Create Property Taxonomies
 **************************************************************************/
if( !function_exists( 'houzez_build_taxonomies' ) ){
    function houzez_build_taxonomies(){

        register_taxonomy('property_type', 'property', array(
                'labels' => array(
                    'name'              => __('Property Type','houzez'),
                    'add_new_item'      => __('Add Property Type','houzez'),
                    'new_item_name'     => __('New Property Type','houzez')
                ),
                'hierarchical'  => true,
                'query_var'     => true,
                'rewrite'       => array( 'slug' => houzez_get_property_type_rewrite_slug() )
            )
        );

        register_taxonomy('property_feature', 'property', array(
                'labels' => array(
                    'name'              => __('Property Features','houzez'),
                    'add_new_item'      => __('Add Property Feature','houzez'),
                    'new_item_name'     => __('New Property Feature','houzez')
                ),
                'hierarchical'  => true,
                'query_var'     => true,
                'rewrite'       => array( 'slug' => houzez_get_property_feature_rewrite_slug() )
            )
        );

        register_taxonomy('property_status', 'property', array(
                'labels' => array(
                    'name'              => __('Property Status','houzez'),
                    'add_new_item'      => __('Add Property Status','houzez'),
                    'new_item_name'     => __('New Property Status','houzez')
                ),
                'hierarchical'  => true,
                'query_var'     => true,
                'rewrite'       => array( 'slug' => houzez_get_property_status_rewrite_slug() )
            )
        );

        register_taxonomy('property_city', 'property', array(
                'labels' => array(
                    'name'              => __('Property City','houzez'),
                    'add_new_item'      => __('Add Property City','houzez'),
                    'new_item_name'     => __('New Property City','houzez')
                ),
                'hierarchical'  => true,
                'query_var'     => true,
                'rewrite'       => array( 'slug' => houzez_get_property_city_rewrite_slug() )
            )
        );

        register_taxonomy('property_area', 'property', array(
                'labels' => array(
                    'name'              => __('Neighborhood','houzez'),
                    'add_new_item'      => __('Add Property Neighborhood','houzez'),
                    'new_item_name'     => __('New Property Neighborhood','houzez')
                ),
                'hierarchical'  => true,
                'query_var'     => true,
                'rewrite'       => array( 'slug' => houzez_get_property_area_rewrite_slug() )
            )
        );

        register_taxonomy('property_state', 'property', array(
                'labels' => array(
                    'name'              => __('County / State','houzez'),
                    'add_new_item'      => __('Add Property County / State','houzez'),
                    'new_item_name'     => __('New Property County / State','houzez')
                ),
                'hierarchical'  => true,
                'query_var'     => true,
                'rewrite'       => array( 'slug' => houzez_get_property_state_rewrite_slug() )
            )
        );

        register_taxonomy('property_label', 'property', array(
                'labels' => array(
                    'name'              => __('Property Labels', 'houzez'),
                    'add_new_item'      => __('Add New Label','houzez'),
                    'new_item_name'     => __('New Property Label','houzez')
                ),
                'hierarchical'  => true,
                'query_var'     => true,
                'rewrite'       => array( 'slug' => 'label' )
            )
        );


    }
}
add_action( 'init', 'houzez_build_taxonomies', 0 );


/**************************************************************************
* Add Custom Columns
**************************************************************************/
if( !function_exists( 'houzez_property_edit_columns' ) ){
    function houzez_property_edit_columns($columns)
    {

        $columns = array(
            "cb" => "<input type=\"checkbox\" />",
            "title" => __( 'Property Title','houzez' ),
            //"thumb" => __( 'Thumbnail','houzez' ),
            "city" => __( 'City','houzez' ),
            "type" => __('Type','houzez'),
            "status" => __('Status','houzez'),
            "price" => __('Price','houzez'),
            "id" => __( 'Property ID','houzez' ),
            "featured" => __( 'Featured','houzez' ),
            "date" => __( 'Publish Time','houzez' )
        );

        return $columns;
    }
}
add_filter("manage_edit-property_columns", "houzez_property_edit_columns");

if( !function_exists( 'houzez_property_custom_columns' ) ){
    function houzez_property_custom_columns($column){
        global $post;
        $houzez_prefix = 'fave_';
        switch ($column)
        {
            case 'thumb':
                if(has_post_thumbnail($post->ID)){
                    ?>
                    <a href="<?php the_permalink(); ?>" target="_blank">
                        <?php the_post_thumbnail( array( 130, 130 ) );?>
                    </a>
                    <?php
                }
                else{
                    _e('No Thumbnail','houzez');
                }
                break;
            case 'id':
                $Prop_id = get_post_meta($post->ID, $houzez_prefix.'property_id',true);
                if(!empty($Prop_id)){
                    echo esc_attr( $Prop_id );
                }
                else{
                    _e('NA','houzez');
                }
                break;
            case 'featured':
                $featured = get_post_meta($post->ID, $houzez_prefix.'featured',true);
                if($featured != 1 ) {
                    _e( 'No', 'houzez' );
                } else {
                    _e( 'Yes', 'houzez' );
                }
                break;
            case 'city':
                echo houzez_admin_taxonomy_terms ( $post->ID, 'property_city', 'property' );
                break;
            case 'address':
                $address = get_post_meta($post->ID, $houzez_prefix.'property_address',true);
                if(!empty($address)){
                    echo esc_attr( $address );
                }
                else{
                    _e('No Address Provided!','houzez');
                }
                break;
            case 'type':
                echo houzez_admin_taxonomy_terms ( $post->ID, 'property_type', 'property' );
                break;
            case 'status':
                echo houzez_admin_taxonomy_terms ( $post->ID, 'property_status', 'property' );
                break;
            case 'price':
                houzez_property_price_admin();
                break;
            case 'bed':
                $bed = get_post_meta($post->ID, $houzez_prefix.'property_bedrooms',true);
                if(!empty($bed)){
                    echo esc_attr( $bed );
                }
                else{
                    _e('NA','houzez');
                }
                break;
            case 'bath':
                $bath = get_post_meta($post->ID, $houzez_prefix.'property_bathrooms',true);
                if(!empty($bath)){
                    echo esc_attr( $bath );
                }
                else{
                    _e('NA','houzez');
                }
                break;
            case 'garage':
                $garage = get_post_meta($post->ID, $houzez_prefix.'property_garage',true);
                if(!empty($garage)){
                    echo esc_attr( $garage );
                }
                else{
                    _e('NA','houzez');
                }
                break;
            case 'features':
                echo get_the_term_list($post->ID,'property-feature', '', ', ','');
                break;
        }
    }
}
add_action("manage_pages_custom_column", "houzez_property_custom_columns");

/*-----------------------------------------------------------------------------------*/
/*	Search support for Property ID on its index page (backend)
/*-----------------------------------------------------------------------------------*/

// Confirm page
function houzez_prop_index(){
    global $pagenow;
    return ( is_admin() && $pagenow == 'edit.php' && isset($_GET['post_type']) && $_GET['post_type'] == 'property' && isset($_GET['s']) );
}

// Join the Post Meta table
function houzez_search_join($join) {
    global $wpdb;
    if ( houzez_prop_index() ) {
        $join .= ' LEFT JOIN ' . $wpdb->postmeta . ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    }
    return $join;
}

// Add the Property ID in search
function houzez_search_where($where) {
    global $wpdb;
    if (houzez_prop_index()) {
        $where = preg_replace(
            "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
            "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_key = 'houzez_property_id') AND (".$wpdb->postmeta.".meta_value LIKE $1)",
            $where );
    }
    return $where;
}

// Group the Properties
function houzez_prop_limits($groupby) {
    global $wpdb;
    if (houzez_prop_index()) { $groupby = "$wpdb->posts.ID"; }
    return $groupby;
}

add_filter('posts_join', 'houzez_search_join' );
add_filter( 'posts_where', 'houzez_search_where' );
add_filter( 'posts_groupby', 'houzez_prop_limits' );

/*-----------------------------------------------------------------------------------*/
/*  Comma separated taxonomy terms with admin side links
/*-----------------------------------------------------------------------------------*/
if( ! function_exists ( 'houzez_admin_taxonomy_terms' ) ) {
    function houzez_admin_taxonomy_terms( $post_id, $taxonomy, $post_type ) {

        $terms = get_the_terms( $post_id, $taxonomy );

        if ( ! empty ( $terms ) ) {
            $out = array();
            /* Loop through each term, linking to the 'edit posts' page for the specific term. */
            foreach ( $terms as $term ) {
                $out[] = sprintf( '<a href="%s">%s</a>',
                    esc_url( add_query_arg( array( 'post_type' => $post_type, $taxonomy => $term->slug ), 'edit.php' ) ),
                    esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, $taxonomy, 'display' ) )
                );
            }
            /* Join the terms, separating them with a comma. */
            return join( ', ', $out );
        }

        return false;
    }
}


/*-----------------------------------------------------------------------------------*/
/*  Property area/neighborhood taxonomy columns
/*-----------------------------------------------------------------------------------*/
if( !function_exists('propertyArea_columns_head') ):
    function propertyArea_columns_head($new_columns) {

        $new_columns = array(
            'cb'            => '<input type="checkbox" />',
            'name'          => __('Name','houzez'),
            'city'          => __('City','houzez'),
            'header_icon'   => '',
            'slug'          => __('Slug','houzez'),
            'posts'         => __('Posts','houzez')
        );


        return $new_columns;
    }
endif;


if( !function_exists('propertyArea_columns_content_taxonomy') ):
    function propertyArea_columns_content_taxonomy($out, $column_name, $term_id) {
        if ($column_name == 'city') {
            $term_meta= get_option( "_houzez_property_area_$term_id");
            print stripslashes( $term_meta['parent_city'] );
        }
    }
endif; // end   ST4_columns_content_taxonomy

add_filter('manage_edit-property_area_columns', 'propertyArea_columns_head');
add_filter('manage_property_area_custom_column','propertyArea_columns_content_taxonomy', 10, 3);

/* ------------------------------------------------------------------------------
* Auto Property ID
/------------------------------------------------------------------------------ */
if( !function_exists('save_property_post_type') ) {
    function save_property_post_type($post_id, $post, $update) {

        if (!is_object($post) || !isset($post->post_type)) {
            return;
        }

        $slug = 'property';
        // If this isn't a 'book' post, don't update it.
        if ($slug != $post->post_type) {
            return;
        }
        $auto_property_id = houzez_option('auto_property_id');

        if( $auto_property_id != 0 ) {
            update_post_meta($post_id, 'fave_property_id', $post_id);
        }

    }

    add_action('save_post', 'save_property_post_type', 10, 3);
}