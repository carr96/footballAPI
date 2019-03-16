<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow_Methods: DELETE');
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

// Get the id for what to delete
$team->id = isset($_GET['id']) ? $_GET['id'] : '';

// Check if team exists
$team->readTeam();

if(is_null($team->id)){
  echo $error->errorCode(3, 'trying to delete');
  exit();
}

// Delete the team
if($team->delete()){
  echo $success->successCode(3);
} else{
  echo $error->errorCode(1);
}
