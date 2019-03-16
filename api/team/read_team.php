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

// Get the ID
$team->id = isset($_GET['id']) ? $_GET['id'] : '';

// Read the team
$team->readTeam();

// If id is null than id does not exist
if(is_null($team->id)){
  echo $error->errorCode(3, 'searching for');
  exit();
}

// Create the team array
$team_arr = [
  'id' => $team->id,
  'name' => $team->name,
  'win' => $team->win,
  'loss' => $team->loss,
  'championship' => $team->championship
];

// JSON it
print_r(json_encode($team_arr));
