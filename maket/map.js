var map = null; //map handler
var points = new Array(); //downloaded points
var layerPointCache = Array(); //layers for which download points
var layers = Array(); //downloaded layers

//init ymap
ymaps.ready(function () {
    map = new ymaps.Map("map", {
        center: [50.744059, 25.311073],
        zoom: 10
     });
});

//Add point to the map
function addPoint(id, lng, lat, name, desc, layerID) {
    //create placemark and set property
	var placemark = new ymaps.Placemark([lng, lat], {}, {preset: findLayer(layerID).icon, balloonContentLayout: createBaloon(name, desc, "")});

	placemark.name = name;
	placemark.description = desc;
	placemark.id = id;
	placemark.layerID = layerID;

	//set  callback function to placemark
	placemark.events.add('click', placemarkCallback);

	//save and display placemark
	points.push(placemark);
	map.geoObjects.add(placemark); 
}

//TODO fine html
//baloon constructor
function createBaloon(title, desc, img){
	html = '<h1>' + title + '</h3>' + '<p>' + desc + '</p>';
	return ymaps.templateLayoutFactory.createClass(html);
}

//TODO link to post
//Placemark callback function
function placemarkCallback(e){
	$('div.post').css('display', 'none');
	$.ajax({
        url: "http://lutskhistory.dev/index.php/points/getPointPosts",
        type: "get",
        data: {id : e.get('target').id},
        success: function(data){
        	posts = JSON.parse(data);
        	for (var i in posts){
        		postHTML = '<div class="post">\
					        <div class="postTitle">' + posts[i].title + '</div>\
					        <div class="postDescWrap">\
					        <img src="' + posts[i].image + '" height="128" width="128" class="postImg" />\
					        <div class="postDesc">' + posts[i].text + '</div>\
					        </div>\
					        <div class="postMeta">\
					        	<div class="postAuthor">' + posts[i].name + '</div>\
					            <div class="postViews">Переглядів: ' + posts[i].views + '</div>\
					            <div class="postLike">+' + posts[i].like + '</div>\
					            <div class="postDislike">-' + posts[i].dislike + '</div>\
					            <div class="postReadMore"><a href="#">Читати повністю...</a></div>\
					        </div>';
        		
        		$("div#content").append(postHTML);
        	}
        },
        error:function(data, data1, data2){
            alert("failure");

        }
    });
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

//find layer by layerID
function findLayer(layerID){
    for (var i in layers) {
        if (layers[i].id == layerID) return layers[i];
    }
}

//Get points of layer
function getLayerPoints(layerID) {
	if ($('input.layerCheckBox#' + layerID).attr('checked')) {
        
        if (layerPointCache.indexOf(layerID) > -1) {
            for(var i in points){
                if (points[i].layerID == layerID)
                    map.geoObjects.add(points[i]);
                }
			return;
        }

		$.ajax({
	        url: "http://lutskhistory.dev/index.php/layers/getPoints",
	        type: "get",
	        data: {id : layerID},
	        success: function(data){
	        	mapPoints = JSON.parse(data);
	        	for (var i in mapPoints){
	        		addPoint(mapPoints[i].id, mapPoints[i].lng, mapPoints[i].lat, mapPoints[i].name, mapPoints[i].description, layerID);
	        	}
	        	layerPointCache.push(layerID);
	        },
	        error:function(data, data1, data2){
	            alert("failure");
	        }
	    });
	}
	else {
		for (i in points) {
			if (points[i].layerID == layerID) {
				map.geoObjects.remove(points[i]);
			}
		};
	}
}