<?php
session_start();
include 'Connectiondb.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $c_name = $_POST['c_name'];
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO Categories (c_name, user_id)
        VALUES(?,?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("si", $c_name, $user_id);


    if ($stmt->execute()) {
        echo "category inserted successful";
    } else {
        echo "error " . $stmt->error;
    }

    $stmt->close();
    $con->close();
} else {
    echo "Invalid";
}
