<?php 
$hide = false;
if(!$reviewer){
	if($cafe->Star_Rating==-2){
		$hide=false;				//Set true to hide unrated cafes to non-reviewers
	}elseif(!$reviewed){
		$hide=false;					//Set true to hide unrated cafes to non-reviewers
	}
}

if(!$hide){?>


<div class="col-sm-6 col-md-3 <?=($reviewer?"reviewercard":"cafecard")?> <?=($cafe->Star_Rating==0?"hmcard":"")?>">
	<a target="_blank" style="color:black;" href="http://maps.google.com/?q=<?=$cafe->Name;?>,%20<?=$cafe->Address;?>">
		<span class="pull-right glyphicon glyphicon-map-marker" style="margin-top:10px"></span>
	</a>
	<div class="text-center">
      		<?=($cafe->Star_Rating==0?"<h4>".$cafe->Name."</h4>":"<h2>".$cafe->Name."</h2>")?>
      			
    		<span style="color:<?=(($cafe->Star_Rating==-2||$reviewed==false)?'#DDD':'#868A08')?>;">
    			<?php if(!$reviewed){?>
    				Not Rated
    			<?php }else{
	  				switch ($cafe->Star_Rating) {
						  case 3: ?>
							  <span class="glyphicon glyphicon-star"></span>
							  <span class="glyphicon glyphicon-star"></span>
							  <span class="glyphicon glyphicon-star"></span>
							  <?php break;
						  case 2: ?>
							  <span class="glyphicon glyphicon-star"></span>
							  <span class="glyphicon glyphicon-star"></span>
							  <?php break; 
						  case 1: ?>
							  <span class="glyphicon glyphicon-star"></span>
							  <?php break;
						  case 0: ?>
							  <!--<span class="label label-default" style="background-color: #DDD">Honourable Mention</span>-->
							  <?php break;
						  case -1: ?>
							  <span class="glyphicon glyphicon-star-empty"></span>
							  <?php break;
						case -2: ?>
							  Not Rated
							  <?php break;
						  default:
							  
							  break;
					  }
    			} ?>
    		</span>
  	    	<h5>
  	    		<?=$cafe->Hours?>
  	    	</h5>
  	    	<h5>
  	    		<?php
	  	    		if($cafe->Distance == 0){?>
	  	    			Unknown Distance
	  	    		<?php }	else{
	  	    		echo min(round($cafe->Distance,1),100);
	  	    		echo (($cafe->Distance>100)?"+":"")." km away";
  	    		}?>
    	  	</h5>
    	  	<?php if(count($cafe->Sisters)>0){?>
				  	<a class="btn btn-xs" data-toggle="collapse" data-target="#<?=$cafe->ID?>_sisters" style="color:black;border:1px solid #DDD;border-radius:5px;background-color:transparent;">
						<span>Show <?=(count($cafe->Sisters))?> other <?=$cafe->Name?> cafes</span>
					</a>
			<?php } ?>
    	  	<?php
	    	  	if($reviewer){
		    		$this->load->view("list/review",array("cafe_id"=>$cafe->ID,"stars"=>$cafe->Star_Rating, "cafe"=>$cafe));
				}
			?>
			


    </div>
</div>
    
   
     <?php if(count($cafe->Sisters)>0){?>
     	<div class="sisters-collapse collapse" id="<?=$cafe->ID?>_sisters" style="padding:0;margin:0;">
    		
  			<?php
			foreach($cafe->Sisters as $s){
				if($s->ID != $cafe->ID){?>
					<div class="col-sm-6 col-md-3 <?=($reviewer?"reviewercard":"cafecard")?> sistercard <?=($s->Star_Rating==0?"hmcard":"")?>">
						<a target="_blank" style="color:black;" href="http://maps.google.com/?q=<?=$cafe->Name;?>,%20<?=$s->Address;?>">
							<span class="pull-right glyphicon glyphicon-map-marker" style="margin-top:10px"></span>
						</a>
						<div class="text-center">
					      		<?=($s->Star_Rating==0?"<h4>".$s->Name."</h4>":"<h2>".$s->Name."</h2>")?>
					      			
					    		<span style="color:<?=(($s->Star_Rating==-2||$s->Star_Rating==null)?'#DDD':'#868A08')?>;">  <!--error here with the $reviewed flag-->
					    			<?php if($s->Star_Rating==null){?>
					    				Not Rated
					    			<?php }else{
						  				switch ($s->Star_Rating) {
											  case 3: ?>
												  <span class="glyphicon glyphicon-star"></span>
												  <span class="glyphicon glyphicon-star"></span>
												  <span class="glyphicon glyphicon-star"></span>
												  <?php break;
											  case 2: ?>
												  <span class="glyphicon glyphicon-star"></span>
												  <span class="glyphicon glyphicon-star"></span>
												  <?php break; 
											  case 1: ?>
												  <span class="glyphicon glyphicon-star"></span>
												  <?php break;
											  case 0: ?>
												  <!--<span class="label label-default" style="background-color: #DDD">Honourable Mention</span>-->
												  <?php break;
											  case -1: ?>
												  <span class="glyphicon glyphicon-star-empty"></span>
												  <?php break;
											case -2: ?>
												  Not Rated
												  <?php break;
											  default:
												  
												  break;
										  }
					    			} ?>
					    		</span>
					  	    	<h5>
					  	    		<?=$s->Hours?>
					  	    	</h5>
					  	    	<h5>
					  	    		<?php
					  	    			if($s->Distance == 0){?>
						  	    			Unknown Distance
						  	    		<?php }	else{
						  	    		echo min(round($s->Distance,1),100);
						  	    		echo (($s->Distance>100)?"+":"")." km away";
					  	    		}?>
					    	  	</h5>
					    	  	
					    	  	<?php
						    	  	if($reviewer){
							    		$this->load->view("list/review",array("cafe_id"=>$s->ID,"stars"=>$s->Star_Rating, "cafe"=>$s));
									}
								?>
					    </div>
					</div>

				<?php }
			}?>
		</div>
    <?php } ?>
<?php } ?>