<ul class="list-group">
  <?php  
    foreach($cafes as $city=>$city_cafes){
      
      if(count($city_cafes>0)){
      ?>
  <ul class="list-group city">
    <li class="list-group-item city">
        <div class="container" style="margin:0;">
          <div class="row">
            <div class="col-xs-5 col-sm-4 col-sm-offset-0 col-md-4 col-md-offset-0 text-left" style="padding-top:10px">
              <img src="/img/Eheraldry-inv.png" style="height: 80px;">
            </div>
            <div class="col-xs-7 col-sm-4 col-sm-push-4 text-right">
              <?php if(file_exists('/home/muunkky/espressy.com/img/skyline_'.strtolower($city).'-hires-inv.png')){?>
              <img style="height: 80px;" src="<?=base_url('/img/skyline_'.strtolower($city).'-hires-inv.png')?>"></img>
              <?php } ?>
            </div>
            <div class="clearfix visible-xs"></div>
            <div class="col-xs-12 col-xs-offset-0 col-sm-4 col-sm-pull-4 text-center">
              <a class="btn btn-outline-inverse btn-lg" data-toggle="collapse" data-target=".city-collapse-<?=$city?>" style="margin-right:15px;color:white;border:none;background-color:transparent;">
                <h1><?=$city?>&nbsp;<small><small><span class="glyphicon glyphicon-collapse-down"></span></small></small></h1>
                <h2>
                  <span class="glyphicon glyphicon-star"/>
                  <span class="glyphicon glyphicon-star"/>
                  <span class="glyphicon glyphicon-star"/>
                  : <?=count($city_cafes["three stars"])?><br />
                  <span class="glyphicon glyphicon-star"/>
                  <span class="glyphicon glyphicon-star"/>
                  : <?=count($city_cafes["two stars"])?><br />
                  <span class="glyphicon glyphicon-star"/>
                  : <?=count($city_cafes["one star"])?>
                </h2>
              </a>
            </div>
          </div>
      </div>
    </li>
    <ul class="list-group collapse city-collapse-<?=$city?>">
    <ul class="list-group" style="margin:0;">
      <li class="list-group-item star-header"><h4><span class="glyphicon glyphicon-star"/><span class="glyphicon glyphicon-star"/><span class="glyphicon glyphicon-star"/> Three Star</h4></li>
      <ul class="list-group" style="margin:0;">
      <?php 
      if(empty($city_cafes["three stars"])){?>
        <li class="list-group-item"><h2>None</h2></li>
      <?php }else{
        foreach($city_cafes["three stars"] as $cafe){
          $this->load->view("list/cafe",array("cafe"=>$cafe,"reviewer"=>$reviewer,"stars"=>3));
        }
      }?>
      </ul>
    </ul>
    <ul class="list-group" style="margin:0;">
      <li class="list-group-item star-header"><h4><span class="glyphicon glyphicon-star"/><span class="glyphicon glyphicon-star"/> Two Star</h4></li>
      <ul class="list-group" style="margin:0;">
      <?php 
      if(empty($city_cafes["two stars"])){?>
        <li class="list-group-item"><h2>None</h2></li>
      <?php }else{
         foreach($city_cafes["two stars"] as $cafe){
           $this->load->view("list/cafe",array("cafe"=>$cafe,"reviewer"=>$reviewer,"stars"=>2));
        }
      }?>
      </ul>
    </ul>
    <ul class="list-group" style="margin:0;">
      <li class="list-group-item star-header"><h4><span class="glyphicon glyphicon-star"/> One Star</h4></li>
      <ul class="list-group" style="margin:0;">
      <?php 
      if(empty($city_cafes["one star"])){?>
        <li class="list-group-item"><h2>None</h2></li>
      <?php }else{
         foreach($city_cafes["one star"] as $cafe){
           $this->load->view("list/cafe",array("cafe"=>$cafe,"reviewer"=>$reviewer,"stars"=>1));
        }
      }?>
      </ul>
    </ul>
    <ul class="list-group" style="margin:0;">
      <li class="list-group-item star-header"><h4>Honourable Mention</h4></li>
      <ul class="list-group" style="margin:0;">
      <?php 
      if(empty($city_cafes["zero stars"])){?>
        <li class="list-group-item"><h2>None</h2></li>
      <?php }else{
         foreach($city_cafes["zero stars"] as $cafe){
           $this->load->view("list/cafe",array("cafe"=>$cafe,"reviewer"=>$reviewer,"stars"=>0));
        }
      }?>
      </ul>
    </ul>
    <ul class="list-group" style="margin:0;">
      <li class="list-group-item star-header"><h4><span class="glyphicon glyphicon-star-empty"/> Black Star</h4></li>
      <ul class="list-group" style="margin:0;">
      <?php 
      if(empty($city_cafes["black stars"])){?>
        <li class="list-group-item"><h2>None</h2></li>
      <?php }else{
         foreach($city_cafes["black stars"] as $cafe){
           $this->load->view("list/cafe",array("cafe"=>$cafe,"reviewer"=>$reviewer,"stars"=>-1));
        }
      }?>
      </ul>
    </ul>
  </ul>
  </ul>
  <?php }
  }?>
</ul>