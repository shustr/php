$(document).ready(function(){

function populate() {

	if($('#region').val() == '123' || $('#region').val() == '125') // code reserved for regions that have no districts
    {
       $('#district_drop_down').hide();
       $('#no_district_drop_down').show();
    } else {
       fetch.doPost('getDistricts.php');
	}
}

$('#region').change(populate);

var fetch = function() {
		
var districts = $('#district');
return {
	doPost: function(src) {

    $('#loading_district_drop_down').show(); // Show the Loading...
    $('#district_drop_down').hide(); // Hide the drop down
    $('#no_district_drop_down').hide(); // Hide the "no districts" message (if it's the case)


		if (src) $.post(src, { region_id: $('#region').val() }, this.getDistricts);
		else throw new Error('No SRC was passed to getDistricts!');
	},
			
	getDistricts: function(results) {
		if (!results) return;
		districts.html(results);

	$('#loading_district_drop_down').hide(); // Hide the Loading...
	$('#district_drop_down').show(); // Show the drop down
	}	
}
}();

populate();

});