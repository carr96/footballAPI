<?php
class SuccessHandler{
  // See Success Code and direct it to method

  // 1 - No teams to Display
  // 2 - Team was created
  // 3 - Team was deleted
  // 4 - Team was updated

  public function successCode($code){
    switch($code){
      case $code === 1:
        return $this->codeOne();
        break;
      case $code === 2:
        return $this->codeTwo();
        break;
      case $code === 3:
        return $this->codeThree();
        break;
      case $code === 4:
        return $this->codeFour();
        break; 
    }
  }

  // JSON setUp method
  public function setJSON($msg){
    return json_encode(
      [
        'message' => $msg
      ]
    );
  }

  // No Teams to Display
  public function codeOne(){
    return $this->setJSON('There are no teams to display, try creating some');
  }

  // Team created
  public function codeTwo(){
    return $this->setJSON('Team was created');
  }

  // Team Deleted
  public function codeThree(){
    return $this->setJSON('Team was deleted');
  }

  // Team Updated
  public function codeFour(){
    return $this->setJSON('Team was updated');
  }
}
