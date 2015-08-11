<html>
<?php 
	$this->load->view('template'); 
	$this->load->view('analyticstracking'); 
?>

<body onload="initialize()" class="verydark">
<div class="container">
	<div class="sixteen columns medium">
		<header>
			<h1 class="darktext">ESPRESSY</h1>															<?php
		      if (isset($name)){															?>
		      	<div class="center"><h6 class="light darktext" style="text-align: center"><?=$name?></h6></div> 			<?php
		      }else{																		?>
		      	<h6 class="light darktext" style="text-align: center">Setting the Bar</h6>							<?php
		      }																				?>
   		</header>
   </div>
   <div class="sixteen columns dark lighttext" style="padding-bottom: 10px;">
      <nav>
      	<style>
      		nav {
				width: 100%;
				list-style: none; 
				text-align: center;}
			nav li {
				/*float: left;*/ }
      	</style>
	      <ul>
		  <?php
	
		  $active_review='';
		  $active_login='';
		  $active_signup='';
		  
		 if($this->uri->segment(1,'review')=='review')
		 	$active_review = 'class="active"';
		 if($this->uri->segment(1)=='login')
		  	$active_login = 'class="active"';
		 if($this->uri->segment(1)=='signup')
		  	$active_signup = 'class="active"';
	
		  ?>
	        <li class="five columns alpha"><a class="lighttext" href="<?=base_url('/review/')?>" <?=$active_review ?>>Review</a></li>
	        <?php 
	        if (!$this->session->userdata('authenticated')){
	        	?>
	        	<li class="three columns center"><a class="lighttext" href="<?=base_url('/login/')?>" <?=$active_login ?>>Log in</a></li>
	        	<li class="three columns center"><a class="lighttext" href="<?=base_url('/signup/')?>" <?=$active_signup ?>>Sign Up</a></li>
	        	<?php 
			}ELSE{														?>
				<li class="six columns center"><a class="lighttext" href="<?=base_url('/logout/')?>">Logout</a></li>
																		<?php
			}															?>
	        <li class="five columns omega darktext"><?=safe_mailto('cameronrout@gmail.com','Contact',array("class"=>"lighttext")) ?></li>
	      </ul>
      </nav>
  </div>