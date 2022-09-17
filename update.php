<?php
ini_set('display_error1', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($dbConn)) {
  $dbConn = require_once("connect.php");
}
if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $id = $_GET['id'];
  $name = $_GET['name'];
  $price = $_GET['price'];
  $company = $_GET['company'];
  $year = $_GET['year'];

  $sql = "UPDATE VideoGames SET id=:id, name=:name, price=:price, company=:company,
    year=:year WHERE id=:id";
  $statement = $dbConn->prepare($sql); //PDOStatement

  $params = [
    ":id" => $id,
    ":name" => $name,
    ":price" => $price,
    ":company" => $company,
    ":year" => $year
  ];

  $result = $statement->execute($params);
  if ($result) {
    $newRec = $dbConn;
  }
} else {
  unset($newRec);
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
    <h1>Update Your Records</h1>
  </header>

  <main>
    <?php 
    if (isset($newRec)) {
      echo "<p>Your Game Has Been Modified Successfully!</p>";
    }
    ?>
    
    <form name="updateForm" method="post">
      <div><label for="id">Id:
          <input type="number" id="id" name="id" value="<?php echo $_GET['id'];?>" required size="50" maxlength="255" readonly ></label>
      </div>
      <div><label for="name">Item Name:
          <input type="text" id="name" name="name" required size="50" maxlength="255" value="<?php echo $_GET['name'];?>"></label>
      </div>
      <div><label for="price">Price:
          <input type="text" id="price" name="price"  required size="5" pattern="(\d*\.)?\d+" value="<?php echo $_GET['price'];?>"></label>
      </div>
      <div><label for="company">Company:
          <input type="text" id="company" name="company"  required size="50" maxlength="255" value="<?php echo $_GET['company'];?>"></label>
      </div>
      <div><label for="year">Year:
          <input type="number" id="year" name="year"  required size="4" placeholder="YYYY" value="<?php echo $_GET['year'];?>"></label>
      </div>

      <div><button type="submit">Update</button>
        <button type="reset">Reset</button>
      </div>
    </form>

    <p><a href="view.php">View All Inventory</a></p>

  </main>
  <footer>
    <address>&copy; 2022 Yunpeng Shan</address>
  </footer>
</body>

</html>