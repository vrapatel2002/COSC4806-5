<?php

class Reminder {
  public function __construct() {

  }
  
  public function get_all_reminders () {
    $db = db_connect();
    $statement = $db->prepare("select * from reminders;");
    $statement->execute();
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
  }

  public function update_reminder($id, $subject) {
    $db = db_connect();
    $statement = $db->prepare("UPDATE reminders SET subject = :subject WHERE id = :id");
    $statement->bindParam(':subject', $subject);
    $statement->bindParam(':id', $id);
    $statement->execute();
  }

  public function add_Reminder($subject,$user_id){
      $db = db_connect();
      $statement = $db->prepare("INSERT INTO reminders (user_id, subject, created_at) VALUES (:user_id, :subject, NOW())");
      $statement->bindParam(':subject', $subject);
      $statement->bindParam(':user_id', $user_id);
      $statement->execute();
      $db->lastInsertId();
      header('Location: /reminders/index');
      die;
  }

  public function delete_reminder($id) {
    $db = db_connect();
    $statement = $db->prepare("DELETE FROM reminders WHERE id = :id");
    $statement->bindParam(':id', $id);
    $statement->execute();
  }

  public function getRemindersByUser() {
      $db = db_connect();
      $statement = $db->prepare("SELECT u.username, COUNT(r.id) as total_reminders
                                 FROM users u
                                 LEFT JOIN reminders r ON u.id = r.user_id
                                 GROUP BY u.id, u.username");
      $statement->execute();
      $remindersByUser = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $remindersByUser;
  }
  
}