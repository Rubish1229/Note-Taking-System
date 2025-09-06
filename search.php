<?php
include 'Connectiondb.php';



$searchResult = null;
if (isset($_GET['search'])) {
    $searchTitle = "%" . $_GET['search'] . "%"; 
    $sql = "SELECT n.n_id, n.n_title, n.n_note, c.c_name 
            FROM newNotes n
            JOIN newCategories c ON n.Category_id = c.c_id
            WHERE n.n_title LIKE ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $searchTitle);
    $stmt->execute();
    $searchResult = $stmt->get_result();
}

$categoryQuery = "SELECT c_id, c_name FROM newCategories";
$result = $con->query($categoryQuery);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Notes Search</title>
  <link rel="stylesheet" href="search.css">
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
            <li> <a href="firstpage.php"><i class="fa-solid fa-house-chimney icon" ></i>Home</a></li>
            <li><a href=""><i class="fa-solid fa-magnifying-glass icon"></i>Search </a></li>
            <li><a href="collection.php"><i class="fa-solid fa-bookmark icon"></i>Collection</a></li>
           
            
        </ul>

        <div class="exit">
         <a href="login.html"> <i class="fa-solid fa-right-from-bracket fa-flip "></i></a>
        </div>
    </div>



    
   <div class="right">
    <div class="divv1">

    <h2 >Search Note</h2>
    <form method="GET">
        <input type="text" name="search" placeholder="Enter title to search">
        <button type="submit" class="searchBtn">Search</button>
    </form>

    </div>

    <div class="divv2">
    <?php if ($searchResult) { ?>
        <h2>Search Results:</h2>
        <table border="2" cellpadding="5" class="tab">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Note</th>
                <th>Category</th>
            </tr>
            <?php while ($row = $searchResult->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row['n_id'] ?></td>
                    <td><?= htmlspecialchars($row['n_title']) ?></td>
                    <td><?= htmlspecialchars($row['n_note']) ?></td>
                    <td><?= htmlspecialchars($row['c_name']) ?></td>
                </tr>
            <?php } ?>
        </table>
    <?php } ?>
    </div>
    </div>
    
</body>
</html>
