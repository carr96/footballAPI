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

  public function read(){
    $query = 'SELECT * FROM '.$this->table;

    // Prepare Statment
    $stmt = $this->con->prepare($query);

    // Execute
    $stmt->execute();

    return $stmt;
  }

  public function create(){
    $query = 'INSERT INTO '.$this->table. ' SET name = :name, win = :win, loss = :loss, championship = :championship';

    // Prepare Statement
    $stmt = $this->con->prepare($query);

    // Clean and sanitize inputs
    $this->name = filter_var($this->name, FILTER_SANITIZE_STRING);
    $this->win = htmlspecialchars(strip_tags($this->win));
    $this->loss = htmlspecialchars(strip_tags($this->loss));
    $this->championship = htmlspecialchars(strip_tags($this->championship));

    // Bind the data
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':win', $this->win);
    $stmt->bindParam(':loss', $this->loss);
    $stmt->bindParam(':championship', $this->championship);

    // Execute
    if($stmt->execute()){
      return true;
    } else{
      // Print Error if something goes wrong
      printf("Error: %s.\n", $stmt->error);
      return false;
    }
  }
}
