<?php
/*-----------------------------------------------------------------------------------*/
/*	Inspire me
/*-----------------------------------------------------------------------------------*/
if( !function_exists('inspire_me') ) {
	function inspire_me($atts, $content = null)
	{
		print_r($atts);
		extract(shortcode_atts(array(
			'custom_title' => '',
		), $atts));

		ob_start();
		global $post;

		// $houzez_local = houzez_get_localization();

		// //do the query
		// $the_query = houzez_data_source::get_wp_query($atts); //by ref  do the query

		// $token = wp_generate_password(5, false, false);
		// wp_register_script('prop_caoursel_v2', get_template_directory_uri() . '/js/property-carousels-v2.js', array('jquery'), HOUZEZ_THEME_VERSION, true);
		// $local_args = array(
		// 	'slide_auto' => $slide_auto,
		// 	'auto_speed' => $auto_speed,
		// 	'slide_dots' => $slide_dots,
		// 	'slide_infinite' => $slide_infinite,
		// 	'slides_to_scroll' => $slides_to_scroll
		// );
		// wp_localize_script('prop_caoursel_v2', 'prop_carousel_v2_' . $token, $local_args);
		// wp_enqueue_script('prop_caoursel_v2');
		?>

		<div id="carousel-module-grid123132" class="houzez-module carousel-module">
			<div class="module-title-nav clearfix">
				<div>
					<h2><?php echo esc_attr($custom_title); ?></h2>
				</div>
			</div>
		</div>

		<?php
		$result = ob_get_contents();
		ob_end_clean();
		return $result;

	}

	add_shortcode('inspire-me', 'inspire_me');
}
?>