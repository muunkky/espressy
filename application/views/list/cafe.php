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
</style>

<li class="list-group-item" style="<?=($cafe->Star_Rating==0?"padding-top: 0;padding-bottom: 0;":"")?>border:5px solid #DDD">
	<a target="_blank" style="color:black;" href="http://maps.google.com/?q=<?=$cafe->Name;?>,%20<?=$cafe->Address;?>">
	<span class="pull-right glyphicon glyphicon-map-marker"></span>
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
  	    		<?=min(round($cafe->Distance,1),100)?><?php if($cafe->Distance>100){echo "+";}?> km away
    	  	</h5>
    	  	
    	  	<h5>
	    	  	<?php if(count($cafe->Sisters)>0){?>
  					<a class="btn btn-xs" data-toggle="collapse" data-target="#<?=$cafe->ID?>_sisters" style="color:black;border:1px solid #DDD;border-radius:5px;background-color:transparent;">+ Show <?=(count($cafe->Sisters))?> other <?=$cafe->Name?> cafes</a>
  				<?php } ?>
    	  	</h5>
    	  	
    	  	<?php
	    	  	if($reviewer){
		    		$this->load->view("list/review",array("cafe_id"=>$cafe->ID,"stars"=>$cafe->Star_Rating, "cafe"=>$cafe));
				}
			?>
			


    </div>
    
   
     <?php if(count($cafe->Sisters)>0){?>
     	<div class="row sisters-collapse collapse" id="<?=$cafe->ID?>_sisters" style="padding:15px;">
    		<ul class="list-group">
    			<h2>Other Locations</h2>
  				<?php
				foreach($cafe->Sisters as $s){
					if($s->ID != $cafe->ID){?>
						<li class="list-group-item">
							<div class="row">
								<div class="col-xs-9 text-left">
  									<h4><?=$s->Address;?></h4>
  									<h5><?=$s->Hours;?></h5>
  								</div>
  								<div class="col-xs-3 text-center">
			                
					            	<a target="_blank" href="http://maps.google.com/?q=<?=$s->Name;?>,%20<?=$s->Address;?>" style="padding:3px;color:black;margin-right:15px;border:1px solid #DDD;border-radius:5px;background-color:transparent;" class="btn">
					            		<span class="glyphicon glyphicon-globe"></span> <?=round($s->Distance,1)?> km
				                	</a>
		                	
		                			<p style="color:#DDD;">
    									<?php
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
													  <span class="label label-default" style="background-color: #DDD">Honourable Mention</span>
													  <?php break;
												  case -1: ?>
													  <span class="glyphicon glyphicon-star-empty"></span>
													  <?php break;
												case -2: ?>
													  Unrated
													  <?php break;
												  default:
													  
													  break;
											}
  										?>
									</p>
			            		</div>
			        		</div>
	            		</li>
					<?php }
				}?>
    		</ul>
   		</div>  <!--End Row-->
    <?php } ?>
</li>
<?php } ?>