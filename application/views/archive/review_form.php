<?php $this->load->view('header',array('title'=>'Review'));?>
<div class="sixteen columns add-top add-bottom">
	<div class="doc-section clearfix" id="grid">				
		<div class="example-grid">							
<?php 


$this->load->helper('form');


if(isset($error)){
echo $error;
}
echo validation_errors();
$hidden = array('hidden_name'	=>	'',
				'hidden_address'	=>	'',
				'hidden_website'	=>	'',
				'hidden_rating'	=>	'',
				'hidden_phone'	=>	''
				);
$attributes = array('name' => 'review_form', 'id' => 'review_form');
echo form_open_multipart('review/cafe',$attributes,$hidden);
?>
<div class="sixteen columns alpha center">
<select class="ten columns offset-by-one alpha" name="places" id="places" style="font-size: 16px !important; width: 100%;" onchange="setPlace()"></select>

<?php

/*
* Submit Button
*/
$data = array(
	'name'=>'submit',
	'value'=>'Review',
	'onclick'=>'setPlace()',
	'style'=> "margin: 0;",
	'class'=>"four columns omega"
);
echo form_submit($data);
echo form_close("</div>");
?>


<?php
$data = array(
              'name'        => 'searchTextField',
              'id'          => 'searchTextField',
              'value'       => '',
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:100%',
              'class'		=>	'sixteen columns center',
              'placeholder'	=> 'search'
            );

echo form_input($data);
?>
<div class="fourteen columns offset-by-one square add-bottom alpha" style="height: 250px;">
<div id="map" class="square" style="height: 100%"></div>
</div>
<div class="sixteen columns center">
<?php

$attributes = array('name' => 'add_form', 'id' => 'add_form');
$hidden = array(
				'hidden_lat'	=>	'',
				'hidden_lng'	=>	'',
				'hidden_reference'	=>	''
				);
echo form_open_multipart('review/add',$attributes,$hidden);
$data = array(
              'name'        => 'add_name',
              'id'          => 'add_name',
              'placeholder'=>'New Place Name'
            );
	?>
<div class="four columns offset-by-four alpha"><?=form_input($data);?></div>
<div class="four columns omega"><?=form_submit('add_place','Add New Place');?>
<?=form_close("</div></div></div></div>")?>


<script>
var map=null;
var service=null;
var infowindow=null;
var markersArray = [];

var queryString = '';
var searchText = false;
var defaultBounds;
var searchInput;
var searchBox;

function initialize(){
if (navigator.geolocation)
     {
		this.map = new google.maps.Map(document.getElementById('map'), {
				  mapTypeId: google.maps.MapTypeId.ROADMAP,
				  zoom: 15	
		    		});

		this.service = new google.maps.places.PlacesService(map);
		
		this.searchInput = document.getElementById('searchTextField');
		
		this.searchBox = new google.maps.places.SearchBox(this.searchInput);
		this.searchBox.bindTo('bounds', map);
		
		google.maps.event.addListener(searchBox, 'places_changed', function callback_text(){
			var results = searchBox.getPlaces();
			clearOverlays();
			document.getElementById('places').options.length = 0;
			for (var i = 0; i < results.length; i++) {
				if(i<11){
				  var place = results[i];
				  createMarker(results[i]);
				  
					AddItem(place.name,place.reference);
					
				  }
		    }
			
		});
		
	     navigator.geolocation.getCurrentPosition(parsePosition);
     }
   else{
  	 alert('Location Services Unavailable');
  	 }
 }


function setPlace(){
	var places = document.getElementById('places');
	var p = (places.options[places.selectedIndex].value);
	
	var request = { reference: p };
    service.getDetails(request, getDetails);
}

function getDetails(details, status) {
        hidden_name=document.getElementsByName('hidden_name');
        hidden_address=document.getElementsByName('hidden_address');
        hidden_website=document.getElementsByName('hidden_website');
        hidden_rating=document.getElementsByName('hidden_rating');
        hidden_phone=document.getElementsByName('hidden_phone');
        hidden_reference=document.getElementsByName('hidden_reference');
        
        hidden_name[0].value = details.name;
        hidden_address[0].value = details.formatted_address;
        hidden_website[0].value = details.website;
        hidden_rating[0].value = details.rating;
        hidden_phone[0].value = details.formatted_phone_number;
        hidden_reference[0].value = details.reference;
    }

