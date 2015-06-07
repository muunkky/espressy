<?php $this->load->view('header',array('title'=>'Review'));?>

<div class="sixteen columns add-top">

<?php
$this->load->helper('form');

if(isset($error)){
echo $error;
}
echo validation_errors();
?>
<?=form_open_multipart('review/submit');?>
<style>
	select, .submit{
		width: 100%;
	}
</style>
<div class="eight columns center offset-by-four lighttext">Review Type<?= form_dropdown('review_type',$review_types);?>
</div>
</div>
<div class="sixteen columns">
	<div class="six columns offset-by-five center lighttext">
<?php
foreach ($equipment_by_type as $type => $eq_list) {
	if (count($eq_list)) {?>

		<?=$type?><?=form_dropdown(url_title($type),$eq_list)?>
		 <?php
	}
}?>
</div>

</div>
<div class="sixteen columns add-top">
	<div class="ten columns offset-by-three">
<div class="four columns center lighttext">Rating<?=form_dropdown('rating'
														,array(
															'1' => 'Not Worthy',
															'2' => 'Has Potential',
															'3' => 'Worthy'
														)
														,array('id' => 'rating' )
													)?></div>
<div class="four columns center lighttext">Comments<?=form_textarea(array('name'=>'comments',
																			'style'=>'width: 100%;',
																			'rows'=>'3'))?></div>
</div>
 <?php
/*
* Submit Button
*/
$data = array(
'name'=>'review',
'value'=>'Review',
'class'=>'submit'
);?>
</div>
<div class="sixteen columns center lighttext">
	<?=form_submit($data);?>
</div>
<script type="text/javascript">
<?php
foreach ($equipment_by_type as $type => $eq_list) { ?>	
	<?php if($type!=""){ ?>
		var eq_dropdowns = document.getElementsByName("<?=url_title($type)?>");
		var eq_dropdown = eq_dropdowns[0];

	    for (var i = 0; i < eq_dropdown.options.length; i++) 
	    {
	        if (eq_dropdown.options[i].text === "<?php echo $selected_equipment_by_type[$type]?>") 
	        {
	            eq_dropdown.selectedIndex = i;
	        }
	    }
    <?php } ?>
<?php } ?>
</script>
</form>

<div id="sixteen columns center">
	<h2 class="lighttext">
		<p style="text-align: center;"><?=$name?></p>
		<p style="text-align: center;"><?=$address?></p>
	</h2>
</div>
<div class="sixteen columns">
	<div class="one-third center">
		<p class="lighttext" Ustyle="text-align: center;"><?=anchor('tel:'.$phone,$phone,array('class'=>'lighttext'))?></p>
	</div>
	<div class="one-third center">
		<p class="lighttext" style="text-align: center;"><?=anchor($website,'Website',array('class'=>'lighttext'))?></p>
	</div>
	<div class="one-third center">
		<p class="lighttext center" style="text-align: center;"><?=$rating?></p>
	</div>
	
</div>
<?php $this->load->view('footer');?>