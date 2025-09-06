<?php

include 'Connectiondb.php';


if($_SERVER['REQUEST_METHOD']=='POST'){
$u_name=$_POST['username'];
$u_email=$_POST['email'];
$u_password=$_POST['password'];

$sql="INSERT INTO Users (u_name, u_email, u_password)
        VALUES(?,?,?)";
$stmt=$con->prepare($sql);
$stmt->bind_param("sss",$u_name,$u_email,$u_password);


if($stmt->execute()){
   header("Location: login.html");
   exit();
}
else{
    echo"error in registration". $stmt->error;
}

$stmt->close();

}

$con->close();
?>