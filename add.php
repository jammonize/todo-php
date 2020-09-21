<?php

include('config/db_config.php');

// errors
$task = '';
$errors = array($task => '');

if(isset($_POST['submit'])) {

    if(empty($_POST['task'])) {
      $errors['task'] = "Please enter a task";
    } else {
      $task = $_POST['task'];
      if(!preg_match('/^[a-zA-Z\s]+$/', $task)) {
        $errors['task'] = 'Task must be letters and spaces only';
    }
  }

  if(array_filter($errors)) {
  } else {
    $task = mysqli_real_escape_string($conn, $_POST['task']);
  }

  $sql = "INSERT INTO todos(task) VALUES('$task')";
  
  if(mysqli_query($conn, $sql)) {
    //success
  } else {
    echo 'query error: ' . mysqli_error($conn);
  }
}

?>