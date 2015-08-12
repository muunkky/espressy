<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

if( ! function_exists('get_salts')){
  function get_salts(){
  $Salts = array('4cbe8fcbf4c300c4083ff38e83b5ebbdd5dd15f4'=>'/__>{jlb~TFJUP`G6)KB!Y6Q(mJ_XN[-St3^!S&!dF+oOT6%(s#U9wr9Y0[0EX[');
  return $Salts;
  }

}
if ( ! function_exists('salted_hash'))
{
  function salted_hash($str,$salt_hash=''){
    
    $Salts = get_salts();
    $salt_string = '';
    if($salt_hash==''){
      $salt_string= end($Salts);
      $salt_hash = end(array_keys($Salts));
    }else{
      if(array_key_exists($salt_hash,$Salts)){
        $salt_string = $Salts[$salt_hash];
      }else{
        return FALSE;
      }
    }
    if($salt_string!=''){
      $str = $salt_string.$str;
      //echo $str;
      return sha1($str);
    }else{
      return FALSE;
    }
  }
}
if ( ! function_exists('current_hash'))
{  
  function current_hash(){
    return end(array_keys(get_salts()));
  }
}
?>