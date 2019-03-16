<?php

class Database{
  private $host = 'localhost';
  private $db_name = 'footballAPI';
  private $username = 'root';
  private $password = 'newpassword';
  private $con;

  public function connect(){
    try{
      $con = new PDO('mysql:host='.$this->host.';dbname='.$this->db_name,$this->username,$this->password);
      $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
      echo 'connection error ' . $e;
    }


    return $this->con; 
  }
}
