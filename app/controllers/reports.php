<?php

class Reports extends Controller {

  public function index() {

  if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'Admin' ) {
    header('Location: /login'); 
    exit;
  }
    
  $user = $this->model('User');
  $reminders = $this->model('Reminder');
  $data = $user->test();
  $list_of_reminders = $reminders->get_all_reminders();

  $this->view('Reports/index',['reminders'=> $list_of_reminders]);
  }
}
