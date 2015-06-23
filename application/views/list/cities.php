<ul class="list-group">
	<div id="latitude" style="display: none;padding:0;margin:0;"><?=$latitude?></div>
	<div id="longitude" style="display: none;padding:0;margin:0;"><?=$longitude?></div>
  <?php  
    foreach($cities as $city){
    	$unconfirmed = 0;
    	if($reviewer){
    		$unconfirmed = $city->Unconfirmed;
    	}
    	$numcafes = $city->One_Star+$city->Two_Stars+$city->Three_Stars+($reviewer?$city->Unconfirmed:0);
    	if($city->Name="San Francisco"){
	    	print_r_pre(array("numcafes"=>$numcafes));
	    	print_r_pre($city);
	    	exit;
    	}
      if($numcafes){
      ?>
  <ul class="list-group city">
    <li class="list-group-item city">
        <div class="container" style="margin:0;">
          <div class="row">
            <div class="col-xs-5 col-sm-4 col-sm-offset-0 col-md-4 col-md-offset-0 text-right" style="padding-top:10px">
            	
              <img src="/img/Eheraldry-inv.png" style="height: 80px;">
            </div>
            <div class="col-xs-7 col-sm-4 col-sm-push-4 text-left">
              <?php if(file_exists('/home/muunkky/espressy.com/img/skyline_'.strtolower($city->Name).'-hires-inv.png')){?>
              <img style="height: 80px;" src="<?=base_url('/img/skyline_'.strtolower($city->Name).'-hires-inv.png')?>"></img>
              <?php } ?>
            </div>
            <div class="clearfix visible-xs"></div>
            <div class="col-xs-12 col-xs-offset-0 col-sm-4 col-sm-pull-4 text-center">
              <a class="btn btn-outline-inverse btn-lg city-expand" id="<?=$city->ID?>_cafes_collapse" data-toggle="collapse" data-target="#<?=$city->ID?>_cafes" style="margin-right:15px;color:white;border:none;background-color:transparent;">
                <h1><?=strtoupper($city->Name)?>&nbsp;<small><small><span class="glyphicon glyphicon-collapse-down"></span></small></small></h1>
                <h2>
                	<?php
                		if(!$reviewer){
	                		switch ($numcafes) {
												case 0:
													echo "No Cafes";
													break;
												case 1:
													echo "1 Cafe";
													break;
												default:
													echo $numcafes." Cafes";
													break;
											}
                		}else{
                			echo ($numcafes-$city->Unconfirmed)."/".$numcafes." Cafes";
                		}
									?>
                </h2>
              </a>
            </div>
          </div>
      </div>
    </li>
    <ul class="list-group collapse city-collapse" id="<?=$city->ID?>_cafes">
		
  	</ul>
  	<script>
  	$(document).ready(function () {
	    $( document ).on("show.bs.collapse", "#<?=$city->ID?>_cafes",function (e) {
	    	var targetEl = $(e.target);
	    	var cityBody = $("#<?=$city->ID?>_cafes");
	    	
	    	if(targetEl.hasClass("city-collapse")){
	    	cityBody.append("<img src='/img/76.GIF' height='1px' width='100%'>");	
	    	$.ajax({
	    		url: "<?=base_url('welcome/get_city_stars')?>",
	    		type: "POST",
	    		dataType: "html",
	    		data: {
	    			cityID: <?=$city->ID?>,
	    		},
	    		success: function(data){
	    			
	    			cityBody.empty().append(data);
	    			$('html, body').animate({
				        scrollTop: targetEl.offset().top
				    }, 500);
	    		},
	    		error: function(jqXHR, textStatus, errorThrown) {
          			alert("ERROR: City Star List Not Retrieved");
				  	console.log(textStatus, errorThrown);
				  }
    		});
    		}else if(targetEl.hasClass("city-expand")){
    			
    		}
	    	
	    });
	  });
	   
  	</script>
  </ul>
  <?}
  }?>
</ul>