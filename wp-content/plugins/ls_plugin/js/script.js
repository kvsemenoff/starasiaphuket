$(document).ready(function(){
	var az_json1 = "{'id': '1', 'code': 'CHA2TN22', 'code_id': '1394', 'area': 'Чалонг', 'area_en': 'Chalong', 'address': '161/32, Mooooo 10, Tanon Chaofa', 'type': 'Townhouse', 'stars': '3', 'bedrooms': '2', 'bathrooms': '2', 'livingsize': '5', 'propertysize': '5', 'landsize': '5', 'pool': '5', 'tobeach': '5', 'name1': 'Таунхаус Офис1'}, {'id': '2', 'code': 'CHA2TN', 'code_id': '1394', 'area': 'Чалонг', 'area_en': 'Chalong', 'address': '161/32, Mooooo 10, Tanon Chaofa', 'type': 'Townhouse', 'stars': '3', 'name1': 'Таунхаус Офис2', 'name1_en': 'Townhouse Office', 'name2': 'Таунхаус Уютный дом', 'name2_en': 'Townhouse Cozy home', 'bedrooms': '2', 'bathrooms': '2', 'livingsize': '5', 'propertysize': '5', 'landsize': '5', 'pool': '5', 'tobeach': '5'}";
    var az_json2 = "{'id': '3', 'code': 'CHA2TN22', 'code_id': '1394', 'area': 'Чалонг', 'area_en': 'Chalong', 'address': '161/32, Mooooo 10, Tanon Chaofa', 'type': 'Townhouse', 'stars': '3', 'bedrooms': '2', 'bathrooms': '2', 'livingsize': '5', 'propertysize': '5', 'landsize': '5', 'pool': '5', 'tobeach': '5', 'name1': 'Таунхаус Офис3'}, {'id': '4', 'code': 'CHA2TN', 'code_id': '1394', 'area': 'Чалонг', 'area_en': 'Chalong', 'address': '161/32, Mooooo 10, Tanon Chaofa', 'type': 'Townhouse', 'stars': '3', 'name1': 'Таунхаус Офис4', 'name1_en': 'Townhouse Office', 'name2': 'Таунхаус Уютный дом', 'name2_en': 'Townhouse Cozy home', 'bedrooms': '2', 'bathrooms': '2', 'livingsize': '5', 'propertysize': '5', 'landsize': '5', 'pool': '5', 'tobeach': '5'}";
    var az_json3 = "{'id': '5', 'code': 'CHA2TN22', 'code_id': '1394', 'area': 'Чалонг', 'area_en': 'Chalong', 'address': '161/32, Mooooo 10, Tanon Chaofa', 'type': 'Townhouse', 'stars': '3', 'bedrooms': '2', 'bathrooms': '2', 'livingsize': '5', 'propertysize': '5', 'landsize': '5', 'pool': '5', 'tobeach': '5', 'name1': 'Таунхаус Офис5'}, {'id': '6', 'code': 'CHA2TN', 'code_id': '1394', 'area': 'Чалонг', 'area_en': 'Chalong', 'address': '161/32, Mooooo 10, Tanon Chaofa', 'type': 'Townhouse', 'stars': '3', 'name1': 'Таунхаус Офис6', 'name1_en': 'Townhouse Office', 'name2': 'Таунхаус Уютный дом', 'name2_en': 'Townhouse Cozy home', 'bedrooms': '2', 'bathrooms': '2', 'livingsize': '5', 'propertysize': '5', 'landsize': '5', 'pool': '5', 'tobeach': '5'}";
    var az_json4 = "{'id': '7', 'code': 'CHA2TN22', 'code_id': '1394', 'area': 'Чалонг', 'area_en': 'Chalong', 'address': '161/32, Mooooo 10, Tanon Chaofa', 'type': 'Townhouse', 'stars': '3', 'bedrooms': '2', 'bathrooms': '2', 'livingsize': '5', 'propertysize': '5', 'landsize': '5', 'pool': '5', 'tobeach': '5', 'name1': 'Таунхаус Офис7'}, {'id': '8', 'code': 'CHA2TN', 'code_id': '1394', 'area': 'Чалонг', 'area_en': 'Chalong', 'address': '161/32, Mooooo 10, Tanon Chaofa', 'type': 'Townhouse', 'stars': '3', 'name1': 'Таунхаус Офис8', 'name1_en': 'Townhouse Office', 'name2': 'Таунхаус Уютный дом', 'name2_en': 'Townhouse Cozy home', 'bedrooms': '2', 'bathrooms': '2', 'livingsize': '5', 'propertysize': '5', 'landsize': '5', 'pool': '5', 'tobeach': '5'}";
    var az_json5 = "{'id': '9', 'code': 'CHA2TN22', 'code_id': '1394', 'area': 'Чалонг', 'area_en': 'Chalong', 'address': '161/32, Mooooo 10, Tanon Chaofa', 'type': 'Townhouse', 'stars': '3', 'bedrooms': '2', 'bathrooms': '2', 'livingsize': '5', 'propertysize': '5', 'landsize': '5', 'pool': '5', 'tobeach': '5', 'name1': 'Таунхаус Офис9'}, {'id': '10', 'code': 'CHA2TN', 'code_id': '1394', 'area': 'Чалонг', 'area_en': 'Chalong', 'address': '161/32, Mooooo 10, Tanon Chaofa', 'type': 'Townhouse', 'stars': '3', 'name1': 'Таунхаус Офис10', 'name1_en': 'Townhouse Office', 'name2': 'Таунхаус Уютный дом', 'name2_en': 'Townhouse Cozy home', 'bedrooms': '2', 'bathrooms': '2', 'livingsize': '5', 'propertysize': '5', 'landsize': '5', 'pool': '5', 'tobeach': '5'}";
    var az_json6 = "{'id': '11', 'code': 'CHA2TN22', 'code_id': '1394', 'area': 'Чалонг', 'area_en': 'Chalong', 'address': '161/32, Mooooo 10, Tanon Chaofa', 'type': 'Townhouse', 'stars': '3', 'bedrooms': '2', 'bathrooms': '2', 'livingsize': '5', 'propertysize': '5', 'landsize': '5', 'pool': '5', 'tobeach': '5', 'name1': 'Таунхаус Офис11'}, {'id': '12', 'code': 'CHA2TN', 'code_id': '1394', 'area': 'Чалонг', 'area_en': 'Chalong', 'address': '161/32, Mooooo 10, Tanon Chaofa', 'type': 'Townhouse', 'stars': '3', 'name1': 'Таунхаус Офис12', 'name1_en': 'Townhouse Office', 'name2': 'Таунхаус Уютный дом', 'name2_en': 'Townhouse Cozy home', 'bedrooms': '2', 'bathrooms': '2', 'livingsize': '5', 'propertysize': '5', 'landsize': '5', 'pool': '5', 'tobeach': '5'}";
    var az_json7 = "{'id': '13', 'code': 'CHA2TN22', 'code_id': '1394', 'area': 'Чалонг', 'area_en': 'Chalong', 'address': '161/32, Mooooo 10, Tanon Chaofa', 'type': 'Townhouse', 'stars': '3', 'bedrooms': '2', 'bathrooms': '2', 'livingsize': '5', 'propertysize': '5', 'landsize': '5', 'pool': '5', 'tobeach': '5', 'name1': 'Таунхаус Офис13'}, {'id': '14', 'code': 'CHA2TN', 'code_id': '1394', 'area': 'Чалонг', 'area_en': 'Chalong', 'address': '161/32, Mooooo 10, Tanon Chaofa', 'type': 'Townhouse', 'stars': '3', 'name1': 'Таунхаус Офис14', 'name1_en': 'Townhouse Office', 'name2': 'Таунхаус Уютный дом', 'name2_en': 'Townhouse Cozy home', 'bedrooms': '2', 'bathrooms': '2', 'livingsize': '5', 'propertysize': '5', 'landsize': '5', 'pool': '5', 'tobeach': '5'}";
    var az_json8 = "{'id': '15', 'code': 'CHA2TN22', 'code_id': '1394', 'area': 'Чалонг', 'area_en': 'Chalong', 'address': '161/32, Mooooo 10, Tanon Chaofa', 'type': 'Townhouse', 'stars': '3', 'bedrooms': '2', 'bathrooms': '2', 'livingsize': '5', 'propertysize': '5', 'landsize': '5', 'pool': '5', 'tobeach': '5', 'name1': 'Таунхаус Офис15'}, {'id': '16', 'code': 'CHA2TN', 'code_id': '1394', 'area': 'Чалонг', 'area_en': 'Chalong', 'address': '161/32, Mooooo 10, Tanon Chaofa', 'type': 'Townhouse', 'stars': '3', 'name1': 'Таунхаус Офис16', 'name1_en': 'Townhouse Office', 'name2': 'Таунхаус Уютный дом', 'name2_en': 'Townhouse Cozy home', 'bedrooms': '2', 'bathrooms': '2', 'livingsize': '5', 'propertysize': '5', 'landsize': '5', 'pool': '5', 'tobeach': '5'}";
    
    var az_json = '([' + az_json1 + ','
                    + az_json2 + ','
                    + az_json3 + ','
                    + az_json4 + ','
                    + az_json5 + ','
                    + az_json6 + ','
                    + az_json7 + ','
                    + az_json8 +
                    '])';
	var temp = eval(az_json);
	// alert(temp[1].id);
	$('.az-form').submit(function(){
		// alert($(this).attr('action'));
        var data = {
            action: 'axaj_puller',
            az_json: temp,
            ls_database_url: $('.ls_database_url').val()
        };
		$.ajax({
            url: $(this).attr('action'),
            type: 'post',
            data: data,
            success: function (data) {
            	// var temp = eval(data);
                // alert(temp.asd);
                alert(data);
            }
        });
  		return false;
	});
});