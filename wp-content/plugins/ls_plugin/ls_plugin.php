<?php
/*
Plugin Name: Ajax puller
Plugin URI:
Description: Plugin pulls content from a database and adds it to the db via ajax request
Version: 1.0
Author: Lantana-Studio
Author URI: http://lantana-studio.com
License: GPLv2
*/
/* Copyright 2016 Anzar Shchumakha (email : anzarsh@mail.ru)
This program is free software; you can redistribute it and/or modify
Компоновка плагина 185
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
*/

	register_activation_hook( __FILE__ , 'ls_plugin_activate' );
	function ls_plugin_activate() {
		add_option('ls_database_url', '');
		// echo('expression');
		// global $wpdb;
		// $wpdb->update($wpdb->posts, array('post_title' => 'anzar post2', 'post_content' => 'anzar content'), array('ID' => 1));
	}

	register_deactivation_hook( __FILE__ , 'ls_plugin_deactivate' );
	function ls_plugin_deactivate() {
		delete_option('ls_database_url');
	}

	add_action( 'admin_menu', 'ajax_puller_create_settings_submenu' );
	function ajax_puller_create_settings_submenu() {
		add_options_page( 'Ajax puller', 'Обновить базу',
		'manage_options', 'halloween_settings_menu', 'ajax_puller_page' );
	}

	



	function ajax_puller_page(){
		// global $post, $prop_images;
		// $prop_images        = get_post_meta( 271 );
		// // print_r($prop_images);
		// var_dump($prop_images);
		// echo '<br>';
		// $additional_features = get_post_meta( 271, 'additional_features', true );
		// print_r($additional_features);
		// echo '<br>';
		// foreach( $additional_features as $ad_del ):
  //           echo '<li><strong>'.esc_attr( $ad_del['fave_additional_feature_title'] ).':</strong> '.esc_attr( $ad_del['fave_additional_feature_value'] ).'</li>';
  //       endforeach;
?>
		<link rel="stylesheet" href="<?php echo plugins_url( 'css/style.css', __FILE__ ) ?>">
		<script src="<?php echo plugins_url( 'js/jquery-3.1.1.min.js', __FILE__ ) ?>"></script>

		<div class="az-wrap">
			<h2>Обновление базы данных</h2>
			<form action="<?php echo plugins_url( 'ls-plugin.php', __FILE__ ) ?>" class="az-form" >
				<label for="">URL для ajax запроса</label><input type="text" value="<?= get_option('ls_database_url'); ?>" class="ls_database_url">
				<input type="submit" value="Синхронизация">
			</form>
		</div>
		
		<script type="text/javascript">
			$(document).ready(function(){
				$('.az-form').attr('action', ajaxurl);
			});
		</script>
<?php
	}



	add_action('admin_print_footer_scripts', 'axaj_puller_javascript', 99);
	function axaj_puller_javascript() {
?>
		<script src="<?php echo plugins_url( 'js/script.js', __FILE__ ) ?>"></script>
<?php
	}



	add_action('wp_ajax_axaj_puller', 'axaj_puller_callback');
	function axaj_puller_callback() {
		$ls_relations = Array(
				'id' => 'fave_property_id',
				'address' => 'fave_property_map_address',
				'bedrooms' => 'fave_property_bedrooms',
				'bathrooms' => 'fave_property_bathrooms',
				'propertysize' => 'fave_property_size'
			);
		$ls_posts = Array(
				'name1' => 'post_title'
			);
		$ls_cats = Array(

			);
		global $wpdb;
		$az_json = $_POST['az_json'];
		// print_r($az_json);
		update_option('ls_database_url', $_POST['ls_database_url']);

		foreach ($az_json as $value){
			$value2 = Array();
			foreach($ls_relations as $rel_key=>$rel_val){
				$value2[$rel_val] = $value[$rel_key];
				unset($value[$rel_key]);
			}
			$value3 = Array();
			foreach($ls_posts as $posts_key=>$posts_val){
				$value3[$posts_val] = $value[$posts_key];
				unset($value[$posts_key]);
			}
			$wp_query = new WP_Query( array( 'meta_key' => 'fave_property_id', 'meta_value' => $value2['fave_property_id'] ));
			if($wp_query->have_posts()){
				$wp_query->the_post();
				print_r($wp_query);
			} else {
				$wpdb->insert($wpdb->posts, array('post_title' => $value3['post_title'], 'post_type'=>'property'), array('%s', '%s'));
				$ls_post_id = $wpdb->insert_id;
				foreach( $value2 as $value2_key=>$value2_item ){
					update_post_meta($ls_post_id, $value2_key, $value2_item);
				}
				$additional_features = Array();
				foreach( $value as $value_key=>$value_item ){
					$additional_features[] = Array();
					$additional_features[count($additional_features)-1]['fave_additional_feature_title'] = $value_key;
					$additional_features[count($additional_features)-1]['fave_additional_feature_value'] = $value_item;
				}
				update_post_meta($ls_post_id, 'fave_additional_features_enable', 'enable');
				update_post_meta($ls_post_id, 'additional_features', $additional_features);
			}
		}
		wp_die();
	}


?>