<?php

include "Connectiondb.php";

$id=$_GET['id'];

$sql="DELETE FROM newnotes WHERE n_id=$id";

if($con->query($sql)){
    header("Location: firstpage.php");
    exit();
    // echo"Deleted successfully!";
}else{
    echo "Error not deleted !".$con->error;
}

?>