<body>

	  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="/js/bootstrap.min.js"></script>
<div class="hidden container" id="navbar">
  
  <div class="row">
    <div class="col-xs-12 text-center">
      <img class="img-responsive" src="/img/Eheraldry_text-hires.png" style="max-height: 128px" />
     
      <?if($reviewer){?>
       <hr />
        <h1>REVIEWER</h1>
        <?if($reviewer_name){?>
        <h3><?=$reviewer_name?></h3>
 <hr />
        <?}?>
      <?}?>
    <?if(isset($error_message) && $error_message!=""){?>
      <div class="alert alert-danger"><?=$error_message?></div>  
    <?}?>
    </div>
  </div>
  <div class="row toggle-action" style="background:#DDD;">
    <?if($reviewer){?>
    <div class="pull-left">
      <a href="<?=base_url('logout')?>"><h5 style="color:black;margin-left:10px"><span class="glyphicon glyphicon-minus-sign" style="margin-top:5px;"/> Logout</h5></a>
      </div>
    <?}?>
    <a class="btn btn-outline-inverse btn-lg pull-right" data-toggle="collapse" data-target=".action_bar" style="color:black;">
      <span class="glyphicon glyphicon-th pull-right"></span>
    </a>
  </div>
  <div class="collapse action_bar">
  <div class="row" style="background:#DDD;">
    <div class="col-xs-12 text-center">
      <a class="btn btn-outline-inverse btn-lg" data-toggle="collapse" data-target=".subscribe_form" style="color:black;">
        <span class="sr-only">Toggle subscribe</span><h4>Subscribe</h4>
        <span class="glyphicon glyphicon-envelope" style="color:black;"></span>
      </a>
      <a class="btn btn-outline-inverse btn-lg" data-toggle="collapse" data-target=".search_form" style="color:black;">
        <span class="sr-only">Toggle search</span><h4>Search</h4>
        <span class="glyphicon glyphicon-search" style="color:black;"></span>
      </a>
      <?php if($reviewer){ ?>
      <a class="btn btn-outline-inverse btn-lg" data-toggle="collapse" data-target=".submit_form" style="color:black;">
        <span class="sr-only">Toggle submit</span><h4>Submit</h4>
        <span class="glyphicon glyphicon-send" style="color:black;"></span>
      </a>
      <?php }else{ ?>
      <a class="btn btn-outline-inverse btn-lg" data-toggle="collapse" data-target=".reviewer_form" style="color:black;">
        <span class="sr-only">Toggle admin</span><h4>Reviewer Login</h4>
        <span class="glyphicon glyphicon-user" style="color:black;"></span>
      </a>
      <?php } ?>
    </div>
  </div>
  <div class="row">
    <div class="collapse subscribe_form">
      <form class="form-inline" id="subscribe_form">
        <legend>
          <h2>Subscribe for Alerts</h2>
        </legend>
        <div class="form-group">
          <label class="sr-only" for="subscribe_email">Subscribe for Alerts</label>
          <input type="email" class="form-control" id="subscribe_email" placeholder="Email">
        </div>
        <button type="submit" class="btn btn-default">Subscribe</button>
      </form>
    </div>
  </div>
  <div class="row">
    <div class="collapse search_form">
      <form class="form-inline" id="search_form">
        <legend>
          <h2>Search</h2>
        </legend>
        <div class="form-group">
          <label class="sr-only" for="search_page">Search Page</label>
          <input type="text" class="form-control" id="search_page">
        </div>
        <button type="submit" class="btn btn-default">Search</button>
      </form>
    </div>
  </div>
  <div class="row">
    <div class="collapse submit_form">
      <?php
      	$this->load->view("review/add_cafe",array("regions"=>$regions,"chains"=>$chains));
      ?>
    </div>
  </div>
    <div class="row">
    <div class="collapse reviewer_form">
      <form class="form-inline" id="reviewer_form" method="POST" name="reviewer_form" action="<?=base_url('welcome/reviewer_login')?>">
        <legend>
          <h2>Reviewer Login</h2>
        </legend>
        <div class="form-group">
          <label for="reviewer_email">Email</label>
          <input type="email" class="form-control" id="reviewer_email" name="reviewer_email">
        </div>
        <div class="form-group">
          <label for="cafe_location">PIN</label>
          <input type="integer" class="form-control" id="reviewer_password" name="reviewer_password">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>
  </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div id="logo_splash">
      <div class="text-center" style="height:500px;">
        <img src="/img/Eheraldry.png" style="max-height:100%;max-width: 100%" />
        <img src='/img/76.GIF' height='1px' width='100%'>
      </div>
    </div>
    <div id="error_message" style="visibility: hidden;"></div>
    <div id="cafe_list" style="visibility: hidden;"></div>
    
  </div>
</div>
<?=$this->load->view('list/scripts')?>
</body>