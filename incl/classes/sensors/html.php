<?php
 class HTML extends Sensor{
  public function Run(){
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, "http://".$this->_address->Get());
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
   curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0');
   $out = curl_exec($ch);
   return curl_getinfo($ch, CURLINFO_HTTP_CODE);
  }
 }
?>
