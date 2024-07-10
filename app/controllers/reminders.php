<?php

class Reminders extends Controller {

  public function index() {		
    $reminders = $this->model('Reminder');
    $list_of_reminders = $reminders->get_all_reminders();
    $this->view('reminders/index',['reminders'=> $list_of_reminders]);
  }

  public function create() {		
    $reminders = $this->model('Reminder');
    $this->view('reminders/create');
  }

  public function newReminder() {		
    $subject = $_POST['subject'];
    
    $reminders = $this->model('Reminder');
    $reminders->add_Reminder($subject, $_SESSION['userid']); 
  }

  public function update($id) {
    $subject = $_POST['subject'];

    $reminders = $this->model('Reminder');
    $reminders->update_reminder($id, $subject);

    header('Location: /reminders/index');
    die();
  }

  public function delete($id) {
    $reminders = $this->model('Reminder');
    $reminders->delete_reminder($id);

    header('Location: /reminders/index');
    die();
  }
  
}
?>