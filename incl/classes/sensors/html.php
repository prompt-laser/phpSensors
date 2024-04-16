<?php
 class HTML extends Sensor{
  public function Run(){
   $ch0 = curl_init();
   curl_setopt($ch0, CURLOPT_URL, $this->_address->Get());
   curl_setopt($ch0, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch0, CURLOPT_FOLLOWLOCATION, true);
   curl_setopt($ch0, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0');
   $out = curl_exec($ch0);
   $url = curl_getinfo($ch0, CURLINFO_EFFECTIVE_URL);
   //echo $url;
   $ch1 = curl_init();
   curl_setopt($ch1, CURLOPT_URL, $url);
   curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, true);
   curl_setopt($ch1, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0');
   $out = curl_exec($ch1);
   return curl_getinfo($ch1, CURLINFO_HTTP_CODE);
  }
 }
?>
