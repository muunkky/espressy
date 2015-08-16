<style>
	a:link {
	text-decoration: none;
	}
	
	a:visited {
	    text-decoration: none;
	}
	
	a:hover {
	    text-decoration: none;
	}
	
	a:active {
	    text-decoration: none;
	}
	.cafecard, .reviewercard{
		border:1px solid #DDD;		
	}
	.cafecard {
		height:180px;
	}
	.hmcard{
		padding-top: 0;
		padding-bottom: 0;
	}
	.sistercard{
		background-color:#EEE;
	}
	.reviewercard{
		height:250px;
		overflow-y:auto;
	}
</style>

    <div class="row" style="margin:0;">
      <?php 
      	$HM=0;
		$reviewed=false;
        foreach($city_cafes as $cafe){
          	if($cafe->Star_Rating!=0&&$cafe->Star_Rating!=-1){
          		if(isset($cafe->Reviews) && !empty($cafe->Reviews)){
          			if(count($cafe->Reviews)>0){
          				$reviewed = true;
          			}else{
	          			$reviewed = FALSE;
	          		}
          		}else{
          			$reviewed = FALSE;
          		}
        		$this->load->view("list/cafe",array("cafe"=>$cafe,"reviewer"=>$reviewer,"stars"=>$cafe->Star_Rating,"reviewed"=>$reviewed));
			}elseif($cafe->Star_Rating==0){
				$HM++;
			}
		}
		if($HM>0){?>
			<ul class="list-group" style="margin:0;">
    			<li class="list-group-item star-header"><h4>Honourable Mentions</h4></li>
      <?php
			foreach($city_cafes as $cafe){
	          	if($cafe->Star_Rating==0){
	        		$this->load->view("list/cafe",array("cafe"=>$cafe,"reviewer"=>$reviewer,"stars"=>$cafe->Star_Rating,"reviewed"=>$reviewed));
				}
			}?>
			</ul>
	
		<?php }
      ?>
    </div>