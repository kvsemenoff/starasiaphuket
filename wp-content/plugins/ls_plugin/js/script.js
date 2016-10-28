var addresstocoordination = function(city){
    var data43 = {address: city, sensor: true};//, key: "AIzaSyC21IELfSchG0MZFT3r7kENFYBstQr09PY"};
    var az_return = "";
    $.ajax({
        url: 'http://maps.googleapis.com/maps/api/geocode/json',
        type: 'get',
        data: data43,
        async: false, 
        success: function (data) {
            az_return = data.results[0].geometry.location.lat + "," + data.results[0].geometry.location.lng;
        }
    });
    return az_return;
}

$(document).ready(function(){


	var az_json1 = "{'id': '1', 'price_sale': '89000', 'code': 'CHA2TN22', 'code_id': '1394', 'area': 'Чалонг', 'area_en': 'Chalong', 'address': '161/32, Mooooo 10, Tanon Chaofa', 'type': 'Townhouse', 'stars': '3', 'bedrooms': '2', 'bathrooms': '2', 'livingsize': '5', 'propertysize': '5', 'landsize': '5', 'pool': '5', 'tobeach': '5', 'name1': 'Таунхаус Офис1-1'}, {'id': '2', 'price_sale': '89000', 'code': 'CHA2TN', 'code_id': '1394', 'area': 'Чалонг', 'area_en': 'Chalong', 'address': '161/32, Mooooo 10, Tanon Chaofa', 'type': 'Townhouse', 'stars': '3', 'name1': 'Таунхаус Офис2', 'name1_en': 'Townhouse Office', 'name2': 'Таунхаус Уютный дом', 'name2_en': 'Townhouse Cozy home', 'bedrooms': '2', 'bathrooms': '2', 'livingsize': '5', 'propertysize': '5', 'landsize': '5', 'pool': '5', 'tobeach': '5'}";
    var az_json2 = "{'id': '3', 'price_sale': '89000', 'code': 'CHA2TN23', 'code_id': '1394', 'area': 'Чалонг', 'area_en': 'Chalong', 'address': '161/32, Mooooo 10, Tanon Chaofa', 'type': 'Townhouse', 'stars': '3', 'bedrooms': '2', 'bathrooms': '2', 'livingsize': '5', 'propertysize': '5', 'landsize': '5', 'pool': '5', 'tobeach': '5', 'name1': 'Таунхаус Офис3-1'}, {'id': '4', 'price_sale': '89000', 'code': 'CHA2TN', 'code_id': '1394', 'area': 'Чалонг', 'area_en': 'Chalong', 'address': '161/32, Mooooo 10, Tanon Chaofa', 'type': 'Townhouse', 'stars': '3', 'name1': 'Таунхаус Офис4', 'name1_en': 'Townhouse Office', 'name2': 'Таунхаус Уютный дом', 'name2_en': 'Townhouse Cozy home', 'bedrooms': '2', 'bathrooms': '2', 'livingsize': '5', 'propertysize': '5', 'landsize': '5', 'pool': '5', 'tobeach': '5'}";
    var az_json3 = "{'id': '5', 'price_sale': '89000', 'code': 'CHA2TN22', 'code_id': '1394', 'area': 'Чалонг', 'area_en': 'Chalong', 'address': '161/32, Mooooo 10, Tanon Chaofa', 'type': 'Townhouse', 'stars': '3', 'bedrooms': '2', 'bathrooms': '2', 'livingsize': '5', 'propertysize': '5', 'landsize': '5', 'pool': '5', 'tobeach': '5', 'name1': 'Таунхаус Офис5'}, {'id': '6', 'price_sale': '89000', 'code': 'CHA2TN', 'code_id': '1394', 'area': 'Чалонг', 'area_en': 'Chalong', 'address': '161/32, Mooooo 10, Tanon Chaofa', 'type': 'Townhouse', 'stars': '3', 'name1': 'Таунхаус Офис6', 'name1_en': 'Townhouse Office', 'name2': 'Таунхаус Уютный дом', 'name2_en': 'Townhouse Cozy home', 'bedrooms': '2', 'bathrooms': '2', 'livingsize': '5', 'propertysize': '5', 'landsize': '5', 'pool': '5', 'tobeach': '5'}";
    var az_json4 = "{'id': '7', 'price_sale': '89000', 'code': 'CHA2TN22', 'code_id': '1394', 'area': 'Чалонг', 'area_en': 'Chalong', 'address': '161/32, Mooooo 10, Tanon Chaofa', 'type': 'Townhouse', 'stars': '3', 'bedrooms': '2', 'bathrooms': '2', 'livingsize': '5', 'propertysize': '5', 'landsize': '5', 'pool': '5', 'tobeach': '5', 'name1': 'Таунхаус Офис7'}, {'id': '8', 'price_sale': '89000', 'code': 'CHA2TN', 'code_id': '1394', 'area': 'Чалонг', 'area_en': 'Chalong', 'address': '161/32, Mooooo 10, Tanon Chaofa', 'type': 'Townhouse', 'stars': '3', 'name1': 'Таунхаус Офис8', 'name1_en': 'Townhouse Office', 'name2': 'Таунхаус Уютный дом', 'name2_en': 'Townhouse Cozy home', 'bedrooms': '2', 'bathrooms': '2', 'livingsize': '5', 'propertysize': '5', 'landsize': '5', 'pool': '5', 'tobeach': '5'}";
    var az_json5 = "{'id': '9', 'price_sale': '89000', 'code': 'CHA2TN22', 'code_id': '1394', 'area': 'Чалонг', 'area_en': 'Chalong', 'address': '161/32, Mooooo 10, Tanon Chaofa', 'type': 'Townhouse', 'stars': '3', 'bedrooms': '2', 'bathrooms': '2', 'livingsize': '5', 'propertysize': '5', 'landsize': '5', 'pool': '5', 'tobeach': '5', 'name1': 'Таунхаус Офис9'}, {'id': '10', 'price_sale': '89000', 'code': 'CHA2TN', 'code_id': '1394', 'area': 'Чалонг', 'area_en': 'Chalong', 'address': '161/32, Mooooo 10, Tanon Chaofa', 'type': 'Townhouse', 'stars': '3', 'name1': 'Таунхаус Офис10', 'name1_en': 'Townhouse Office', 'name2': 'Таунхаус Уютный дом', 'name2_en': 'Townhouse Cozy home', 'bedrooms': '2', 'bathrooms': '2', 'livingsize': '5', 'propertysize': '5', 'landsize': '5', 'pool': '5', 'tobeach': '5'}";
    var az_json6 = "{'id': '11', 'price_sale': '89000', 'code': 'CHA2TN22', 'code_id': '1394', 'area': 'Чалонг', 'area_en': 'Chalong', 'address': '161/32, Mooooo 10, Tanon Chaofa', 'type': 'Townhouse', 'stars': '3', 'bedrooms': '2', 'bathrooms': '2', 'livingsize': '5', 'propertysize': '5', 'landsize': '5', 'pool': '5', 'tobeach': '5', 'name1': 'Таунхаус Офис11'}, {'id': '12', 'price_sale': '89000', 'code': 'CHA2TN', 'code_id': '1394', 'area': 'Чалонг', 'area_en': 'Chalong', 'address': '161/32, Mooooo 10, Tanon Chaofa', 'type': 'Townhouse', 'stars': '3', 'name1': 'Таунхаус Офис12', 'name1_en': 'Townhouse Office', 'name2': 'Таунхаус Уютный дом', 'name2_en': 'Townhouse Cozy home', 'bedrooms': '2', 'bathrooms': '2', 'livingsize': '5', 'propertysize': '5', 'landsize': '5', 'pool': '5', 'tobeach': '5'}";
    var az_json7 = "{'id': '13', 'price_sale': '89000', 'code': 'CHA2TN22', 'code_id': '1394', 'area': 'Чалонг', 'area_en': 'Chalong', 'address': '161/32, Mooooo 10, Tanon Chaofa', 'type': 'Townhouse', 'stars': '3', 'bedrooms': '2', 'bathrooms': '2', 'livingsize': '5', 'propertysize': '5', 'landsize': '5', 'pool': '5', 'tobeach': '5', 'name1': 'Таунхаус Офис13'}, {'id': '14', 'price_sale': '89000', 'code': 'CHA2TN', 'code_id': '1394', 'area': 'Чалонг', 'area_en': 'Chalong', 'address': '161/32, Mooooo 10, Tanon Chaofa', 'type': 'Townhouse', 'stars': '3', 'name1': 'Таунхаус Офис14', 'name1_en': 'Townhouse Office', 'name2': 'Таунхаус Уютный дом', 'name2_en': 'Townhouse Cozy home', 'bedrooms': '2', 'bathrooms': '2', 'livingsize': '5', 'propertysize': '5', 'landsize': '5', 'pool': '5', 'tobeach': '5'}";
    var az_json8 = "{'id': '15', 'price_sale': '89000', 'code': 'CHA2TN22', 'code_id': '1394', 'area': 'Чалонг', 'area_en': 'Chalong', 'address': '161/32, Mooooo 10, Tanon Chaofa', 'type': 'Townhouse', 'stars': '3', 'bedrooms': '2', 'bathrooms': '2', 'livingsize': '5', 'propertysize': '5', 'landsize': '5', 'pool': '5', 'tobeach': '5', 'name1': 'Таунхаус Офис15'}, {'id': '16', 'price_sale': '89000', 'code': 'CHA2TN', 'code_id': '1394', 'area': 'Чалонг', 'area_en': 'Chalong', 'address': '161/32, Mooooo 10, Tanon Chaofa', 'type': 'Townhouse', 'stars': '3', 'name1': 'Таунхаус Офис16', 'name1_en': 'Townhouse Office', 'name2': 'Таунхаус Уютный дом', 'name2_en': 'Townhouse Cozy home', 'bedrooms': '2', 'bathrooms': '2', 'livingsize': '5', 'propertysize': '5', 'landsize': '5', 'pool': '5', 'tobeach': '5'}";
    
    var az_json = '([' + az_json1 + ','
                    + az_json2 + ','
                    + az_json3 + ','
                    + az_json4 + ','
                    + az_json5 + ','
                    + az_json6 + ','
                    + az_json7 + ','
                    + az_json8 +
                    '])';
                    // alert(az_json.length);
	var temp = eval(az_json);

    for(var i=0;i<temp.length; i++){
        temp[i].location = addresstocoordination(temp[i].area_en);
    }
    // alert(temp[10].location);
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
                alert('Данные успешно добавлены');
            }
        });
  		return false;
	});
    
    
    
});