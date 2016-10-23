<?php
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

add_action('wp_ajax_my_action', 'my_action_callback');
function my_action_callback() {
	$whatever = intval( $_POST['whatever'] );

	$whatever += 10;
	echo $whatever;

	wp_die(); // выход нужен для того, чтобы в ответе не было ничего лишнего, только то что возвращает функция
}
// global $wpdb;

// // $wpdb->show_errors();
// if(($wpdb->update('ls_temp', array('id' => 1, 'name' => 'newtitle'), array('%s'))) === true){
// 	echo "true";
// }
// // $wpdb->print_error();

// echo "false";//'({"asd": "asdasd"})';
// $wpdb->update( {table, {data, {where );
// {newtitle = 'My updated post title';
// {newcontent = 'My new content';
// {my_id = 1;
// {wpdb->update( {wpdb-»posts, array( 'post_title' => {newtitle,
// 'post_content' => {newcontent ), array( 'ID' =» {my_id ) );

?>