<?php
	/*arrays for separating array $az_json*/
	$type_to_icon = Array(
			'Villa' => '<i class="fa fa-bed" aria-hidden="true"></i>',
			'Apartment' => '<i class="fa fa-home" aria-hidden="true"></i>',
			'Townhouse' => '<i class="fa fa-building" aria-hidden="true"></i>',
			'House' => '<i class="fa fa-home" aria-hidden="true"></i>',
			'Hotel' => '<i class="fa fa-bed" aria-hidden="true"></i>',
			'Land' => '<i class="fa fa-building" aria-hidden="true"></i>',
			'Single Family Home' => '<i class="fa fa-bed" aria-hidden="true"></i>'
		);
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
	        'code_id' => 'Код',
	        'area' => 'Месторасположение',
	        'name2' => 'Наименование'
		);
	// 1 - the field marked with '1' may be writen from many fields 
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
	$remove = Array(
			'card_id', 'card_name', 'code_name', 'list_id', 'list_name', 'area_code', 'name1_en', 'name2_en', 'cleaning_en', 'changetowels_en', 'loundry_en', 'cpayments_en', 'descr_en', 'descr_internal', 'contacts'
		);
	/*arrays for separating array $az_json*/