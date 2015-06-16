<?php
$blackstar = "";
$honorable = "";
$onestar = "";
$twostar = "";
$threestar = "";

  switch($stars){
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
<div class="row hidden" id="review-report-<?=$cafe_id?>">
</div>
<div class="row collapse review-collapse-<?=$cafe_id?> text-left" id="review-collapse-<?=$cafe_id?>" style="background:black;color:white;">
<form role="form" id="<?=$cafe_id?>_review_form" class="review_form" style="margin-top:0;">
  <div class="form-group">
    <h4>
      <div class="row" style="margin-top:0px;">
          <div class="col-md-12">
          <div class="form-group">
          <input style="margin-left:25px;" type="radio" name="<?=$cafe_id?>_review_radio" id="<?=$cafe_id?>_review_threestar" value="3" <?=$threestar?>>
          <label class="radio-inline"><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span> Three Star
          </label>
          </div>
          <div class="form-group">
          <input style="margin-left:25px;" type="radio" name="<?=$cafe_id?>_review_radio" id="<?=$cafe_id?>_review_twostar" value="2" <?=$twostar?>>
          <label class="radio-inline" ><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span> Two Star
          </label>
          </div>
          <div class="form-group">
          <input style="margin-left:25px;" type="radio" name="<?=$cafe_id?>_review_radio" id="<?=$cafe_id?>_review_onestar" value="1" <?=$onestar?>>
          <label class="radio-inline" ><span class="glyphicon glyphicon-star"></span> One Star
          </label>
          </div>
          <div class="form-group">
          <input style="margin-left:25px;" type="radio" name="<?=$cafe_id?>_review_radio" id="<?=$cafe_id?>_review_HM" value="0" <?=$honorable?>>
          <label class="radio-inline" >HM
          </label>
          </div>
          <div class="form-group">
          <input style="margin-left:25px;" type="radio" name="<?=$cafe_id?>_review_radio" id="<?=$cafe_id?>_review_blackstar" value="-1" <?=$blackstar?>>
          <label class="radio-inline" ><span class="glyphicon glyphicon-star-empty"></span> Black Star
          </label>
          </div>
        </div>
        <div class="col-md-12">
            <textarea class="form-control" placeholder="Optional Comments" id="<?=$cafe_id?>_review_comments"></textarea>
         </div>
         <div class="col-md-12">
            <button type="submit" class="btn btn-block btn-default">Submit</button>
         </div>
      </div>
    </h4>
  </div>
</form>
<script>
			
    $( document ).on("submit", "#<?=$cafe_id?>_review_form",function(e){
    	e.preventDefault();
    	var element = $( e.currentTarget );
		var id = element.attr("id");
		id = id.split("_")[0];
		var val = $("input[name='" + id + "_review_radio']:checked").val();
		var comments = $("#"+id+"_review_comments").val();
		$.ajax({
			type: "POST",
			dataType: "json",
			url: "<?=base_url('welcome/submit_review')?>",
			data: {
				cafe_id: id,
				rating: val,
				comments: comments
			},
			success: function(data){
				$("#"+data.cafe_id+"_review_list").prepend(data.review);
				$("#review-collapse-"+data.cafe_id).collapse('toggle');
				var rep = $("#review-report-"+data.cafe_id);
				rep.empty();
				if(data.success==true){
					rep.append("<div class='alert alert-success'>"+data.message+"</div>");
				}else{
					rep.append("<div class='alert alert-danger'>"+data.message+"</div>");
				}
				rep.toggleClass("hidden",false).fadeOut(3000);
			}
		});
    });
</script>

</div>


<div class="row collapse update-collapse-<?=$cafe_id?>" id="update-collapse-<?=$cafe_id?>">
<?php
      $regions = $this->cafe_model->list_regions();
			if(!function_exists(("comp_name"))){
  			function comp_name($a, $b) {
  				return strcmp($a->Name, $b->Name);
  			}
			}
			usort($regions,"comp_name");
			$chains = $this->cafe_model->list_chains();
      	$this->load->view("review/update_cafe",array("cafe"=>$cafe, "regions"=>$regions,"chains"=>$chains));
      ?>
    </div>
</div>
<div class="row collapse reviews-<?=$cafe_id?>" id="reviews-<?=$cafe_id?>">
  <?php
    if(!empty($cafe->Reviews)){
      $this->load->view("list/cafe_review",array("cafe_id"=>$cafe->ID,"reviews"=>$cafe->Reviews));
    }
  ?>
</div>