<?php $this->load->view('header',array('title'=>'Signup'));?>
<?php

$this->load->helper('form');

$table_data = array();
$table_data[]=array('','');

if(isset($error)){
echo $error;
}
echo validation_errors();?>
<div class="sixteen columns add-top add-bottom"><?php
echo form_open_multipart('signup/dosignup');

/*
* Email and Password Input
*
*/
$email_form_data = array('name' => 'email',
'id' => 'email',
'placeholder' => 'email',
'style'	=> 'width: 100%');
?>
<div class="eight columns center offset-by-four lighttext">Email Address<?=form_input($email_form_data);?></div>
<div class="eight columns center offset-by-four lighttext">Password<?=form_password(array('style'=>'width:100%;','name'=>'password','id'=>'password'))?></div>
<div class="eight columns center offset-by-four lighttext">Confirm Password<?=form_password(array('style'=>'width:100%;','name'=>'confirm_password','id'=>'confirm_password'))?></div>
<?php

/*
* Submit Button
*/
$data = array(
'name'=>'signup',
'value'=>'Signup',
'class'=>'submit'
);?>
<div class="sixteen columns center">
	<div class="eight columns offset-by-four"><?=form_submit($data);?></div>
</div>

</form>

<?php $this->load->view('footer');?>