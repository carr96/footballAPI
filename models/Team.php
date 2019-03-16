<?php

class Team{
  private $con;
  private $table = 'tbl_Teams';

  public $id;
  public $name;
  public $win;
  public $loss;
  public $championship;

  public function __construct($db){
    $this->con = $db;
  }

  public function setUp(){

  }

  public function read(){
    $query = 'SELECT * FROM '.$this->table;

    // Prepare Statment
    $stmt = $this->con->prepare($query);

    // Execute
    $stmt->execute();

    return $stmt; 
  }
}
