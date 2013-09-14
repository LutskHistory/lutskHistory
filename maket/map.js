var map = null;
var points = new Array();
var layerPointCache = Array();

// Create event handler window.onLoad
YMaps.jQuery(function () {
	map = new YMaps.Map(YMaps.jQuery("#map")[0]);
	map.setCenter(new YMaps.GeoPoint(25.311073, 50.744059), 10);
	map.addControl(new YMaps.Zoom());
});

//Add point to the map
function addPoint(id, lng, lat, name, desc, layerID){
	//create placemark and set property
	var placemark = new YMaps.Placemark(new YMaps.GeoPoint(lat, lng));
	placemark.name = name;
	placemark.description = desc;
	placemark.setIconContent("place");
	placemark.id = id;
	placemark.layerID = layerID;

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
        	posts = JSON.parse(data);
        	for (i = 0; i < posts.length; i++){
        		var post = "";
        		for (var field in posts[i]){
        			post += field + " - ";
        		}
        		$("div#content").append("<p>" + post + "</p>");
        		alert(post);
        	}
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

//Get map layer
function getLayers(){
	$.ajax({
        url: "http://lutskhistory.dev/index.php/layers/get",
        type: "get",
        data: "",
        success: function(data){
        	layers = JSON.parse(data);
        	for (i = 0; i < layers.length; i++){
        		layer = '<input type="checkbox" id="' + layers[i].id + '" class="layerCheckBox" onClick="getLayerPoints(' + layers[i].id + ')">'+ layers[i].name + '<br />';
        		$('div#map-control-panel').append(layer);
        	}
        },
        error:function(){
            alert("failure");

        }
    });

}

//Get points of layer
function getLayerPoints(layerID){
	if ($('input.layerCheckBox#' + layerID).attr('checked')){

		for (i = 0; i < layerPointCache.length; i++){
			if (layerPointCache[i] == layerID){
				for(var id in points){
					if (points[id].layerID == layerID)
						map.addOverlay(points[id]);
				}
				return;
			}
		}


		var data = {id : layerID};
		$.ajax({
	        url: "http://lutskhistory.dev/index.php/layers/getPoints",
	        type: "get",
	        data: data,
	        success: function(data){
	        	mapPoints = JSON.parse(data);
	        	for (i = 0; i < mapPoints.length; i++){
	        		addPoint(mapPoints[i].id, mapPoints[i].lng, mapPoints[i].lat, mapPoints[i].name, mapPoints[i].description, layerID);
	        	}
	        	layerPointCache.push(layerID);
	        },

	        error:function(data, data1, data2){
	            alert("failure");
	        }
	    });
	}

	else{
		for (i = 0; i < points.length; i++) {
			if (points[i].layerID == layerID){
				map.removeOverlay(points[i]);
			}
		};

	}

}