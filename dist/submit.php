<?php

//Database Credentials
$host = 'localhost'; // host name
$database = 'dreamknit'; // database name
$username = 'root'; // username
$password = 'root'; // password

// Get values from form and assign to variables
$object = $_POST['object'];
$attitude = $_POST['attitude'];
$description = $_POST['description'];

// Connect to server and select the chosen database
$pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password, array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));

try{
    $query = $pdo->prepare("insert into dreams (object,attitude,description)
    values (:object,:attitude,:description)");
    $data = array(
    ':object' => $object,
    ':attitude' => $attitude,
    ':description' => $description
    );
    $query->execute($data);
    echo "Data successfully inserted into the database table ...";
    }catch(PDOException $e){
    echo "Error! failed to insert into the database table :".$e->getMessage();
}

?>