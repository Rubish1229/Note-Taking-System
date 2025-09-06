<?php
include "Connectiondb.php";

$id = $_GET['id']; 
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $title = $_POST['n_title'];
    $note  = $_POST['n_note'];

    $sql = "UPDATE newnotes SET n_title='$title', n_note='$note' WHERE n_id=$id";

    if ($con->query($sql)) {
        header("Location: collection.php");
        exit();
    } else {
        echo "Error: " . $con->error;
    }
} else {
    
            $sql = "SELECT * FROM newnotes WHERE n_id=$id";
            $result = $con->query($sql);
            $row = $result->fetch_assoc();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="homepage.css">
    <link rel="stylesheet" href="collection.css">
    <link rel="stylesheet" href="update.css">


</head>
<body>
    <nav>
        <ul>
            <li><i class="fa-solid fa-user"></i></li>
            <li><p id="profileName">Hello User!</p></li>
        </ul>
    </nav>
<div class="box">
    <div class="left">
        <ul>
            <li><a href="firstpage.php"><i class="fa-solid fa-house-chimney icon" ></i>Home</a></li>
            <li><a href="search.php"><i class="fa-solid fa-magnifying-glass icon"></i>Search </a></li>
            <li><a href="collection.php"><i class="fa-solid fa-bookmark icon"></i>Collection</a></li>
           
            
        </ul>

        <div class="exit">
         <a href="login.html"> <i class="fa-solid fa-right-from-bracket fa-flip "></i></a>
        </div>
    </div>


    <div class="main">
    <div class="head">
    <h1>Update your note</h1> </div>
   
    <div class="updateForm">
        

<form method="post">
    <div class="first">
    <p>Title: </p><input type="text" name="n_title" value="<?php echo $row['n_title']; ?>"><br><br>
     </div>
     <div class="second">
    <p>Note: </p><textarea name="n_note"><?php echo $row['n_note']; ?></textarea><br><br>
    </div>  
    <div class="btn">
  <button type="submit">Update</button>
</div> 
  
</form>
</div>

</div>