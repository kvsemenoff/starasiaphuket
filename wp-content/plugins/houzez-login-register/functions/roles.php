<?php
/**
 * Role Management
 *
 * Created by PhpStorm.
 * User: waqasriaz
 * Date: 08/08/16
 * Time: 9:38 PM
 */
/*function add_roles_on_plugin_activation() {
   add_role( 'custom_role', 'Custom Subscriber', array( 'read' => true, 'level_0' => true ) );
}
register_activation_hook( __FILE__, 'add_roles_on_plugin_activation' );*/

// remove_role( 'houzez_agent' );
remove_role( 'houzez_agent' );
remove_role( 'houzez_buyer' );

add_role(
    'houzez_buyer',
    __( 'Houzez Buyer' ),
    array(
        'read'         => true,  // true allows this capability
        'edit_posts'   => false,
        'delete_posts' => false, // Use false to explicitly deny
    )
);

add_role(
    'houzez_agent',
    __( 'Houzez Seller( Agent )' ),
    array(
        'read'                      => true,  // true allows this capability
        'edit_posts'                => true,
        'delete_posts'              => true, // Use false to explicitly deny
        'read_property'             => true,
        'edit_property'             => true,
        'create_properties'         => true,
        'edit_properties'           => true,
        'edit_published_properties'    => true,
        'publish_properties'        => false,
        'delete_published_properties'   => true,
        'read_testimonial'             => true,
        'edit_testimonial'             => true,
        'create_testimonials'         => true,
        'edit_testimonials'           => true,
        'edit_published_testimonials'    => true,
        'publish_testimonials'        => false,
        'delete_published_testimonials'   => true
    )
);