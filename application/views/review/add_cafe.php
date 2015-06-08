<form id="submit_form">
	<legend>
	  <h2>Submit a Cafe</h2>
	</legend>
	<div class="form-group">
	  	<label for="cafe_name">Cafe Name
	  		<input type="text" class="form-control" id="cafe_name" required>
		</label>
		<label for="cafe_chain">Chain
		<select id="cafe_chain" class="form-control">
				<option value="NULL">Not a Chain</option>
			<?php foreach ($chains as $c) {?>
				<option value="<?=$c->ID;?>"><?=$c->Name;?></option>
			<?php } ?>
		</select>
		</label>
		<label for="cafe_region">Region
		<select id="cafe_region" class="form-control" required>
				<option data-lat="NULL" data-lon="NULL" value="NULL">Select Region</option>
			<?php foreach ($regions as $r) {?>
				<option data-lat="<?=$r->Center_Latitude?>" data-lon="<?=$r->Center_Longitude?>" value="<?=$r->ID;?>"><?=$r->Name;?></option>
			<?php } ?>
		</select>
		</label>
		<label for="cafe_address">Address
			<input type="text" class="form-control" id="cafe_address" required>
		</label>
	</div>
	<legend>
		GPS Position
	</legend>
	<div class="form-group">
		<div class="checkbox">
	    <label>
	      <input type="checkbox" id="use_my_lat_long"> Use My Location
	    </label>
	  </div>
	</div>
	<div class="form-group">
	  <label for="cafe_address">Latitude</label>
	  <input type="text" class="form-control" id="cafe_latitude" required>
	</div>
	<div class="form-group">
	  <label for="cafe_address">Longitude</label>
	  <input type="text" class="form-control" id="cafe_longitude" required>
	  <script>
	  	$( document ).ready(function(){
		  	$("#use_my_lat_long").click(function() {
		  		if(this.checked){
		  			var lat = $("#latitude").text();
				    $("#cafe_latitude").val(lat);
				    var lon = $("#longitude").text();
				    $("#cafe_longitude").val(lon);
		  		}else{
			  		var regopt = $("#cafe_region").find(":selected");
			  		if(regopt.data("lat")!="NULL"){
						var lat = regopt.data("lat");
						$("#cafe_latitude").val(lat);
						var lon = regopt.data("lon");
						$("#cafe_longitude").val(lon);
					}
		  		}
			    $("#cafe_latitude").attr("disabled",(this.checked));
			    $("#cafe_longitude").attr("disabled",(this.checked));
			    update_test_link();

			});
		
			var update_test_link = function(){
				var href = "http://maps.google.com/?q=";
				href = href + $("#cafe_name").val()+",%20";
				href = href + $("#cafe_address").val()+"%20";
				href = href + "near%20";
				href = href + $("#cafe_latitude").val();
				href = href + ",";
				href = href + $("#cafe_longitude").val();
				$("#map_test").attr("href", href);
			}
			var lastValue = '';
			$("#cafe_name, #cafe_address, #cafe_latitude, #cafe_longitude").on("change keyup paste mouseup",function() {
				if ($(this).val() != lastValue) {
				    lastValue = $(this).val();
				    update_test_link();
				}
				
			});
			$('#cafe_region').change(function() {
			 	if(!$("#use_my_lat_long").prop("checked")){
			 		
				 	var regopt = $(this).find(":selected");
					var lat = regopt.data("lat");
					$("#cafe_latitude").val(lat);
					var lon = regopt.data("lon");
					$("#cafe_longitude").val(lon);
					update_test_link();
				}
			});
		});
	  </script>
	</div>
	<div class="form-group">
		<h3>
        	<a id="map_test" target="_blank" href="" style="padding:3px;color:black;margin-right:15px;border:1px solid #DDD;border-radius:5px;background-color:transparent;" class="btn">
        		<span class="glyphicon glyphicon-globe"></span> Test Map Link
        	</a>
    	</h3>
	</div>
	<legend>Cafe Hours</legend>
	<div class="form-group">
	  <label for="mon_open">
		Monday Open
	  	<input type="time" class="form-control" id="mon_open" placeholder="Monday Open" required>
	  </label>
	  <label for="mon_close">
		Monday Close
	  	<input type="time" class="form-control" id="mon_close" placeholder="Monday Close" required>
	  </label>
	  <br />
	  <label for="tue_open">
		Tuesday Open
	  	<input type="time" class="form-control" id="tue_open" placeholder="Tuesday Open" required>
	  </label>
	  <label for="tue_close">
		Tuesday Close
	  	<input type="time" class="form-control" id="tue_close" placeholder="Tuesday Close" required>
	  </label>
	  
	    <label>
	      <input type="checkbox" id="repeat_hours_tue"> Same as Above
	    </label>

	  <script>
	  	$( document ).ready(function(){
	  		$( document ).on("click", "#repeat_hours_tue",function(e){
				$("#tue_open").attr("disabled",(this.checked));
		    	$("#tue_close").attr("disabled",(this.checked));
	    		if(this.checked){
		    		$("#tue_open").val($("#mon_open").val());
		    		$("#tue_close").val($("#mon_close").val());
	    		}
    		});
    	});
	  </script>
	  <br />
	  <label for="wed_open">
		Wednesday Open
	  	<input type="time" class="form-control" id="wed_open" placeholder="Wednesday Open" required>
	  </label>
	  <label for="wed_close">
		Wednesday Close
	  	<input type="time" class="form-control" id="wed_close" placeholder="Wednesday Close" required>
	  </label>
	    <label>
	      <input type="checkbox" id="repeat_hours_wed"> Same as Above
	    </label>
	  <script>
	  	$( document ).ready(function(){
	  		$( document ).on("click", "#repeat_hours_wed",function(e){
    			$("#wed_open").attr("disabled",(this.checked));
	    		$("#wed_close").attr("disabled",(this.checked));
	    		if(this.checked){
		    		$("#wed_open").val($("#tue_open").val());
		    		$("#wed_close").val($("#tue_close").val());
	    		}
    		});
    	});
	  </script>
	  <br />
	  <label for="thu_open">
		Thursday Open
	  	<input type="time" class="form-control" id="thu_open" placeholder="Thursday Open" required>
	  </label>
	  <label for="thu_close">
		Thursday Close
	  	<input type="time" class="form-control" id="thu_close" placeholder="Thursday Close" required>
	  </label>
	    <label>
	      <input type="checkbox" id="repeat_hours_thu"> Same as Above
	    </label>
	  <script>
	  	$( document ).ready(function(){
	  		$( document ).on("click", "#repeat_hours_thu",function(e){
	    		$("#thu_open").attr("disabled",(this.checked));
	    		$("#thu_close").attr("disabled",(this.checked));
	    		if(this.checked){
		    		$("#thu_open").val($("#wed_open").val());
		    		$("#thu_close").val($("#wed_close").val());
	    		}
    		});
    	});
	  </script>
	  <br />
	  <label for="fri_open">
		Friday Open
	  	<input type="time" class="form-control" id="fri_open" placeholder="Friday Open" required>
	  </label>
	  <label for="fri_close">
		Friday Close
	  	<input type="time" class="form-control" id="fri_close" placeholder="Friday Close" required>
	  </label>
	    <label>
	      <input type="checkbox" id="repeat_hours_fri"> Same as Above
	    </label>
	  <br />
	  <script>
	  	$( document ).ready(function(){
	  		$( document ).on("click", "#repeat_hours_fri",function(e){
	  			$("#fri_open").attr("disabled",(this.checked));
		    	$("#fri_close").attr("disabled",(this.checked));
	    		if(this.checked){
		    		$("#fri_open").val($("#thu_open").val());
		    		$("#fri_close").val($("#thu_close").val());
	    		}
    		});
    	});
	  </script>
	  <label for="sat_open">
		Saturday Open
	  	<input type="time" class="form-control" id="sat_open" placeholder="Saturday Open" required>
	  </label>
	  <label for="sat_close">
		Saturday Close
	  	<input type="time" class="form-control" id="sat_close" placeholder="Saturday Close" required>
	  </label>
	    <label>
	      <input type="checkbox" id="repeat_hours_sat"> Same as Above
	    </label>
	  <script>
	  	$( document ).ready(function(){
	  		$( document ).on("click", "#repeat_hours_sat",function(e){
	  			$("#sat_open").attr("disabled",(this.checked));
		    	$("#sat_close").attr("disabled",(this.checked));
	  			if(this.checked){
		    		$("#sat_open").val($("#fri_open").val());
		    		$("#sat_close").val($("#fri_close").val());
	    		}
    		});
    	});
	  </script>
	  <br />
	  <label for="sun_open">
		Sunday Open
	  	<input type="time" class="form-control" id="sun_open" placeholder="Sunday Open" required>
	  </label>
	  <label for="sun_close">
		Sunday Close
	  	<input type="time" class="form-control" id="sun_close" placeholder="Sunday Close" required>
	  </label>
	    <label>
	      <input type="checkbox" id="repeat_hours_sun"> Same as Above
	    </label>
	  <script>
	  	$( document ).ready(function(){
	  		$( document ).on("click", "#repeat_hours_sun",function(e){
	    		$("#sun_open").attr("disabled",(this.checked));
		    	$("#sun_close").attr("disabled",(this.checked));
	    		if(this.checked){
		    		$("#sun_open").val($("#sat_open").val());
		    		$("#sun_close").val($("#sat_close").val());
	    		}
    		});
    	});
	  </script>
	</div>
	<legend>Cafe Rating</legend>
	<div class="form-group">
          <input style="margin-left:25px;" type="radio" name="newcafe_review_radio" id="newcafe_review_threestar" value="3" required>
          <label class="radio-inline"><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span> Three Star
          </label>
	</div>
    <div class="form-group">
          <input style="margin-left:25px;" type="radio" name="newcafe_review_radio" id="newcafe_review_twostar" value="2">
          <label class="radio-inline" ><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span> Two Star
          </label>
    </div>   
    <div class="form-group">
          <input style="margin-left:25px;" type="radio" name="newcafe_review_radio" id="newcafe_review_onestar" value="1">
          <label class="radio-inline" ><span class="glyphicon glyphicon-star"></span> One Star
          </label>
    </div>
    <div class="form-group">
          <input style="margin-left:25px;" type="radio" name="newcafe_review_radio" id="newcafe_review_HM" value="0">
          <label class="radio-inline" >HM
          </label>
    </div>
    <div class="form-group">
          <input style="margin-left:25px;" type="radio" name="newcafe_review_radio" id="newcafe_review_blackstar" value="-1">
          <label class="radio-inline" ><span class="glyphicon glyphicon-star-empty"></span> Black Star
          </label>
    </div>
    <div class="form-group">
            <textarea class="form-control" placeholder="Optional Comments" id="newcafe_review_comments"></textarea>
    </div>
	<button type="submit" class="btn btn-default">Submit</button>