function clearOverlays() {

  for (var i = 0; i < markersArray.length; i++ ) {
    markersArray[i].setMap(null);
  }
}

 function parsePosition(position){
   	var lat = position.coords.latitude;
   	var lng = position.coords.longitude;
   	   	 var marker = new google.maps.Marker({
           map: map,
           position: new google.maps.LatLng(lat,lng),
           setZIndex: 9999,
            icon: {
				     path: google.maps.SymbolPath.CIRCLE,
				     scale: 3,
				     strokeColor: "blue"
				   }
         });
  
	hidden_lat=document.getElementsByName('hidden_lat');   
	hidden_lng=document.getElementsByName('hidden_lng');   
    hidden_lat[0].value = lat;
	hidden_lng[0].value = lng;
	
	updatePosition(lat,lng);
	 

 }
  
 function updatePosition(latitude,longitude)
   {
   		places = document.getElementById('places');
   		places.options.length = 0;
   		
  		var pyrmont = new google.maps.LatLng(latitude,longitude);
  		
		this.map.setCenter(pyrmont);

	
		  infowindow = new google.maps.InfoWindow();
		  if(!this.searchText || queryString==''){
		  	
		  	var request = {
			    location: pyrmont,
			    keyword: 'coffee',
			    rankBy: google.maps.places.RankBy.DISTANCE
			  };
			this.service.nearbySearch(request, callback);
		  }else{
		  	var request = {
			    location: pyrmont,
			    query: this.queryString,
			    rankBy: google.maps.places.RankBy.DISTANCE
			  };
			this.service.textSearch(request,callback); 
		  }
}

function searchText(query){
	this.queryString = query;
	this.searchText = true;
	navigator.geolocation.getCurrentPosition(parsePosition);
}

function callback_text(){
	var places = this.searchBox.getPlaces();
	clearOverlays();
	for (var i = 0; i < places.length; i++) {
      var place = results[i];
      createMarker(results[i]);
      if(i<11){
      	AddItem(place.name,place.reference);
      	bounds.extend(place.geometry.location);
      }
    }
	map.fitBounds(bounds);
	setPlace();


}
function callback(results, status) {
  	if (status == google.maps.places.PlacesServiceStatus.OK) {
	  	clearOverlays();
	  	var results_array;
	  	$.ajax({
	  		type:"POST",
    		async:false,
    		url:'/review/getLocalPlaces',
   			data: {
   				'maxRows': 5,
   				'lat': map.center.lat(),
   				'lng': map.center.lng(),
   				'radius_m': 100,
   				'json': true
   			},
   			success: function(res){
   				results_array = jQuery.parseJSON(res);
   				
   			}
   		});
   		for (var i = 0; i < results_array.length; i++) {
					if(i<11){
			     		var place = results_array[i];
			     		loc = new google.maps.LatLng(place.Latitude,place.Longitude);
			      		createMarker(place, loc);
			      		AddItem(place.Name,place.Google_Places_Reference);
			    		}
				}
	    for (var i = 0; i < results.length; i++) {
			if(i<11){
	     		var place = results[i];
	      		createMarker(results[i]);
	      		AddItem(place.name,place.reference);
	    		}
		}
	}
}

function createMarker(place, loc) {
        var placeLoc = null;
        if(loc==null){
        		placeLoc = place.geometry.location;
        }else{
        		placeLoc = loc;
        }
        var marker = null;
        if(loc!=null){
        		marker = new google.maps.Marker({
        			map: map,
        			position: placeLoc,
        			title: place.Name
        		})
        }else{
	        marker = new google.maps.Marker({
	          map: map,
	          position: placeLoc,
	          title: place.name
	        });
        }
        google.maps.event.addListener(marker, 'click', function() {
          if (typeof place.name === 'undefined') {
			    infowindow.setContent(place.Name);
			}else{
				infowindow.setContent(place.name);
			}
          infowindow.open(map, this);
          
          updatePosition(placeLoc.lat(),placeLoc.lng());
        });
        markersArray.push(marker);
      }

function AddItem(Text,Value)
    {
         
        var opt = document.createElement("option");
        
        
        document.getElementById("places").options.add(opt);
        
        opt.text = Text;
        opt.value = Value;
               
    }
 </script>

<?php $this->load->view('footer');?>