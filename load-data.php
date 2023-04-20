<?php

include_once "conn.php";

echo "<pre>";

echo "</pre>";


$sql = "SELECT * FROM students ORDER BY id DESC;";
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
            <td>
                <button class='btn_icons edit' id='' data-id=''>
                  <i class='small material-icons'>edit</i>
                </button>
            </td>
            <td>
                <button class='btn_icons delete' id='' data-id=''>
                  <i class='small material-icons red-text'>delete</i>
                </button>
            </td>
        </tr>";
    }
    mysqli_close($conn);
    echo $output; // It will print on index.php
} else {
    echo "<h2>No data found!</h2>";
}
