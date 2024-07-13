<?php

class Reports extends Controller {

  public function index() {
    $user = $this->model('User');
    $reminders = $this->model('Reminder');
    $data = $user->test();
    $list_of_reminders = $reminders->get_all_reminders();

    $this->view('Reports/index',['reminders'=> $list_of_reminders]);
  }

}
