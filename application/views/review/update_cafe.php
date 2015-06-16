<form id="update_form_<?=$cafe->ID?>">
	<legend>
	  <h2>Update <?=$cafe->Name?></h2>
	</legend>
	<div class="form-group">
	  	<label for="cafe_name_<?=$cafe->ID?>">Cafe Name
	  		<input type="text" class="form-control" id="cafe_name_<?=$cafe->ID?>" value="<?=$cafe->Name?>" required>
		</label>
		<label for="cafe_chain">Chain
		<select id="cafe_chain_<?=$cafe->ID?>" class="form-control" onchange='NewChain_<?=$cafe->ID?>(this.value);'>
				<option value="NULL">Not a Chain</option>
				<option value="NEW">New Chain</option>
				<option disabled>──────────</option>
			<?php
				
				usort($chains,"comp_name");
				foreach ($chains as $c) {?>
				<option value="<?=$c->ID;?>" <?=$c->ID==$cafe->ChainID?"selected":""?> ><?=$c->Name;?></option>
			<?php } ?>
				
		</select>
		<input type="text" id="cafe_chain_new_<?=$cafe->ID?>" name="cafe_chain_new_<?=$cafe->ID?>" style="display:none;" placeholder="New Chain Name" />
		<script type="text/javascript">
			function NewChain_<?=$cafe->ID?>(val){
			 var element=document.getElementById('cafe_chain_new_<?=$cafe->ID?>');
			 if(val=='NEW')
			   element.style.display='block';
			 else  
			   element.style.display='none';
			}
			
			</script> 
		</label>
		<label for="cafe_region_<?=$cafe->ID?>">Region
		<select id="cafe_region_<?=$cafe->ID?>" class="form-control" required>
				<option data-lat="NULL" data-lon="NULL" value="NULL">Select Region</option>
			<?php foreach ($regions as $r) {?>
				<option data-lat="<?=$r->Center_Latitude?>" data-lon="<?=$r->Center_Longitude?>" value="<?=$r->ID;?>"  <?=$r->ID==$cafe->RegionID?"selected":""?> ><?=$r->Name;?></option>
			<?php } ?>
		</select>
		</label>
		<label for="cafe_address_<?=$cafe->ID?>">Address
			<input type="text" class="form-control" id="cafe_address_<?=$cafe->ID?>" value="<?=$cafe->Address?>" required>
		</label>
	</div>
	<legend>
		GPS Position
	</legend>
	<div class="form-group">
		<div class="checkbox">
	    <label>
	      <input type="checkbox" id="use_my_lat_long_<?=$cafe->ID?>"> Use My Location
	    </label>
	  </div>
	</div>
	<div class="form-group">
	  <label for="cafe_latitude_<?=$cafe->ID?>">Latitude</label>
	  <input type="text" class="form-control" id="cafe_latitude_<?=$cafe->ID?>" value="<?=$cafe->Latitude?>" required>
	</div>
	<div class="form-group">
	  <label for="cafe_longitude_<?=$cafe->ID?>">Longitude</label>
	  <input type="text" class="form-control" id="cafe_longitude_<?=$cafe->ID?>" value="<?=$cafe->Longitude?>" required>
	  <script>
	  	$( document ).ready(function(){
		  	$("#use_my_lat_long_<?=$cafe->ID?>").click(function() {
		  		if(this.checked){
		  			var lat = $("#latitude").text();
				    $("#cafe_latitude_<?=$cafe->ID?>").val(lat);
				    var lon = $("#longitude").text();
				    $("#cafe_longitude_<?=$cafe->ID?>").val(lon);
		  		}else{
			  		var regopt = $("#cafe_region_<?=$cafe->ID?>").find(":selected");
			  		if(regopt.data("lat")!="NULL"){
						var lat = regopt.data("lat");
						$("#cafe_latitude_<?=$cafe->ID?>").val(lat);
						var lon = regopt.data("lon");
						$("#cafe_longitude_<?=$cafe->ID?>").val(lon);
					}
		  		}
			    $("#cafe_latitude_<?=$cafe->ID?>").attr("disabled",(this.checked));
			    $("#cafe_longitude_<?=$cafe->ID?>").attr("disabled",(this.checked));
			    update_test_link_<?=$cafe->ID?>();

			});
		
			var update_test_link_<?=$cafe->ID?> = function(){
				var href = "http://maps.google.com/?q=";
				href = href + $("#cafe_name_<?=$cafe->ID?>").val()+",%20";
				href = href + $("#cafe_address_<?=$cafe->ID?>").val();
				$("#map_test_<?=$cafe->ID?>").attr("href", href);
			}
			var lastValue = '';
			$("#cafe_name_<?=$cafe->ID?>, #cafe_address_<?=$cafe->ID?>, #cafe_latitude_<?=$cafe->ID?>, #cafe_longitude_<?=$cafe->ID?>").on("change keyup paste mouseup",function() {
				if ($(this).val() != lastValue) {
				    lastValue = $(this).val();
				    update_test_link_<?=$cafe->ID?>();
				}
				
			});
			$('#cafe_region_<?=$cafe->ID?>').change(function() {
			 	if(!$("#use_my_lat_long_<?=$cafe->ID?>").prop("checked")){
			 		
				 	var regopt = $(this).find(":selected");
					var lat = regopt.data("lat");
					$("#cafe_latitude_<?=$cafe->ID?>").val(lat);
					var lon = regopt.data("lon");
					$("#cafe_longitude_<?=$cafe->ID?>").val(lon);
					update_test_link_<?=$cafe->ID?>();
				}
			});
		});
	  </script>
	</div>
	<div class="form-group">
		<h3>
        	<a id="map_test_<?=$cafe->ID?>" target="_blank" href="http://maps.google.com/?q=<?=$cafe->Name?>,%20<?=$cafe->Address?>"
        	style="padding:3px;color:black;margin-right:15px;border:1px solid #DDD;border-radius:5px;background-color:transparent;" class="btn">
        		<span class="glyphicon glyphicon-globe"></span> Test Map Link
        	</a>
    	</h3>
	</div>
	<legend>Cafe Hours</legend>
	<div class="form-group">
	  <label for="mon_open_<?=$cafe->ID?>">
		Monday Open
	  	<input type="time" class="form-control" id="mon_open_<?=$cafe->ID?>" name="mon_open_<?=$cafe->ID?>" placeholder="Monday Open" value="<?=date("H:i", strtotime($cafe->Monday_Open))?>" required>
	  </label>
	  <label for="mon_close_<?=$cafe->ID?>">
		Monday Close
	  	<input type="time" class="form-control" id="mon_close_<?=$cafe->ID?>" placeholder="Monday Close" value="<?=date("H:i", strtotime($cafe->Monday_Close))?>" required>
	  </label>
	  <br />
	  <label for="tue_open_<?=$cafe->ID?>">
		Tuesday Open
	  	<input type="time" class="form-control" id="tue_open_<?=$cafe->ID?>" name="tue_open_<?=$cafe->ID?>" placeholder="Tuesday Open" value="<?=date("H:i", strtotime($cafe->Tuesday_Open))?>" required>
	  </label>
	  <label for="tue_close_<?=$cafe->ID?>">
		Tuesday Close
	  	<input type="time" class="form-control" id="tue_close_<?=$cafe->ID?>" name="tue_close_<?=$cafe->ID?>" placeholder="Tuesday Close" value="<?=date("H:i", strtotime($cafe->Tuesday_Close))?>" required>
	  </label>
	  
	    <label>
	      <button id="repeat_hours_tue_<?=$cafe->ID?>">Same as Above</button>
	    </label>

	  <script>
	  	$( document ).ready(function(){
	  		$( document ).on("click", "#repeat_hours_tue_<?=$cafe->ID?>",function(e){
				//$("#tue_open_<?=$cafe->ID?>").attr("disabled",(this.checked));
		    	//$("#tue_close_<?=$cafe->ID?>").attr("disabled",(this.checked));
	    		//if(this.checked){
		    		$("#tue_open_<?=$cafe->ID?>").val($("#mon_open_<?=$cafe->ID?>").val());
		    		$("#tue_close_<?=$cafe->ID?>").val($("#mon_close_<?=$cafe->ID?>").val());
	    		//}
    		});
    	});
	  </script>
	  <br />
	  <label for="wed_open_<?=$cafe->ID?>">
		Wednesday Open
	  	<input type="time" class="form-control" id="wed_open_<?=$cafe->ID?>" name="wed_open_<?=$cafe->ID?>" placeholder="Wednesday Open" value="<?=date("H:i", strtotime($cafe->Wednesday_Open))?>" required>
	  </label>
	  <label for="wed_close_<?=$cafe->ID?>">
		Wednesday Close
	  	<input type="time" class="form-control" id="wed_close_<?=$cafe->ID?>" name="wed_close_<?=$cafe->ID?>" placeholder="Wednesday Close" value="<?=date("H:i", strtotime($cafe->Wednesday_Open))?>" required>
	  </label>
	    <label>
	      <input type="checkbox" id="repeat_hours_wed_<?=$cafe->ID?>"> Same as Above
	    </label>
	  <script>
	  	$( document ).ready(function(){
	  		$( document ).on("click", "#repeat_hours_wed_<?=$cafe->ID?>",function(e){
    			$("#wed_open_<?=$cafe->ID?>").attr("disabled",(this.checked));
	    		$("#wed_close_<?=$cafe->ID?>").attr("disabled",(this.checked));
	    		if(this.checked){
		    		$("#wed_open_<?=$cafe->ID?>").val($("#tue_open_<?=$cafe->ID?>").val());
		    		$("#wed_close_<?=$cafe->ID?>").val($("#tue_close_<?=$cafe->ID?>").val());
	    		}
    		});
    	});
	  </script>
	  <br />
	  <label for="thu_open_<?=$cafe->ID?>">
		Thursday Open
	  	<input type="time" class="form-control" id="thu_open_<?=$cafe->ID?>" name="thu_open_<?=$cafe->ID?>" placeholder="Thursday Open" value="<?=date("H:i", strtotime($cafe->Thursday_Open))?>" required>
	  </label>
	  <label for="thu_close_<?=$cafe->ID?>">
		Thursday Close
	  	<input type="time" class="form-control" id="thu_close_<?=$cafe->ID?>" name="thu_close_<?=$cafe->ID?>" placeholder="Thursday Close" value="<?=date("H:i", strtotime($cafe->Thursday_Close))?>" required>
	  </label>
	    <label>
	      <input type="checkbox" id="repeat_hours_thu_<?=$cafe->ID?>"> Same as Above
	    </label>
	  <script>
	  	$( document ).ready(function(){
	  		$( document ).on("click", "#repeat_hours_thu_<?=$cafe->ID?>",function(e){
	    		$("#thu_open_<?=$cafe->ID?>").attr("disabled",(this.checked));
	    		$("#thu_close_<?=$cafe->ID?>").attr("disabled",(this.checked));
	    		if(this.checked){
		    		$("#thu_open_<?=$cafe->ID?>").val($("#wed_open_<?=$cafe->ID?>").val());
		    		$("#thu_close_<?=$cafe->ID?>").val($("#wed_close_<?=$cafe->ID?>").val());
	    		}
    		});
    	});
	  </script>
	  <br />
	  <label for="fri_open_<?=$cafe->ID?>">
		Friday Open
	  	<input type="time" class="form-control" id="fri_open_<?=$cafe->ID?>" name="fri_open_<?=$cafe->ID?>" placeholder="Friday Open" value="<?=date("H:i", strtotime($cafe->Friday_Open))?>" required>
	  </label>
	  <label for="fri_close_<?=$cafe->ID?>">
		Friday Close
	  	<input type="time" class="form-control" id="fri_close_<?=$cafe->ID?>" name="fri_close_<?=$cafe->ID?>" placeholder="Friday Close" value="<?=date("H:i", strtotime($cafe->Friday_Close))?>" required>
	  </label>
	    <label>
	      <input type="checkbox" id="repeat_hours_fri_<?=$cafe->ID?>"> Same as Above
	    </label>
	  <br />
	  <script>
	  	$( document ).ready(function(){
	  		$( document ).on("click", "#repeat_hours_fri_<?=$cafe->ID?>",function(e){
	  			$("#fri_open_<?=$cafe->ID?>").attr("disabled",(this.checked));
		    	$("#fri_close_<?=$cafe->ID?>").attr("disabled",(this.checked));
	    		if(this.checked){
		    		$("#fri_open_<?=$cafe->ID?>").val($("#thu_open_<?=$cafe->ID?>").val());
		    		$("#fri_close_<?=$cafe->ID?>").val($("#thu_close_<?=$cafe->ID?>").val());
	    		}
    		});
    	});
	  </script>
	  <label for="sat_open_<?=$cafe->ID?>">
		Saturday Open
	  	<input type="time" class="form-control" id="sat_open_<?=$cafe->ID?>" name="sat_open_<?=$cafe->ID?>" placeholder="Saturday Open" value="<?=date("H:i", strtotime($cafe->Saturday_Open))?>" required>
	  </label>
	  <label for="sat_close_<?=$cafe->ID?>">
		Saturday Close
	  	<input type="time" class="form-control" id="sat_close_<?=$cafe->ID?>"  name="sat_close_<?=$cafe->ID?>" placeholder="Saturday Close" value="<?=date("H:i", strtotime($cafe->Saturday_Close))?>" required>
	  </label>
	    <label>
	      <input type="checkbox" id="repeat_hours_sat_<?=$cafe->ID?>"> Same as Above
	    </label>
	  <script>
	  	$( document ).ready(function(){
	  		$( document ).on("click", "#repeat_hours_sat_<?=$cafe->ID?>",function(e){
	  			$("#sat_open_<?=$cafe->ID?>").attr("disabled",(this.checked));
		    	$("#sat_close_<?=$cafe->ID?>").attr("disabled",(this.checked));
	  			if(this.checked){
		    		$("#sat_open_<?=$cafe->ID?>").val($("#fri_open_<?=$cafe->ID?>").val());
		    		$("#sat_close_<?=$cafe->ID?>").val($("#fri_close_<?=$cafe->ID?>").val());
	    		}
    		});
    	});
	  </script>
	  <br />
	  <label for="sun_open_<?=$cafe->ID?>">
		Sunday Open
	  	<input type="time" class="form-control" id="sun_open_<?=$cafe->ID?>" name="sun_open_<?=$cafe->ID?>" placeholder="Sunday Open" value="<?=date("H:i", strtotime($cafe->Sunday_Open))?>" required>
	  </label>
	  <label for="sun_close_<?=$cafe->ID?>">
		Sunday Close
	  	<input type="time" class="form-control" id="sun_close_<?=$cafe->ID?>" name="sun_close_<?=$cafe->ID?>" placeholder="Sunday Close" value="<?=date("H:i", strtotime($cafe->Sunday_Close))?>" required>
	  </label>
	    <label>
	      <input type="checkbox" id="repeat_hours_sun_<?=$cafe->ID?>"> Same as Above
	    </label>
	  <script>
	  	$( document ).ready(function(){
	  		$( document ).on("click", "#repeat_hours_sun_<?=$cafe->ID?>",function(e){
	    		$("#sun_open_<?=$cafe->ID?>").attr("disabled",(this.checked));
		    	$("#sun_close_<?=$cafe->ID?>").attr("disabled",(this.checked));
	    		if(this.checked){
		    		$("#sun_open_<?=$cafe->ID?>").val($("#sat_open_<?=$cafe->ID?>").val());
		    		$("#sun_close_<?=$cafe->ID?>").val($("#sat_close_<?=$cafe->ID?>").val());
	    		}
    		});
    	});
	  </script>
	</div>
	
	<button type="submit" class="btn btn-default">Submit</button>
