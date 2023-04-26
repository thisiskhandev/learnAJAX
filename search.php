<?php

include_once "conn.php";

$searchTerm = mysqli_escape_string($conn, $_POST['searchTerm']);

$limit_per_page = 10;

$sql = "SELECT * FROM students
        WHERE name LIKE '%{$searchTerm}%'
        OR phone LIKE '%{$searchTerm}%' 
        ORDER BY name ASC
        LIMIT 0, {$limit_per_page}";

$result = mysqli_query($conn, $sql) or die("Search Query failed: " . mysqli_error($conn));
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
        </tr>";
    }
    $output .= "</tbody></table>";
    mysqli_close($conn);
    echo $output;
} else {
    echo "<h5>No Student Record found!</h5>";
}
