<?php 

if($user = $this->session->userdata('user')){
				$this->load->view('header',array('title'=>'Login','name'=>$user->Name));
			}else{
				$this->load->view('header',array('title'=>'Login'));
			}
			
$this->load->helper('form');


if(isset($error)){
echo $error;
}
echo validation_errors();?>
<div class="sixteen columns add-top add-bottom"><?php
echo form_open_multipart('login/dologin');

/*
* Email Input
*
*/
$email_form_data = array(
	'name' => 'email',
	'id' => 'email',
	'placeholder' => 'email',
	'style'=>'width:100%');
?>

<div class="eight columns lighttext alpha">Email Address<?=form_input($email_form_data)?></div>
<div class="eight columns lighttext omega">Password<?=form_password(array('style'=>'width:100%;','name'=>'password','id'=>'password'))?></div>
<?php
/*
* Submit Button
*/
$data = array(
	'name'=>'login',
	'value'=>'Login',
	'class'=>'submit'
);?>
<div class="sixteen columns center">
	<div class="eight columns offset-by-four"><?=form_submit($data);?></div>
</div>

</form>

<?php $this->load->view('footer');?>