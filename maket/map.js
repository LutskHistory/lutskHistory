// Создает обработчик события window.onLoad
var map = null;


YMaps.jQuery(function () {
	map = new YMaps.Map(YMaps.jQuery("#map")[0]);
	map.setCenter(new YMaps.GeoPoint(25.311073, 50.744059), 10);

	map.addControl(new YMaps.Zoom());
	//addPoint(25.311073, 50.745059, "name", "desc");

	var placemark1 = new YMaps.Placemark(new YMaps.GeoPoint(25.311073, 50.745059));
	YMaps.Events.observe(placemark1, placemark1.Events.Click, function (placemark1, e) {
   		alert("You are clicked on placemark!");
	});
	map.addOverlay(placemark1);


});

//Add point to the map
function addPoint(lng, lat, name, desc){
	var placemark = new YMaps.Placemark(new YMaps.GeoPoint(lng, lat));
	
	placemark.name = name;
	placemark.description = desc;
	placemark.setIconContent("place");

	map.addOverlay(placemark); 
}

function add(){
	var lng = document.getElementById("lng").value;
	var lat = document.getElementById("lat").value;
	var name = document.getElementById("name").value;
	var desc = document.getElementById("desc").value;
	addPoint(lng, lat, name, desc);
}