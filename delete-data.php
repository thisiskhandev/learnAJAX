<?php

include_once "conn.php";

$id = mysqli_escape_string($conn, $_POST['id']);

$sql = "DELETE FROM students WHERE id = {$id}";

if(mysqli_query($conn, $sql)) {
    echo 1;
} else {
    echo 0;
}

?>