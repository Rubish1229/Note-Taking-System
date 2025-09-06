<?php

include 'Connectiondb.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $c_name = $_POST['c_name'];
   
    $sql = "INSERT INTO newCategories (c_name) VALUES (?)";
        
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $c_name);


    if ($stmt->execute()) {
        header("Location: firstpage.php");
        exit();
        // echo "category inserted successful";
    } else {
        echo "error " . $stmt->error;
    }

    $stmt->close();
    $con->close();
} else {
    echo "Invalid";
}
