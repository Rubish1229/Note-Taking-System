<?php
session_start();
include 'Connectiondb.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $email=$_POST['email'];
    $password=$_POST['password'];

    $sql="SELECT * FROM Users where u_email=?";
    $stmt=$con->prepare($sql);
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $result=$stmt->get_result();

    if($result->num_rows==1)
    {
        $user=$result->fetch_assoc();


        if($password == $user['u_password']){

            $_SESSION['user_id']=$user['u_id'];
            $_SESSION['username']=$user['u_name'];
            echo"login successful";
        }else{
            echo "incorrect passowrd";
        }
    }

}


?>