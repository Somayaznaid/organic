<?php
include "connection.php";

if (isset($_POST["id"])) {
    $id = mysqli_real_escape_string($conn, $_POST["id"]);

    $sql = "SELECT * FROM `products` WHERE `id` = '$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Output the result as JSON
        echo json_encode($row);
    } else {
        echo "No results found.";
    }
}
