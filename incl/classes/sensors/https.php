<?php
 class HTTPS extends Sensor{
  public function Run(){
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, "https://".$this->_address->Get());
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   $out = curl_exec($ch);
   return curl_getinfo($ch, CURLINFO_HTTP_CODE);
  }
 }
?>
