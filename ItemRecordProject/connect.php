<?php
//PDO = PHP Data Objects
//PDO() constructor: create the connection to your data base
require("config.php");

function connect($hostname, $db, $user, $passwd) {
    try {
        $connString = "mysql:host=$hostname;dbname=$db";
      return  $dbConn = new PDO($connString, $user, $passwd);
    } catch (PDOException $ex) {
        echo "Connection Error: ".$ex->getMessage();
    }
}
return connect($hostname, "shanyunp_Summer22", $user, $passwd);

?>