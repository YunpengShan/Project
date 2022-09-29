<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($dbConn))
    $dbConn = require("connect.php");
    // if the submit button was presed to get here
    // we are processing the form ie. someone pressed submit button
    if (isset($_POST["btnSubmit"])) {
    $option =  $_POST["company"];
    $sql = "SELECT * FROM VideoGames WHERE company LIKE :option ORDER BY year DESC, price DESC;";
    $params = [":option" => "%$option%"];
    // "% + $search + %" doesn't work
    // name LIKE %:search% nope, nope
    $statement = $dbConn->prepare($sql);
    $result = $statement->execute($params);
    } else { //not a form submission i.e url/bookmark/link/whatever
    //create an SQL satement that selects all the
    //inventory records, sorted by name
    //execute the sql statement - WRITE IT!
    $sql = "SELECT * FROM VideoGames ORDER BY year DESC, price DESC;";
    $statement = $dbConn->prepare($sql); //PDOStatement
    $result = $statement->execute();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="ISO-8859-1">
    <title>Video Games Records</title>
    <!-- add your CSS -->
    <link rel="stylesheet" href="css/main.css">

<body>

    <header>
        <h1>Video Games Records</h1>
        <h2>Search for Games</h2>
    </header>

    <main>
        <p><a href="add.php">Go to Add Records Page</a></p>
        <form method="post">
            <div class="middle">
            <p><label for="search">Search By Company:</label>
                <select value="company" name="company">
                    <?php
                    $options = ["", "FromSoftWare", "Techland", "Nintendo",
                    "BlueTwelve Studio", "Guerrilla Games", "Two Point Studios",
                    "Hazelight Studios", "Studio MDHR", "MiHoYo", "Lala"];

                    foreach ($options as $op) {
                        if ($op == "") {
                            echo "<option value=$op>--ALL--</option>\n";
                        } else {
                        echo "<option value=$op>$op</option>\n";
                        }
                    }
                    ?>
                </select>
                </div>
                <input type="submit" value="Search" name="btnSubmit">
            </p>
        </form>

        <?php
        if ($result) { // query was successful
            echo "<table>\n<caption>Video Games List</caption>\n
            <tr><th>Id</th><th>Name</th><th>Price</th><th>Company</th>
            <th>Year</th><th>Action</th></tr>\n";

            // $statement->fetch() = return one row as an associative array
            // $row = $statement->fetch() -> a record, OR false if EOF
            // while ($row)
            // fetch a record, store it in $row
            // loop while $row is not the bool value false
            $numRecords = 0;
            while ($row = $statement->fetch()) {
                echo "<tr><td>". $row["id"]
                    . "</td><td>" . $row["name"] 
                    . "</td><td>" . $row["price"]
                    . "</td><td>" . $row["company"] 
                    . "</td><td>" . $row["year"]
                    . "</td><td><a href='update.php?id=$row[id]&name=$row[name]&price=$row[price]&company=$row[company]&year=$row[year]'>Update</a>
                        <a href='delete.php?id=$row[id]&name=$row[name]&price=$row[price]&company=$row[company]&year=$row[year]'>Delete</a></td>";
                $numRecords++;
            }
            if ($numRecords == 0) {
                echo "</table>\n<p>Sorry, No Records Found.</p>";
            } else {
                echo "</table>\n<p>$numRecords Records Found.</p>";
            }
        }
        ?>
    </main>
    <footer>
        <address>&copy; 2022 Yunpeng Shan</address>
    </footer>
</body>

</html>