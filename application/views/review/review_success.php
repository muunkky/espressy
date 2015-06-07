<?php $this->load->view('header',array('title'=>'Review'));?>
<div class="sixteen columns add-top add-bottom">
	<div class="doc-section clearfix" id="grid">				
		<div class="example-grid">							
<?php
$this->load->helper('form');

if(isset($error)){
	echo $error;
}
echo validation_errors();
?>
<div class="sixteen columns center medium">
	<h3 class="lighttext">Thanks for reviewing!</h3>
	<h3 class="lighttext">An email has been sent to your peers.</h3>
</div>