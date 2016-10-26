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
		global $wpdb;
		$az_json = $_POST['az_json'];
		update_option('ls_database_url', $_POST['ls_database_url']);
		// print_r($az_json);
		// if($wpdb->update($wpdb->posts, array('post_title' => 'anzar post2', 'post_content' => 'anzar content'), array('ID' => $az_json['id']))){
			// $temp_id = $az_json['id'];

		// echo 'asd';
		foreach ($az_json as $value){
			// print_r($value);
			// $query = new WP_Query({'p' => $value["id"]);
			// $posts = get_posts(array( 'id' => $value["id"] ));
			// if( $posts ){
			$query = new WP_Query( array( 'meta_key' => 'id', 'meta_value' => $value['id'] ) );
			if($query->have_posts()){
				$query->the_post();
				// update_post_meta($wpdb->insert_id, )
				print_r($query);
			} else {
				$wpdb->insert($wpdb->posts, array('post_title' => '1', 'post_content' => '2', 'post_type'=>'property'), array('%s', '%s', '%s'));
					$ls_post_id = $wpdb->insert_id;
					// print_r($ls_post_id);
					$additional_features = Array();
					foreach( $value as $key=>$item ){
						$additional_features[] = Array();
						$additional_features[count($additional_features)-1]['fave_additional_feature_title'] = $key;
						$additional_features[count($additional_features)-1]['fave_additional_feature_value'] = $item;
					}
					update_post_meta($ls_post_id, 'fave_additional_features_enable', 'enable');
					update_post_meta($ls_post_id, 'additional_features', $additional_features);
			}
				// foreach( $value as $key=>$item ){

			// 		setup_postdata( $post )
			// 		$query->the_post();
			// 		// next($value);
			// 		while ($cur_val = current($value)) {
			// 	    	update_field(key($value), $cur_val);
			// 		    next($value);
			// 		}
				// }
			// }
		}
			
			// print_r($query);
		// 	echo "База успешно синхронизованна $temp_id";
		// }else{
		// 	echo 'База не синхронизованна';
		// }
		// echo $wpdb->posts;
		wp_die();
	}


?>