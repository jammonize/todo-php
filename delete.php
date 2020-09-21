<?php

if(isset($_POST['delete'])) {
    $delete_by_id = mysqli_real_escape_string($conn, $_POST['delete_by_id']);

    $sql = "DELETE FROM todos WHERE id = $delete_by_id";

    if(mysqli_query($conn, $sql)) {
        header('Location: index.php');
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }
}

?>