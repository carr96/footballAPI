<?php
class ErrorHandler{
  // See errorCode and direct to correct method

  // 1 - Fatal Error Handler
  // 2 - Name left empty while creating
  // 3 - ID is null when searching for team

  public function errorCode($code, $method = null){
    switch($code){
      case $code === 1:
        return $this->codeOne();
        break;
      case $code === 2:
        return $this->codeTwo();
        break;
      case $code === 3:
        return $this->codeThree($method);
        break;
    }
  }

  // Set up JSON
  public function setJSON($code,$msg){
    return json_encode(
      [
        "errorCode" => $code,
        "message" => $msg
      ]
    );
  }

  // Fatal Errors
  public function codeOne(){
    return $this->setJSON(1, 'There has been a error with the API');
  }

  // Name left empty while creating
  public function codeTwo(){
    return $this->setJSON(2, 'Please fill out the name field in order to create a team');
  }

  // ID is null when searching for team
  public function codeThree($method){
    return $this->setJSON(3, 'The Team you are '. $method . ' does not exist');
  }
}
