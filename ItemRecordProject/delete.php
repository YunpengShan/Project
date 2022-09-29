<?php
ini_set('display_error1', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($dbConn)) {
  $dbConn = require_once("connect.php");
}
//when form action is post
if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $id = $_GET['id'];
  $name = $_GET['name'];
  $price = $_GET['price'];
  $company = $_GET['company'];
  $year = $_GET['year'];
 
  $sql = "DELETE FROM VideoGames WHERE id=:id AND name=:name AND price=:price AND company=:company AND year=:year";
  $statement = $dbConn->prepare($sql); //PDOStatement

  $params = [
    ":id" => $id,
    ":name" => $name,
    ":price" => $price,
    ":company" => $company,
    ":year" => $year
  ];
  
  $result = $statement->execute($params);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Video Games Database</title>
  <meta name="author" content="Yunpeng Shan">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main.css">
</head>

<body>
  <header>
    <h1>Delete Your Records</h1>
  </header>

  <main>
    <?php 
    if (isset($result)) {
      echo "<p>Your Game Has Been Deleted Successfully!</p>";
    }
    ?>
    
    <form name="deleteForm" method="post">
    <div><label for="id">Id:
          <input type="number" id="id" name="id" value="<?php echo $_GET['id'];?>" required size="50" maxlength="255" readonly></label>
      </div>
      <div><label for="name">Item Name:
          <input type="text" id="name" name="name" required size="50" maxlength="255" value="<?php echo $_GET['name'];?>" readonly></label>
      </div>
      <div><label for="price">Price:
          <input type="text" id="price" name="price"  required size="5" pattern="(\d*\.)?\d+" value="<?php echo $_GET['price'];?>" readonly></label>
      </div>
      <div><label for="company">Company:
          <input type="text" id="company" name="company"  required size="50" maxlength="255" value="<?php echo $_GET['company'];?>" readonly></label>
      </div>
      <div><label for="year">Year:
          <input type="number" id="year" name="year"  required size="4" placeholder="YYYY" value="<?php echo $_GET['year'];?>" readonly></label>
      </div>
      <div><button type="submit">Delete</button>
      </div>
    </form>

    <p><a href="index.php">View All Inventory</a></p>

  </main>
  <footer>
    <address>&copy; 2022 Yunpeng Shan</address>
  </footer>
</body>

</html>