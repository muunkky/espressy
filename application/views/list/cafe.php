<li class="list-group-item" style="<?=($cafe->Star_Rating==0?"padding-top: 0;padding-bottom: 0;":"")?>">
	<div class="text-center">

      		<?=($cafe->Star_Rating==0?"<h4>".$cafe->Name."</h4>":"<h2>".$cafe->Name."</h2>")?>
    		<span style="color:<?=($reviewed==true?'#868A08':'#DDD')?>;">
	  			<?php
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
						  default:
							  
							  break;
					  }
	  			?>
    		</span>
    		<a target="_blank" style="color:black;" href="http://maps.google.com/?q=<?=$cafe->Name;?>,%20<?=$cafe->Address;?>">
  	    	<h5>

  	    		
  	    		<?=$cafe->Hours?>
  	    		,&nbsp;
  	    		<?=min(round($cafe->Distance,1),100)?><?php if($cafe->Distance>100){echo "+";}?> km away <span class="glyphicon glyphicon-globe"></span>
	  			<?php if(count($cafe->Sisters)>0){?>
  					<a class="btn btn-xs" data-toggle="collapse" data-target="#<?=$cafe->ID?>_sisters" style="padding-bottom:3px;color:black;margin-top:-5px;border:1px solid #DDD;border-radius:5px;background-color:transparent;">+<?=(count($cafe->Sisters))?> Cafes</a>
  				<?php } ?>
    	  	</h5>
    	  	</a>
    	  	<h5>
    	  	<?php
	    	  	if($reviewer){
		    		$this->load->view("list/review",array("cafe_id"=>$cafe->ID,"stars"=>$cafe->Star_Rating, "cafe"=>$cafe));
				}
			?>
			</h5>


    </div>
    
   
     <?php if(count($cafe->Sisters)>0){?>
     	<div class="row" style="padding:15px;">
    		<ul class="list-group sisters-collapse collapse" id="<?=$cafe->ID?>_sisters">
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