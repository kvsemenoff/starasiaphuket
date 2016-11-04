<?php
	/*functions to print*/
	function ls_print($arg){
		return $arg;
	}
	function ls_print1($arg){
		return $arg;
	}
	function ls_print2($arg){
		return (string)$arg.' м<sup>2<sup>';
	}
	function ls_print3($arg){
		$arg = (int)$arg;
		// $str=$arg;
		for($i=0;(($i<$arg)&&($i<5)); $i++){
			$str .= '<img src="'.get_template_directory_uri().'/images/az-star-yellow2.png" alt="">';
		}
		return $str;
	}
	function ls_print4($arg){
		return "<span>$arg<div style='display:block; width: 100%; height: 5px; background: #aaa;'>".
		"<div style='display:block; width:".(10*(int)$arg)."%; height: 5px; background: #126732;'></div>"
		."</div></span>";
	}
	/*functions to print*/


	/*arrays for separating array $az_json*/
	$ls_print = Array(
			'other' => 'ls_print',
			'pool' => 'ls_print1',
			'tobeach' => 'ls_print1',
			'seaview' => 'ls_print1',
			'parking' => 'ls_print1',
			'security' => 'ls_print1',
			'cleaning' => 'ls_print1',
			'changetowels' => 'ls_print1',
			'laundry' => 'ls_print1',
			'cpayments' => 'ls_print1',
			'date_reg' => 'ls_print1',
			'date_check' => 'ls_print1',
			'rating' => 'ls_print4',
			'price_day' => 'ls_print1',
			'price week' => 'ls_print1',
			'price_month' => 'ls_print1',
			'price_longterm' => 'ls_print1',
			'price_sale' => 'ls_print1',
			'price_spec' => 'ls_print1',
			'stars' => 'ls_print3',
			'guests' => 'ls_print1',
	        'livingsize' => 'ls_print2',
	        'propertysize' => 'ls_print2',
	        'code_id' => 'ls_print1',
	        'area' => 'ls_print1',
	        'name2' => 'ls_print1'
		);

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
			'tobeach' => 'Время до пляжа',
			'seaview' => 'Вид на море',
			'parking' => 'Парковка',
			'security' => 'Охрана',
			'cleaning' => 'Уборка',
			'changetowels' => 'Замена белья',
			'laundry' => 'Стирка',
			'cpayments' => 'Электроэнергия и коммунальные платежи',
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
	$ls_ru_en = Array(
			'Бассейн'                               => 'pool'           ,
			'Время до пляжа'                        => 'tobeach'        ,
			'Вид на море'                           => 'seaview'        ,
			'Парковка'                              => 'parking'        ,
			'Охрана'                                => 'security'       ,
			'Уборка'                                => 'cleaning'       ,
			'Замена белья'                          => 'changetowels'   ,
			'Стирка'                                => 'laundry'        ,
			'Электроэнергия и коммунальные платежи' => 'cpayments'      ,
			'Дата добавления'                       => 'date_reg'       ,
			'Дата проверки'                         => 'date_check'     ,
			'Рейтинг'                               => 'rating'         ,
			'Цена по дням'                          => 'price_day'      ,
			'Цена по неделям'                       => 'price week'     ,
			'Цена по месяцам'                       => 'price_month'    ,
			'Цена на 6+'                            => 'price_longterm' ,
			'Цена продажи'                          => 'price_sale'     ,
			'Цена спец'                             => 'price_spec'     ,
			'Количество звезд'                      => 'stars'          ,
			'Количество гостей'                     => 'guests'         ,
	        'Жилая площадь'                         => 'livingsize'     ,
	        'Общая площадь'                         => 'propertysize'   ,
	        'Код'                                   => 'code_id'        ,
	        'Месторасположение'                     => 'area'           ,
	        'Наименование'                          => 'name2'          
		);
	$ls_show = Array(
			'stars'=>1, 'guests'=>1, 'livingsize'=>1, 'pool'=>1, 'tobeach'=>1, 'seaview'=>1, 'parking'=>1,
			'security'=>1, 'cleaning'=>1, 'changetowels'=>1, 'laundry'=>1, 'cpayments'=>1, 'rating'=>1
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
			'price_day' => 'fave_property_price',
			'property_map' => 'fave_property_map',
			'property_map_street' => 'fave_property_map_street_view'
		);
	$ls_posts = Array(
			'name1' => 'post_title',
			'descr' => 'post_content'
		);
	$ls_cats = Array(
			'type' => 'property_type'
		);
	$ls_thumbnail = 'img';
	$ls_gallery = 'gallery';
	$remove = Array(
			'card_id', 'card_name', 'code_name', 'list_id', 'list_name', 'area_code', 'name1_en', 'name2_en', 'cleaning_en', 'changetowels_en', 'loundry_en', 'cpayments_en', 'descr_en', 'descr_internal', 'contacts'
		);
	
	/*arrays for separating array $az_json*/