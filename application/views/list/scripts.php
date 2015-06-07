<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<script>

  $( document ).ready(function(){
    

    
    if (navigator.geolocation){
   		
      navigator.geolocation.getCurrentPosition(function (position){
      	lat  = position.coords.latitude;
        lng = position.coords.longitude;
        
		$.ajax({
          dataType: "json",
          url: "<?=base_url('welcome/get_cities')?>",
          type: "POST",
          data: {
				latitude: lat,
				longitude: lng,
				date: new Date()
          },
          success: function(data){
          	
          	console.log(data.cafe_list);
            var cafe_list = $("#cafe_list");
            var logo_splash = $("#logo_splash");
            var error_message = $("#error_message");
            logo_splash.fadeOut(3000,function(){
	          	$("#navbar").toggleClass("hidden",false);
	          	cafe_list.css("visibility","visible");
	          	error_message.css("visibility","visible");
	          	error_message.fadeIn("slow");
	          	cafe_list.fadeIn("slow");
	        });
	        cafe_list.empty().append(data.cities);
			error_message.empty().append(data.error_message);
          },
          error: function(jqXHR, textStatus, errorThrown) {
          	alert("ERROR: Cafe List Not Retrieved");
				  console.log(textStatus, errorThrown);
			},
            async: true
        });
      },
      function(error){
      	lat =0;
    	lng=0;
    	$.ajax({
          dataType: "json",
          url: "<?=base_url('welcome/get_cities')?>",
          type: "POST",
          data: {
				latitude: lat ,
				longitude: lng,
				date: new Date()
          },
          success: function(data){
          	console.log(data.cafe_list);
            var cafe_list = $("#cafe_list");
            var logo_splash = $("#logo_splash");
            var error_message = $("#error_message");
            logo_splash.fadeOut(3000,function(){
	          	$("#navbar").toggleClass("hidden",false);
	          	cafe_list.css("visibility","visible");
	          	error_message.css("visibility","visible");
	          	error_message.fadeIn("slow");
	          	cafe_list.fadeIn("slow");
	        });
	        cafe_list.empty().append(data.cities);
			error_message.empty().append(data.error_message);
          },
          error: function(jqXHR, textStatus, errorThrown) {
				  console.log(textStatus, errorThrown);
			},
            async: true
        });
      });
    }else{

    	lat =0;
    	lng=0;
    	$.ajax({
          dataType: "json",
          url: "<?=base_url('welcome/cafe_list')?>",
          type: "POST",
          data: {
				latitude: lat ,
				longitude: lng,
				date: new Date()
          },
          success: function(data){
          	console.log(data.cafe_list);
            var cafe_list = $("#cafe_list");
            var logo_splash = $("#logo_splash");
            var error_message = $("#error_message");
            logo_splash.fadeOut(3000,function(){
	          	$("#navbar").toggleClass("hidden",false);
	          	cafe_list.css("visibility","visible");
	          	error_message.css("visibility","visible");
	          	error_message.fadeIn("slow");
	          	cafe_list.fadeIn("slow");
	        });
	        cafe_list.empty().append(data.cafe_list);
			error_message.empty().append(data.error_message);
          },
          error: function(jqXHR, textStatus, errorThrown) {
				  console.log(textStatus, errorThrown);
			},
            async: true
        });
    }

    
    
    $( document ).on("submit", "#subscribe_form",function(e){
    	e.preventDefault();
    	var email = $("#subscribe_email").val();
    	$.ajax({
    		type: "POST",
    		dataType: "json",
    		url: "<?=base_url('welcome/subscribe')?>",
    		data: {
    			email: email
    		},
    		success: function(data){
    			$("#subscribe_form").replaceWith("<div class='alert alert-success'>Subscribed!</div>").fadeOut("slow").parent().collapse('toggle');
    		}
    	});
    });
    $( document ).on("submit","#search_form",function(e){
    	e.preventDefault();
    	var search_string = $("#search_page").val();
    	$.extend($.expr[':'], {
		  'containsi': function(elem, i, match, array)
		  {
		    return (elem.textContent || elem.innerText || '').toLowerCase()
		    .indexOf((match[3] || "").toLowerCase()) >= 0;
		  }
		});
		var el = $("li:containsi('"+search_string+"')");
		el.parents().collapse(false);
		$('html, body').animate({
	        scrollTop: el.offset().top
	    }, 2000);
   });
   
    


    
  });
  
</script>