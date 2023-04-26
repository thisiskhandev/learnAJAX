<?php

include_once "conn.php";

$limit_per_page = 5;
$currentPage = "";
if (isset($_POST["pageNo"])) {
    $currentPage = $_POST["pageNo"];
} else {
    $currentPage = 1;
}

echo "Offset: " .  $offset = ($currentPage - 1) * $limit_per_page;
echo "<br> Current page number: " . $currentPage;

$sql = "SELECT * FROM students 
ORDER BY id DESC
LIMIT {$offset}, {$limit_per_page}";


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
    } // loop closed
    $output .= "</tbody></table>";

    $sql_total = "SELECT * FROM students";
    $result_total = mysqli_query($conn, $sql_total) or die("Pagination fetch Query failed: " . mysqli_error($conn));
    echo "<br> Total rows: " . $total_records = mysqli_num_rows($result_total);
    echo "<br> Total Pages: " . $total_pages = ceil($total_records / $limit_per_page);
    $output .= "<div class='pagi_sec'><ul class='pagination'>";
    if ($currentPage > 1) {
        $prevPage = $currentPage - 1;
        $output .= "<li class='waves-effect'><a id='{$prevPage}'><i class='material-icons'>chevron_left</i></a></li>";
    }
    for ($i = 1; $i <= $total_pages; $i++) {
        if ($currentPage == $i) {
            $active = "active";
        } else {
            $active = "";
        }
        $output .= "<li class='waves-effect {$active}'><a id={$i}>{$i}</a></li>";
    }
    if ($total_pages > $currentPage) {
        $NextPage = $currentPage + 1;
        $output .= "<li class='waves-effect'><a id='{$NextPage}'><i class='material-icons'>chevron_right</i></a></li>";
    }
    $output .= "</ul></div>";
    mysqli_close($conn);
    echo $output; // It will print on index.php
} else {
    echo "<h2>No Record found!</h2>";
}
