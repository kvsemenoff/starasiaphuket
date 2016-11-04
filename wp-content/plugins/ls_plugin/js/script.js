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
    
for(var i=0; i<az_json.length; i++){
    var temp_gps = az_json[i].gps.split(',');
    az_json[i].gps = (Number(temp_gps[0]) + ((Math.random() * 20 - 10)/1000)) + ',' 
                        + (Number(temp_gps[1]) + ((Math.random() * 20 - 10)/1000));
    
    // alert(temp_gps);
}
    // var temp = [az_json, az_json2];
    // alert(temp.name1);

    // for(var i=0;i<temp.length; i++){
    //     temp[i].location = addresstocoordination(temp[i].area_en);
    // }
    // alert(temp[10].location);
	$('.az-form').submit(function(){
		// alert($(this).attr('action'));
        var data = {
            action: 'axaj_puller',
            az_json: az_json,
            ls_database_url: $('.ls_database_url').val()
        };
		$.ajax({
            url: $(this).attr('action'),
            type: 'post',
            data: data,
            success: function (data) {
            	// var temp = eval(data);
                // alert(temp.asd);
                alert(data + 'Данные успешно добавлены');
            }
        });
  		return false;
	});
    
    
    
});