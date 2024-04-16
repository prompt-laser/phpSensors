<?php
 require_once($_SERVER['DOCUMENT_ROOT'] . "/incl/app_top.php");

 if(is_signed_in()){
  $addr = new Address($_SERVER['QUERY_STRING']);
  $ping = new Ping($addr);
  echo $ping->Run();
 }
?>
