<?php
$unconfirmed = "";
$blackstar = "";
$honorable = "";
$onestar = "";
$twostar = "";
$threestar = "";

  switch($stars){
    case -2:
      $unconfirmed="checked";
      break;
    case -1: 
      $blackstar="checked";
      break;
    case 0:
      $honorable="checked";
      break;
    case 1:
      $onestar = "checked";
      break;
    case 2:
      $twostar = "checked";
      break;
    case 3:
      $threestar = "checked";
  }
?>
<hr>
<h4>Reviewer Options</h4>
<h5>
  <a class="btn btn-xs" data-toggle="collapse" data-target=".review-collapse-<?=$cafe_id?>" style="color:black;border:1px solid #DDD;border-radius:5px;background-color:transparent;">add a review</a>
  <a class="btn btn-xs" data-toggle="collapse" data-target=".reviews-<?=$cafe_id?>" style="color:black;border:1px solid #DDD;border-radius:5px;background-color:transparent;">see reviews</a>
  <a class="btn btn-xs" data-toggle="collapse" data-target=".update-collapse-<?=$cafe_id?>" style="color:black;border:1px solid #DDD;border-radius:5px;background-color:transparent;">update this cafe's info</a>
</h5>
<!--><div class="hidden" id="review-report-<?=$cafe_id?>">
</div></!-->
<div class="collapse review-collapse-<?=$cafe_id?> text-left" id="review-collapse-<?=$cafe_id?>" style="background:black;color:white;">
  <?=$this->load->view('review/review_form', array('cafe_id'=>$cafe_id,
                                                    'stars'=>array(3=>$threestar,
                                                                    2=>$twostar,
                                                                    1=>$onestar,
                                                                    0=>$honorable,
                                                                    -1=>$blackstar,
                                                                    -2=>$unconfirmed)
                                                  )
                        );?>
</div>


<div class="collapse update-collapse-<?=$cafe_id?> text-left" id="update-collapse-<?=$cafe_id?>">
<?php
      $regions = $this->cafe_model->list_regions();
			if(!function_exists(("comp_name"))){
  			function comp_name($a, $b) {
  				return strcmp($a->Name, $b->Name);
  			}
			}
			usort($regions,"comp_name");
			
			$chains = $this->cafe_model->list_chains();
      usort($chains,"comp_name");
      	$this->load->view("review/update_cafe",array("cafe"=>$cafe, "regions"=>$regions,"chains"=>$chains));
      ?>
    
</div>
<div class="collapse reviews-<?=$cafe_id?>" id="reviews-<?=$cafe_id?>">
  <?php
    if(!empty($cafe->Reviews)){
      $this->load->view("list/cafe_review",array("cafe_id"=>$cafe->ID,"reviews"=>$cafe->Reviews));
    }
  ?>
</div>