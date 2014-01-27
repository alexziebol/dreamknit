<?php

//Database Credentials
$host = 'localhost';
$database = 'dreamknit';
$username = 'root';
$password = 'root';
 
try {
  $DBH = new PDO("mysql:host=$host;dbname=$database", $username, $password);
 
}
catch(PDOException $e) {
    echo $e->getMessage();
}
 
echo "it works";

?>