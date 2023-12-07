<?php

include 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        echo json_encode($rows);
    } else {
        echo json_encode(["message" => "No users found"]);
    }
}

$conn->close();