</form>
<script>
$( document ).ready(function(){
	var validate = function(){
		var region = $("#cafe_region_<?=$cafe->ID?>").val();
		if(region=="NULL"){
			return {success:false,message:"Please select a region"};
		}
		
		var cafe_latitude = $("#cafe_latitude_<?=$cafe->ID?>").val();
		var cafe_longitude = $("#cafe_longitude_<?=$cafe->ID?>").val();
		
		if(!isNumber(cafe_latitude)||!isNumber(cafe_longitude)){
			return {success:false,message:"Invalid Lat/Long values"};
		}else{
			return {success:true,message:"Form Completed"};
		}
	}
	function isNumber(n) {
	  return !isNaN(parseFloat(n)) && isFinite(n);
	}
$( document ).on("submit", "#update_form_<?=$cafe->ID?>",function(e){
	
    	e.preventDefault();
    	var result = validate();
    	console.log(result);
    	if(result["success"]==false){
    		alert(result["message"]);
    		return false;
    	}
    	var cafe_name = $("#cafe_name_<?=$cafe->ID?>").val();
    	var cafe_chain = $("#cafe_chain_<?=$cafe->ID?>").val();
    	var cafe_region = $("#cafe_region_<?=$cafe->ID?>").val();
    	var cafe_address = $("#cafe_address_<?=$cafe->ID?>").val();
    	var cafe_latitude = $("#cafe_latitude_<?=$cafe->ID?>").val();
    	var cafe_longitude = $("#cafe_longitude_<?=$cafe->ID?>").val();
    	var cafe_rating = $("input[name='newcafe_review_radio_<?=$cafe->ID?>']:checked").val();

    	var cafe_mon_open = $("#mon_open_<?=$cafe->ID?>").val();
    	var cafe_tue_open = $("#tue_open_<?=$cafe->ID?>").val();
    	var cafe_wed_open = $("#wed_open_<?=$cafe->ID?>").val();
    	var cafe_thu_open = $("#thu_open_<?=$cafe->ID?>").val();
    	var cafe_fri_open = $("#fri_open_<?=$cafe->ID?>").val();
    	var cafe_sat_open = $("#sat_open_<?=$cafe->ID?>").val();
    	var cafe_sun_open = $("#sun_open_<?=$cafe->ID?>").val();
    	
    	var cafe_mon_close = $("#mon_close_<?=$cafe->ID?>").val();
    	var cafe_tue_close = $("#tue_close_<?=$cafe->ID?>").val();
    	var cafe_wed_close = $("#wed_close_<?=$cafe->ID?>").val();
    	var cafe_thu_close = $("#thu_close_<?=$cafe->ID?>").val();
    	var cafe_fri_close = $("#fri_close_<?=$cafe->ID?>").val();
    	var cafe_sat_close = $("#sat_close_<?=$cafe->ID?>").val();
    	var cafe_sun_close = $("#sun_close_<?=$cafe->ID?>").val();
		
    	$.ajax({
    		type: "POST",
    		dataType: "html",
    		url: "<?=base_url('welcome/update')?>",
    		data: {
    		    cafe_id: <?=$cafe->ID?>,
    			cafe_name: cafe_name,
    			cafe_chain: cafe_chain,
    			cafe_region: cafe_region,
    			cafe_address: cafe_address,
    			cafe_latitude: cafe_latitude,
    			cafe_longitude: cafe_longitude,
    			
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
    			location.reload();
    		}
    	});
    });
});
</script>