<?php

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once '../../config/Database.php';
require_once '../../models/Team.php';
include_once '../../models/ErrorHandler.php';
include_once '../../models/SuccessHandler.php';

// Instantiate Database
$database = new Database();
$db = $database->connect();

// Instantiate Team, send in database conenction
$team = new Team($db);

// Instantiate Success Message Handler
$success = new SuccessHandler();

// Instantiate Error Message Handler
$error = new ErrorHandler();

// Read all the teams
$results = $team->read();

// Get the row count of the teams
$num = $results->rowCount();

// Check if any teams exist
if($num > 0){
  // Team Array to print out
  $team_arr = [];
  while($row = $results->fetch(PDO::FETCH_ASSOC)){
    extract($row);
    $team = [
      'id' => $team_ID,
      'name' => $name,
      'win' => $win,
      'loss' => $loss,
      'championship' => $championship
    ];

    // Push team into team array
    array_push($team_arr, $team);
  }

  echo json_encode($team_arr);
}
else{
  // No teams to display
  echo $success->successCode(1);
}
