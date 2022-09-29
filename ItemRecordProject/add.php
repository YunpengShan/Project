<?php
ini_set('display_error1', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($dbConn)) {
  $dbConn = require_once("connect.php");
}


if ($_SERVER['REQUEST_METHOD'] === "POST") {

  $name = $_POST["name"];
  $price = $_POST["price"];
  $company = $_POST["company"];
  $year = $_POST["year"];

  if (!isset($errors)) {

    $sql = "INSERT INTO VideoGames(name, price, company, year) 
   VALUES(:name, :price, :company, :year);";

    $params = [
      ":name" => $name,
      ":price" => $price,
      ":company" => $company,
      ":year" => $year
    ];

    $statement = $dbConn->prepare($sql); //PDOStatement
    $result = $statement->execute($params);

    if ($result) {
      $newGame = $dbConn->lastInsertId();
    } else {
      echo "<p>Your record couldn't be added to the database.</p>";
    }
  }
} else {
  unset($newGame);
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
    <h1>Add Your Records</h1>
  </header>

  <main>
    <?php
    if (isset($newGame)) {
      echo "<p>Your record was added successfully.</p>";
    }

    ?>

    <form name="insertForm" method="post">
      <div><label for="name">Item Name:</label>
          <input type="text" id="name" name="name" required>
      </div>
      <div><label for="price">Price:</label>
          <input type="text" id="price" name="price" required pattern="(\d*\.)?\d+">
      </div>
      <div><label for="company">Company:</label>
          <input type="text" id="company" name="company" required >
      </div>
      <div><label for="year">Year:</label>
          <input type="number" id="year" name="year" required placeholder="YYYY">
      </div>

      <div><button class="button" type="submit">Submit</button>
        <button class="button" type="reset">Reset</button>
      </div>
    </form>

    <p><a href="index.php">View All Inventory</a></p>

  </main>
    <footer>
        <address>&copy; 2022 Yunpeng Shan</address>
    </footer>
</body>

</html>