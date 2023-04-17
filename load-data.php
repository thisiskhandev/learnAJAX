<?php

include_once "conn.php";

$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql) or die("Show Query failed: " . mysqli_error($conn));
$output = "";
if (mysqli_num_rows($result) > 0) {

    foreach ($result as $keys) {
        $output .= "
        <tr>
            <td>{$keys['id']}</td>
            <td>{$keys['name']}</td>
            <td>{$keys['class']}</td>
            <td>{$keys['phone']}</td>
        </tr>";
    }
    mysqli_close($conn);
    echo $output; // It will print on index.php
} else {
    echo "<h2>No data found!</h2>";
}
