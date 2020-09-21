<?php 

    // connect to database
    $conn = mysqli_connect('localhost', 'root', '', 'todo_db');

    // check for errors
    if(!$conn) {
        echo "error connecting to database" . mysqli_connect_error();
    }

?>