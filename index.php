<?php
 require_once("incl/app_top.php");

 if(is_signed_in()){
  require_once(DOCUMENT_TOP);
?>
  <div class="row">
   <div class="col-sm-8"></div>
   <div class="col-sm-1 btn border" onclick="NewSensor('ping')">Ping</div>
   <div class="col-sm-1 btn border" onclick="NewSensor('html')">HTML</div>
   <div class="col-sm-1 btn border" onclick="NewSensor('http')">HTTP</div>
   <div class="col-sm-1 btn border" onclick="NewSensor('https')">HTTPS</div>
  </div>
  <div class="row" id="main-content">
  </div>
<?php
  require_once(DOCUMENT_BOTTOM);
 }
?>
