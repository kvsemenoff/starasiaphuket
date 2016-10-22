<?php

function houzez_get_agent_capabilities() {

    $caps = array(
        // meta caps (don't assign these to roles)
        'edit_post'              => 'edit_agent',
        'read_post'              => 'read_agent',
        'delete_post'            => 'delete_agent',

        // primitive/meta caps
        'create_posts'           => 'create_agents',

        // primitive caps used outside of map_meta_cap()
        'edit_posts'             => 'edit_agents',
       'edit_others_posts'      => 'edit_others_agents',
       'publish_posts'          => 'publish_agents',
       'read_private_posts'     => 'read_private_agents',

        // primitive caps used inside of map_meta_cap()
        'read'                   => 'read',
        'delete_posts'           => 'delete_agents',
        'delete_private_posts'   => 'delete_private_agents',
        'delete_published_posts' => 'delete_published_agents',
        'delete_others_posts'    => 'delete_others_agents',
        'edit_private_posts'     => 'edit_private_agents',
        'edit_published_posts'   => 'edit_published_agents'
    );

    return apply_filters( 'houzez_get_agent_capabilities', $caps );
}

if( !function_exists( 'houzez_agent_post_type' ) ){
    function houzez_agent_post_type(){
        $labels = array(
            'name' => __( 'Agents','houzez'),
            'singular_name' => __( 'Agent','houzez' ),
            'add_new' => __('Add New','houzez'),
            'add_new_item' => __('Add New Agent','houzez'),
            'edit_item' => __('Edit Agent','houzez'),
            'new_item' => __('New Agent','houzez'),
            'view_item' => __('View Agent','houzez'),
            'search_items' => __('Search Agent','houzez'),
            'not_found' =>  __('No Agent found','houzez'),
            'not_found_in_trash' => __('No Agent found in Trash','houzez'),
            'parent_item_colon' => ''
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'exclude_from_search' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'query_var' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            //'capabilities'    => houzez_get_agent_capabilities(),
            'menu_icon' => 'dashicons-businessman',
            'menu_position' => 15,
            'supports' => array('title','editor', 'thumbnail', 'page-attributes','revisions'),
            'rewrite' => array( 'slug' => __('agent', 'houzez') )
        );

        register_post_type('houzez_agent',$args);
    }
}
add_action( 'init', 'houzez_agent_post_type' );

/* ------------------------------------------------------------------------------
* Update agent user associated info when agent updated
/------------------------------------------------------------------------------ */
if( !function_exists('save_agent_meta') ) {
    function save_agent_meta($post_id, $post, $update) {

        if (!is_object($post) || !isset($post->post_type)) {
            return;
        }

        $slug = 'houzez_agent';
        // If this isn't a 'book' post, don't update it.
        if ($slug != $post->post_type) {
            return;
        }

        if (!isset($_POST['fave_agent_email'])) {
            return;
        }

        $user_as_agent = houzez_option('user_as_agent');

        if ('yes' == esc_html($user_as_agent)) {
            $allowed_html = array();
            $user_id = get_post_meta( $post_id, 'houzez_user_meta_id', true );
            $email = wp_kses($_POST['fave_agent_email'], $allowed_html);
            $fave_agent_des = wp_kses($_POST['fave_agent_des'], $allowed_html);
            $fave_agent_position = wp_kses($_POST['fave_agent_position'], $allowed_html);
            $fave_agent_company = wp_kses($_POST['fave_agent_company'], $allowed_html);
            $fave_agent_mobile = wp_kses($_POST['fave_agent_mobile'], $allowed_html);
            $fave_agent_office_num = wp_kses($_POST['fave_agent_office_num'], $allowed_html);
            $fave_agent_fax = wp_kses($_POST['fave_agent_fax'], $allowed_html);
            $fave_agent_skype = wp_kses($_POST['fave_agent_skype'], $allowed_html);
            $fave_agent_website = wp_kses($_POST['fave_agent_website'], $allowed_html);
            $fave_agent_facebook = wp_kses($_POST['fave_agent_facebook'], $allowed_html);
            $fave_agent_twitter = wp_kses($_POST['fave_agent_twitter'], $allowed_html);
            $fave_agent_linkedin = wp_kses($_POST['fave_agent_linkedin'], $allowed_html);
            $fave_agent_googleplus = wp_kses($_POST['fave_agent_googleplus'], $allowed_html);
            $fave_agent_youtube = wp_kses($_POST['fave_agent_youtube'], $allowed_html);
            $fave_agent_instagram = wp_kses($_POST['fave_agent_instagram'], $allowed_html);
            $fave_agent_pinterest = wp_kses($_POST['fave_agent_pinterest'], $allowed_html);
            $fave_agent_vimeo = wp_kses($_POST['fave_agent_vimeo'], $allowed_html);
            $image_id = get_post_thumbnail_id($post_id);
            $full_img = wp_get_attachment_image_src($image_id, 'houzez-image350_350');


            update_user_meta( $user_id, 'aim', '/'.$full_img[0].'/') ;
            update_user_meta( $user_id, 'fave_author_phone' , $fave_agent_office_num) ;
            update_user_meta( $user_id, 'fave_author_fax' , $fave_agent_fax) ;
            update_user_meta( $user_id, 'fave_author_mobile' , $fave_agent_mobile) ;
            update_user_meta( $user_id, 'description' , $fave_agent_des) ;
            update_user_meta( $user_id, 'fave_author_skype' , $fave_agent_skype) ;
            update_user_meta( $user_id, 'fave_author_title', $fave_agent_position) ;
            update_user_meta( $user_id, 'fave_author_company', $fave_agent_company) ;
            update_user_meta( $user_id, 'fave_author_custom_picture', $full_img[0]) ;
            update_user_meta( $user_id, 'fave_author_facebook', $fave_agent_facebook) ;
            update_user_meta( $user_id, 'fave_author_twitter', $fave_agent_twitter) ;
            update_user_meta( $user_id, 'fave_author_linkedin', $fave_agent_linkedin) ;
            update_user_meta( $user_id, 'fave_author_vimeo', $fave_agent_vimeo) ;
            update_user_meta( $user_id, 'fave_author_googleplus', $fave_agent_googleplus) ;
            update_user_meta( $user_id, 'fave_author_youtube', $fave_agent_youtube) ;
            update_user_meta( $user_id, 'fave_author_pinterest', $fave_agent_pinterest) ;
            update_user_meta( $user_id, 'fave_author_instagram', $fave_agent_instagram) ;
            update_user_meta( $user_id, 'url', $fave_agent_website) ;

            $new_user_id = email_exists($email);
            if ($new_user_id) {

            } else {
                $args = array(
                    'ID' => $user_id,
                    'user_email' => $email
                );
                wp_update_user($args);
            }
        }//end if
    }

    add_action('save_post', 'save_agent_meta', 10, 3);
}
?>