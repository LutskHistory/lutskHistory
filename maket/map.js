var map = null;
var points = new Array();

// Create event handler window.onLoad
YMaps.jQuery(function () {
	map = new YMaps.Map(YMaps.jQuery("#map")[0]);
	map.setCenter(new YMaps.GeoPoint(25.311073, 50.744059), 10);
	map.addControl(new YMaps.Zoom());
});

//Add point to the map
function addPoint(lng, lat, name, desc){
	//create placemark and set property
	var placemark = new YMaps.Placemark(new YMaps.GeoPoint(lng, lat));
	placemark.name = name;
	placemark.description = desc;
	placemark.setIconContent("place");
	placemark.id = points.length;

	//set  callback function to placemark
	YMaps.Events.observe(placemark, placemark.Events.Click, placemarkCallback);

	//save and display placemark
	points.push(placemark);
	map.addOverlay(placemark); 
}

//Placemark callback function
function placemarkCallback(placemark, e){
	var data = {id : placemark.id.toString()};
	$.ajax({
        url: "http://lutskhistory.dev/index.php/points/getPointPosts",
        type: "get",
        data: data,
        success: function(data){
            alert(data);
            
        },
        error:function(){
            alert("failure");

        }
    });
}

function add(){
	var lng = document.getElementById("lng").value;
	var lat = document.getElementById("lat").value;
	var name = document.getElementById("name").value;
	var desc = document.getElementById("desc").value;
	addPoint(lng, lat, name, desc);
}