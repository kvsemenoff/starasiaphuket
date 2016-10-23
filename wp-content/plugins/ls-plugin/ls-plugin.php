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

	register_activation_hook( '__FILE__' , 'prowp_install' );
	function prowp_install() {}
	
	add_action( 'admin_menu', 'prowp_create_settings_submenu' );
	function prowp_create_settings_submenu() {
		add_options_page( 'Ajax puller', 'Обновить базу',
		'manage_options', 'halloween_settings_menu', 'prowp_settings_page' );
	}




	function prowp_settings_page(){
?>
		<link rel="stylesheet" href="<?php echo plugins_url( 'css/style.css', __FILE__ ) ?>">
		<script src="<?php echo plugins_url( 'js/jquery-3.1.1.min.js', __FILE__ ) ?>"></script>

		<div class="az-wrap">
			<h2>Ajax puller</h2>
			<form action="<?php echo plugins_url( 'ls-plugin.php', __FILE__ ) ?>" class="az-form" >
				<label for="">URL для ajax запроса</label><input type="text" value="http://db.ru">
				<input type="submit" value="Обновить базу данных">
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
		echo $wpdb->posts;
		wp_die();
	}


?>