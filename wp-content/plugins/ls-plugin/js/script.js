$(document).ready(function(){
	var az_json = "([{'id': '1', 'az_az2': 'CHA2TN'}, {'id': '2', 'az_az2': 'CHA2TN2'}])";//, 'code_id': '1394', 'area': 'Чалонг', 'area_en': 'Chalong', 'address': '161/32, Mooooo 10, Tanon Chaofa', 'type': 'Townhouse', 'stars': '3', 'name1': 'Таунхаус \"Офис\"', 'name1_en': 'Townhouse \"Office\"', 'name2': 'Таунхаус \"Уютный дом\"', 'name2_en': 'Townhouse \"Cozy home\"', 'bedrooms': '2', 'bathrooms': '2', 'livingsize': '5', 'propertysize': '5', 'landsize': '5', 'pool': '5', 'tobeach': '5'})";
	var temp = eval(az_json);
	// alert(temp[1].id);
	$('.az-form').submit(function(){
		// alert($(this).attr('action'));
        var data = {
            action: 'axaj_puller',
            az_json: temp
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