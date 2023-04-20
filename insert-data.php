<?php

include_once "conn.php";

$name = mysqli_escape_string($conn, $_POST['name']);
$phone = mysqli_escape_string($conn, $_POST['phone']);
$class = mysqli_escape_string($conn, $_POST['class']);

$sql = "INSERT INTO students (name, phone, class) VALUES ('{$name}','{$phone}','{$class}')";

// $result = mysqli_query($conn, $sql) or die("Insert Query failed: " .  mysqli_error($conn));

if (mysqli_query($conn, $sql)) {
    echo 1;
} else {
    echo 0;
}
