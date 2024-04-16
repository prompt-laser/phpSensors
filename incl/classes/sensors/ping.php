<?php
 class Ping extends Sensor{
  public function Run(){
   return explode(" ",explode("time=", explode("\n", shell_exec("ping ".$this->_address->Get()." -c 1"))[1])[1])[0];
  }
 }
?>
