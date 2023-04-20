<?php

include_once "conn.php";

$id = mysqli_escape_string($conn, $_POST['id']);
$name = mysqli_escape_string($conn, $_POST['name']);
$phone = mysqli_escape_string($conn, $_POST['phone']);
$class = mysqli_escape_string($conn, $_POST['class']);

$sql = "UPDATE students SET name = '{$name}', phone = '{$phone}', class = '{$class}' WHERE id = {$id}";

if (mysqli_query($conn, $sql)) {
    echo 1;
} else {
    echo 0;
}
