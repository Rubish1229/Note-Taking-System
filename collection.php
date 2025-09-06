<?php
include "Connectiondb.php";

$sql="SELECT n_id,n_title,n_note,n_created,n_updated,c_name FROM newnotes
    JOIN newCategories ON Category_id=c_id";

    $result=$con->query($sql);
    if(!$result){
    die("Query Failed: " . $con->error);
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
    <div class="collectionSide">
    <h1>Note Collection</h1>
    <table border="1" cellpadding="6" class="tb">
        <tr>
            <th>Title</th>
            <th>Category</th>
            <th>Note</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Action</th>
        </tr>
        <?php
        if($result->num_rows>0)
        {
            while($row=$result->fetch_assoc()){
                echo "<tr>";
                echo "<td>".$row['n_title']."</td>";
                echo "<td>".$row['c_name']."</td>";
                echo "<td>".$row['n_note']."</td>";
                echo "<td>".$row['n_created']."</td>";
                echo "<td>".$row['n_updated']."</td>";  

                echo"<td>
                    <a href='update.php?id=".$row['n_id']."'class='update'>UPDATE</a> | 
                    <a href='delete.php?id=".$row['n_id']."'class='delete'>DELETE</a>  
                </td>";
                echo "</tr>";
            }
        }

        ?>

    </table>
    </div>
    </div>
</body>
</html>