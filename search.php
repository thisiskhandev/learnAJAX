<?php

include_once "conn.php";

$searchTerm = $_POST['searchTerm'];

$sql = "SELECT * FROM students
        WHERE name LIKE '%{$searchTerm}%'
        OR phone LIKE '%{$searchTerm}%' ORDER BY name ASC";

$result = mysqli_query($conn, $sql) or die("Search Query failed: " . mysqli_error($conn));
$output = "";
if (mysqli_num_rows($result) > 0) {
    foreach ($result as $keys) {
        // echo "<pre>";
        // print_r($keys);
        // echo "</pre>";
        $output .= "
        <tr s-data-id='{$keys['id']}'>
            <td>{$keys['id']}</td>
            <td>{$keys['name']}</td>
            <td>{$keys['class']}</td>
            <td>{$keys['phone']}</td>
            <td>
                <a class='btn_icons edit modal-trigger' href='#editModal' id='{$keys['id']}' data-id='{$keys['id']}'>
                  <i class='small material-icons'>edit</i>
                </a>
            </td>
            <td>
                <a class='btn_icons delete modal-trigger' href='#modal1' id='{$keys['id']}' data-id='{$keys['id']}'>
                  <i class='small material-icons red-text'>delete</i>
                </a>
            </td>
        </tr>";
        echo $output;
        // mysqli_close($conn);
    }
} else {
    echo "<h5>No Student found!</h5>";
}
