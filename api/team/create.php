<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow_Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow_Methods, Authorization, X_Requested-With');

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

// Get the data that was posted
$data = json_decode(file_get_contents('php://input'));

// Set the properties
$team->name = $data->name;
$team->win = $data->win;
$team->loss = $data->loss;
$team->championship = $data->championship;

// Empty fields set to 0
if(empty($team->win)){
  $team->win = 0;
}

if(empty($team->loss)){
  $team->loss = 0;
}

if(empty($team->championship)){
  $team->championship = 0;
}

// Check if datatypes are correct
if(!is_int($team->win)){
  $team->win = 0;
}

if(!is_int($team->loss)){
  $team->loss = 0;
}

if(!is_int($team->championship)){
  $team->championship = 0;
}

// Check if name is empty
if(empty($team->name)){
  echo $error->errorCode(2);
  exit(); 
}

// Create the team
if($team->create()){
  echo $success->successCode(2);
} else{
  echo $error->errorCode(1);
  exit();
}
