
<?php
 include 'Connectiondb.php';

 if($_SERVER['REQUEST_METHOD']=="POST"){
    $n_title=$_POST['title'];
    $c_id=$_POST['cat_id'];
    $n_note=$_POST['note'];
    
    
    // echo "Title: $n_title <br>";
    // echo "Category: $c_id <br>";
    // echo "Note: $n_note <br>";
 

 $sql="INSERT INTO  newNotes(n_title,Category_id,n_note) VALUES (?,?,?)";
 $stmt=$con->prepare($sql);
 $stmt-> bind_param("sis",$n_title,$c_id,$n_note);

 if($stmt->execute()){
    header("Location: firstpage.php");
    // echo "note inserted";
 }
 else{
    echo"note not inserted".$stmt->error;
 }
 }
 $categoryQuery="SELECT c_id,c_name FROM newCategories";
 $result=$con->query($categoryQuery);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="homepage.css">


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
            <li> <i class="fa-solid fa-house-chimney icon" ></i>Home</li>
            <li><a href="search.php"><i class="fa-solid fa-magnifying-glass icon"></i>Search </a></li>
            <li><a href="collection.php"><i class="fa-solid fa-bookmark icon"></i>Collection</a></li>
           
            
        </ul>

        <div class="exit">
         <a href="login.html"> <i class="fa-solid fa-right-from-bracket fa-flip "></i></a>
        </div>
    </div>



    <div class="right">
        <div class="categoryBox">
              <div class=" divAdd">
                <form action="category.php" method="POST">
                 <input type="text" id="newcategory" name="c_name" placeholder="Add a new category">
                <div class="categoryBtn">
                    <button type="submit">Add</button>
                    </div>
                 
                </form>
            </div>
        </div>
      <div class="noteBox">
        <div class="outline">
            <form action="firstpage.php" method="POST">
          
            <div class="divs div1">
               <input type="text" id="title" name="title" placeholder="Enter your title">
               
            </div>
       <div class="divs div2">
     
    <select name="cat_id" id="notecategory"  class="select" required>
      <option value=""> Select Category </option>
      <?php
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo "<option value='" . $row['c_id'] . "'>" . $row['c_name'] . "</option>";
          }
      }
      ?>
    </select><br><br>





            <div class=" divs div3">
                <textarea name="note" id="note" placeholder="Add a note" class="note"></textarea>
            </div>
            <div class="submitBtn">
            <button>Save</button>
            </div>
        </form>
      </div>
   
     </div>
     </div>
     </div>
    
    <script src="homepage.js"></script>
</body>
</html>