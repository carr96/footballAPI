<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow_Methods: PUT');
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

// initialize the input to the current value
$team->id = $data->id;

$team->readTeam();

// Set the properties

// Check if needed to update
if(is_int($data->win)){
  $team->win = $data->win;
}

if(is_int($data->loss)){
  $team->loss = $data->loss;
}

if(is_int($data->championship)){
  $team->championship = $data->championship;
}

// Check if name is empty
if(strlen($data->name) < 1){
  echo $error->errorCode(2);
  exit();
} else{
  $team->name = $data->name;
}

// Create the team
if($team->update()){
  echo $success->successCode(4);
} else{
  echo $error->errorCode(1);
  exit();
}
