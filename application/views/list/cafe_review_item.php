<li id="<?=$r->ID?>_review" class="list-group-item">
	<div class="row">
		<div class="col-xs-12">
			<span id="<?=$r->ID?>_close" class="glyphicon glyphicon-remove-circle pull-right"></span>
			<?php if($r->Rating > 0){
				for ($i=$r->Rating;$i>0;$i--){?>
					<span class="glyphicon glyphicon-star"></span>
				<?php }
			}elseif($r->Rating==0){
				echo "HM";
			}elseif($r->Rating==-1){?>
				<span class="glyphicon glyphicon-star-empty"></span>
			<?php }
			
			?>
		<?=$r->User_Name?>
		&nbsp;
		<?=date('M-y',strtotime($r->Date))?>
		</div>
	</div>
	<p><?=$r->Comments?></p>
	<script>
		$( document ).ready(function(){
			$(document).on("click", "#<?=$r->ID?>_close", function(e){
				var r=confirm("Delete Review?");
				if (r==true)
				  {
					var element = $(e.currentTarget);
					var id = element.attr("id");
					id = id.split("_")[0];
					$.ajax({
						type: "POST",
						dataType: "json",
						url: "<?=base_url('welcome/remove_review')?>",
						data: {
							review_id: id
						},
						success: function(data){
							var element = $("#"+data.review_id+"_review");
							console.log(element);
							element.fadeOut();
						}
					});
				  }
			});
		});
	</script>
</li>