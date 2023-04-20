<?php

$conn = mysqli_connect("localhost", "root", "", "db_school") or die("Connection failed: " . mysqli_connect_errno());

// $HOST_NAME = "learnAJAX";
// $currentPage = str_replace($HOST_NAME, "", $_SERVER['REQUEST_URI']);
// $currentPage = str_replace("/", "", $currentPage);

// if ($currentPage == "load-data.php") {
//     header("location: /$HOST_NAME");
// } elseif ($currentPage == "insert-data.php") {
//     header("location: /$HOST_NAME");
// }
