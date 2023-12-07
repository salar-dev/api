<?php

include 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'PUT'){
    $data = json_decode(file_get_contents('php://input'), true);

    $name = $data['name'];
    $email = $data['email'];
    $age = $data['age'];
    $id = $data['id'];

    $sql = "UPDATE users SET name='$name', email='$email', age=$age WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "User updated successfully"]);
    } else {
        echo json_encode(["error" => "Error updating user: " . $conn->error]);
    }
}

$conn->close();
