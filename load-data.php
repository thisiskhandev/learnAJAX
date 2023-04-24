<?php

include_once "conn.php";

echo "<pre>";

echo "</pre>";


$sql = "SELECT * FROM students ORDER BY id DESC;";
$result = mysqli_query($conn, $sql) or die("Show Query failed: " . mysqli_error($conn));
$output = "";
if (mysqli_num_rows($result) > 0) {
    $output .= "
    <table>
    <thead class='light-blue lighten-2 white-text'>
        <tr>
            <th>Id</th>
            <th>Full Name</th>
            <th>Class</th>
            <th>Phone</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
    ";
    foreach ($result as $keys) {
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
        </tr>
        ";
    }
    $output .= "
    </tbody></table>
    <div class='pagi_sec'>
        <ul class='pagination'>
            <li class='disabled'><a href='#!'><i class='material-icons'>chevron_left</i></a></li>
            <li class='active waves-effect'><a href='#!'>1</a></li>
            <li class='waves-effect'><a href='#!'>2</a></li>
            <li class='waves-effect'><a href='#!'>3</a></li>
            <li class='waves-effect'><a href='#!'>4</a></li>
            <li class='waves-effect'><a href='#!'>5</a></li>
            <li class='waves-effect'><a href='#!'><i class='material-icons'>chevron_right</i></a></li>
        </ul>
    </div>
    ";
    mysqli_close($conn);
    echo $output; // It will print on index.php
} else {
    echo "<h2>No Record found!</h2>";
}
