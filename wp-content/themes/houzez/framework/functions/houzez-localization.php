<?php
if( !function_exists('houzez_get_localization')) {
	function houzez_get_localization() {


		$localization = array(

			/*------------------------------------------------------
			* Theme
			*------------------------------------------------------*/
			'favorite' 			=> esc_html__( 'Favorite', 'houzez' ),
			'photos' 			=> esc_html__( 'Photos', 'houzez' ),
			'by_text' 			=> esc_html__( 'by', 'houzez' ),
			'read_more' 		=> esc_html__( 'Read More', 'houzez' ),
			'continue_reading' 	=> esc_html__( 'Continue reading', 'houzez' ),
			'follow_us' 		=> esc_html__( 'Follow us', 'houzez' ),
			'property' 			=> esc_html__( 'Property', 'houzez' ),
			'properties' 		=> esc_html__( 'Properties', 'houzez' ),
			'keyword_text' 		=> esc_html__( 'Enter keyword...', 'houzez' ),
			'city_state_area' 	=> esc_html__( 'Search City, State or Area', 'houzez' ),
			'search_address' 	=> esc_html__( 'Enter an address, town, street, zip or property ID', 'houzez' ),
			'enter_location' 	=> esc_html__( 'Enter a Location', 'houzez' ),
			'all_cities' 		=> esc_html__( 'All Cities', 'houzez' ),
			'all_areas' 		=> esc_html__( 'All Areas', 'houzez' ),
			'all_status' 		=> esc_html__( 'All Status', 'houzez' ),
			'all_types' 		=> esc_html__( 'All Types', 'houzez' ),
			'beds' 				=> esc_html__( 'Beds', 'houzez' ),
			'baths' 			=> esc_html__( 'Baths', 'houzez' ),
			'bedrooms' 			=> esc_html__( 'Bedrooms', 'houzez' ),
			'bathrooms' 		=> esc_html__( 'Bathrooms', 'houzez' ),
			'min_bedrooms' 		=> esc_html__( 'Min.Bedrooms', 'houzez' ),
			'min_area' 			=> esc_html__( 'Min Area', 'houzez' ),
			'max_area' 			=> esc_html__( 'Max Area', 'houzez' ),
			'min_price' 		=> esc_html__( 'Min Price', 'houzez' ),
			'max_price' 		=> esc_html__( 'Max Price', 'houzez' ),
			'available_from' 	=> esc_html__( 'Available from', 'houzez' ),
			'price_range' 		=> esc_html__( 'Price Range:', 'houzez' ),
			'from' 				=> esc_html__( 'From', 'houzez' ),
			'to'                => esc_html__( 'To', 'houzez' ),
			'other_feature'     => esc_html__( 'Other Features', 'houzez' ),
			'more_options' 		=> esc_html__( 'More Options', 'houzez' ),
			'go' 				=> esc_html__( 'Go', 'houzez' ),
			'search' 			=> esc_html__( 'Search', 'houzez' ),
			'advanced' 			=> esc_html__( 'Advanced', 'houzez' ),
			'advanced_search' 	=> esc_html__( 'Advanced Search', 'houzez' ),
			'404_page' 			=> esc_html__( 'Back to Homepage', 'houzez' ),
			'at' 				=> esc_html__( 'at', 'houzez' ),
			'office' 			=> esc_html__( 'OFFICE:', 'houzez' ),
			'mobile' 			=> esc_html__( 'MOBILE:', 'houzez' ),
			'fax' 				=> esc_html__( 'FAX:', 'houzez' ),
			'email' 			=> esc_html__( 'Email:', 'houzez' ),
			'website' 			=> esc_html__( 'Website:', 'houzez' ),
			'submit' 			=> esc_html__( 'Submit', 'houzez' ),
			'join_discussion' 	=> esc_html__( 'Join The Discussion', 'houzez' ),
			'your_name'	 		=> esc_html__( 'Your Name', 'houzez' ),
			'your_email'	 	=> esc_html__( 'Your Email', 'houzez' ),
			'blog_search'	 	=> esc_html__( 'Search', 'houzez' ),


			/*------------------------------------------------------
			* Shortcodes
			*------------------------------------------------------*/
			// Agents
			'view_profile' => esc_html__( 'View Profile', 'houzez' ),

			/*------------------------------------------------------
			* Common
			*------------------------------------------------------*/
			'next_text' => esc_html__('Next', 'houzez'),
			'prev_text' => esc_html__('Prev', 'houzez'),

			/*------------------------------------------------------
			* Custom Post Types
			*------------------------------------------------------*/


			/*------------------------------------------------------
			* Theme Options
			*------------------------------------------------------*/
			'general' => esc_html__( 'General', 'houzez' ),


		);

		return $localization;
	}
}
