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
		'manage_options', 'ajax_puller', 'ajax_puller_page' );
	}

	
// 	function new_attachment($att_id){
// 	    // the post this was sideloaded into is the attachments parent!
// 	    $p = get_post($att_id);
// 	    update_post_meta($p->post_parent,'_thumbnail_id',$att_id);
// 	}

// // add the function above to catch the attachments creation
// add_action('add_attachment','new_attachment');

// // load the attachment from the URL
// media_sideload_image($image_url, $post_id, $post_id);

// // we have the Image now, and the function above will have fired too setting the thumbnail ID in the process, so lets remove the hook so we don't cause any more trouble 
// remove_action('add_attachment','new_attachment');




	function ajax_puller_page(){
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
		<script src="<?php echo plugins_url( 'js/functions.js', __FILE__ ) ?>"></script>
		<script src="<?php echo plugins_url( 'js/script.js', __FILE__ ) ?>"></script>
		
<?php
	}



	add_action('wp_ajax_axaj_puller', 'axaj_puller_callback');
	function axaj_puller_callback() {
		// require_once(ABSPATH .'wp-admin/includes/media.php');
		// require_once(ABSPATH .'wp-admin/includes/file.php');
		// require_once(ABSPATH .'wp-admin/includes/image.php');
		// $wp_reset_query();
		// 1 - the field marked with '1' may be writen from many fields 

		/*arrays for separating array $az_json*/
		$ls_MtoM = Array(
				'fave_property_price' => 0 //1
			);
		$ls_relations = Array(
				'id' => 'fave_property_id',
				'address' => ['fave_property_address', 'fave_property_map_address'],
				'bedrooms' => 'fave_property_bedrooms',
				'bathrooms' => 'fave_property_bathrooms',
				'propertysize' => 'fave_property_size',
				'gps' => 'fave_property_location',
				'price_sale' => 'fave_property_price',
				'price_longterm' => 'fave_property_price',
				'price_spec' => 'fave_property_price',
				'price_month' => 'fave_property_price',
				'price_week' => 'fave_property_price',
				'price_day' => 'fave_property_price'
			);
		$ls_posts = Array(
				'name1' => 'post_title',
				'descr' => 'post_content'
			);
		$ls_cats = Array(
				'type' => 'property_type'
			);
		$ls_thumbnail = 'img';
		$ls_en_ru = Array(
				'pool' => 'Бассейн',
				'tobeach' => 'До пляжа',
				'seaview' => 'Вид на море',
				'parking' => 'Парковка',
				'security' => 'Охрана',
				'cleaning' => 'Уборка',
				'changetowels' => 'Замена белья',
				'laundry' => 'Стирка',
				'cpayments' => 'Коммунальные платежи',
				'date_reg' => 'Дата добавления',
				'date_check' => 'Дата проверки',
				'rating' => 'Рейтинг',
				'price_day' => 'Цена по дням',
				'price week' => 'Цена по неделям',
				'price_month' => 'Цена по месяцам',
				'price_longterm' => 'Цена на 6+',
				'price_sale' => 'Цена продажи',
				'price_spec' => 'Цена спец',
				'stars' => 'Количество звезд',
				'guests' => 'Количество гостей',
		        'livingsize' => 'Жилая площадь',
		        'propertysize' => 'Общая площадь',
			);
		$remove = Array(
				'card_id', 'card_name', 'code_id', 'code_name', 'list_id', 'list_name', 'area_code', 'area', 'name1_en', 'name2', 'name2_en', 'cleaning_en', 'changetowels_en', 'loundry_en', 'cpayments_en', 'descr_en', 'descr_internal', 'contacts'
			);
		/*arrays for separating array $az_json*/

		global $wpdb;
		$az_json = $_POST['az_json'];
		update_option('ls_database_url', $_POST['ls_database_url']); //update data url
		foreach ($az_json as $value){

			foreach ($remove as $remove_value) {
				unset($value[$remove_value]);
			}
			$ls_MtoM_temp = Array();
			foreach ($ls_MtoM as $ls_MtoM_key => $ls_MtoM_value) {
				$ls_MtoM_temp[$ls_MtoM_key] = $ls_MtoM_value;
			}

			/*separation data*/
			$ls_thumbnail_temp = $value[$ls_thumbnail];
			unset($value[$ls_thumbnail]);
			$value2 = Array();
			foreach($ls_relations as $rel_key=>$rel_val){
				$real_value = $value[$rel_key];
				if($real_value  != '' && $real_value  != '//'){
					if(!is_array($rel_val) && $ls_MtoM_temp[$rel_val] === 0){
						$value2[$rel_val] = $real_value;
						unset($value[$rel_key]);
						$ls_MtoM_temp[$rel_val]++;
					} elseif(!is_array($rel_val) && $ls_MtoM_temp[$rel_val] === 1){
						//do nothing
					} else {
						if(is_array($rel_val)){
							foreach ($rel_val as $ls_value2) {
								$value2[$ls_value2] = $real_value;
							}
						} else {
							$value2[$rel_val] = $real_value;
						}
						unset($value[$rel_key]);
					}
				} else {
					unset($value[$rel_key]);
				}
			}
			$value2['fave_agent_display_option'] = 'none';

			$value3 = Array();
			foreach($ls_posts as $posts_key=>$posts_val){
				$value3[$posts_val] = $value[$posts_key];
				unset($value[$posts_key]);
			}
			$value3['post_type'] = 'property';
			$value4 = Array();
			foreach($ls_cats as $cats_key=>$cats_val){
				$value4[$cats_val] = $value[$cats_key];
				unset($value[$cats_key]);
			}

			/*separation data*/

			/*is it new item?*/
			wp_reset_query(); 
			$args = array( 'meta_key' => 'fave_property_id', 'meta_value' => $value2['fave_property_id'], 'post_type' => 'property');
			$query = new WP_Query( $args );
			if($query->have_posts()){
				$query->the_post();
				$ls_post_id = get_the_ID();
				$args2 = Array();
			} else {
				$wpdb->insert($wpdb->posts, array('post_title' => $value3['post_title'], 'post_type'=>'property'), array('%s', '%s'));
				$ls_post_id = $wpdb->insert_id;
			}
			/*is it new item?*/

			/*fill the property*/
			$value3['ID'] = $ls_post_id;
			wp_update_post($value3);
			// update_post_meta($ls_post_id, '_thumbnail_id', 'enable');
			// echo $src;

			foreach( $value2 as $value2_key=>$value2_item ){
				update_post_meta($ls_post_id, $value2_key, $value2_item);
			}

			$additional_features = Array();
			foreach( $value as $value_key=>$value_item ){
				$additional_features[] = Array();
				$additional_features[count($additional_features)-1]['fave_additional_feature_title'] = (isset($ls_en_ru[$value_key]))?$ls_en_ru[$value_key]:$value_key;
				$additional_features[count($additional_features)-1]['fave_additional_feature_value'] = $value_item;
			}
			update_post_meta($ls_post_id, 'fave_additional_features_enable', 'enable');
			update_post_meta($ls_post_id, 'additional_features', $additional_features);

			foreach( $value4 as $value4_key=>$value4_item ){
				wp_set_object_terms( $ls_post_id, $value4_item, $value4_key, false );
			}

			/*fill thumbnail*/
			preg_match( '/[^\?]+\.(jpe?g|jpe|gif|png)\b/i', $ls_thumbnail_temp, $matches );
			$file_array = array();
			$file_array['name'] = basename( $matches[0] );
			$file_array['tmp_name'] = download_url( $ls_thumbnail_temp );
			$id = media_handle_sideload( $file_array, $ls_post_id, NULL );
			wp_get_attachment_url( $id );
			$p = get_post($id);
			update_post_meta($p->post_parent,'_thumbnail_id',$id);
			/*fill thumbnail*/

			/*fill the property*/

		}
		wp_die();
	}


?>