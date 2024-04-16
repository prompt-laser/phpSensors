<?php
 require_once($_SERVER['DOCUMENT_ROOT'] . "/incl/app_top.php");

 if(is_signed_in()){
  $addr = new Address($_SERVER['QUERY_STRING']);
  $http = new HTTP($addr);
  $status = $http->Run();
  http_response_code($status);
  if($status == 200){
   echo $status;
  }
 }
?>