</form>
<script>
$( document ).ready(function(){
	var validate = function(){
		var region = $("#cafe_region").val();
		if(region=="NULL"){
			return {success:false,message:"Please select a region"};
		}
		
		var cafe_latitude = $("#cafe_latitude").val();
		var cafe_longitude = $("#cafe_longitude").val();
		
		if(!isNumber(cafe_latitude)||!isNumber(cafe_longitude)){
			return {success:false,message:"Invalid Lat/Long values"};
		}else{
			return {success:true,message:"Form Completed"};
		}
	}
	function isNumber(n) {
	  return !isNaN(parseFloat(n)) && isFinite(n);
	}
$( document ).on("submit", "#submit_form",function(e){
	
    	e.preventDefault();
    	var result = validate();
    	console.log(result);
    	if(result["success"]==false){
    		alert(result["message"]);
    		return false;
    	}
    	var cafe_name = $("#cafe_name").val();
    	var cafe_chain = $("#cafe_chain").val();
    	var cafe_region = $("#cafe_region").val();
    	var cafe_address = $("#cafe_address").val();
    	var cafe_latitude = $("#cafe_latitude").val();
    	var cafe_longitude = $("#cafe_longitude").val();
    	var cafe_rating = $("input[name='newcafe_review_radio']:checked").val();

    	var cafe_mon_open = $("#mon_open").val();
    	var cafe_tue_open = $("#tue_open").val();
    	var cafe_wed_open = $("#wed_open").val();
    	var cafe_thu_open = $("#thu_open").val();
    	var cafe_fri_open = $("#fri_open").val();
    	var cafe_sat_open = $("#sat_open").val();
    	var cafe_sun_open = $("#sun_open").val();
    	
    	var cafe_mon_close = $("#mon_close").val();
    	var cafe_tue_close = $("#tue_close").val();
    	var cafe_wed_close = $("#wed_close").val();
    	var cafe_thu_close = $("#thu_close").val();
    	var cafe_fri_close = $("#fri_close").val();
    	var cafe_sat_close = $("#sat_close").val();
    	var cafe_sun_close = $("#sun_close").val();

    	var cafe_rating_comments = $("#newcafe_review_comments").val();

    	$.ajax({
    		type: "POST",
    		dataType: "html",
    		url: "<?=base_url('welcome/submit')?>",
    		data: {
    			cafe_name: cafe_name,
    			cafe_chain: cafe_chain,
    			cafe_region: cafe_region,
    			cafe_address: cafe_address,
    			cafe_latitude: cafe_latitude,
    			cafe_longitude: cafe_longitude,
    			cafe_rating: cafe_rating,
    			cafe_rating_comments: cafe_rating_comments,
    			
    			cafe_mon_open: cafe_mon_open,
    			cafe_tue_open: cafe_tue_open,
    			cafe_wed_open: cafe_wed_open,
    			cafe_thu_open: cafe_thu_open,
    			cafe_fri_open: cafe_fri_open,
    			cafe_sat_open: cafe_sat_open,
    			cafe_sun_open: cafe_sun_open,
    			
    			cafe_mon_close: cafe_mon_close,
    			cafe_tue_close: cafe_tue_close,
    			cafe_wed_close: cafe_wed_close,
    			cafe_thu_close: cafe_thu_close,
    			cafe_fri_close: cafe_fri_close,
    			cafe_sat_close: cafe_sat_close,
    			cafe_sun_close: cafe_sun_close
    		},
    		success: function(data){
    			//location.reload();
    			//$('#submit_form')[0].reset();
    			//$('.submit_form').collapse('hide');
    		}
    	});
    });
});
</script>