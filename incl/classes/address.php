<?php
 class Address{

  private string $_address;

  function Sanitize($address){
   $pattern = "/[!@#\$%^&*()<>,=?'\":;|\\\/{}`~_+=\[\] ]/";
   return $address;
  }

  public function Address(string $address){
   $this->_address = $this->Sanitize($address);
  }

  public function Get(){
   return $this->_address;
  }
 }
?>
