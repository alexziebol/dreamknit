<?php

//Database Credentials
$host = 'localhost'; // host name
$database = 'dreamknit'; // database name
$username = 'root'; // username
$password = 'root'; // password


// Connect to server and select the chosen database
try {
$dbh = new PDO("mysql:dbname=$database;host=$host", $username, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
echo 'Connection failed: ' . $e->getMessage();
}


// Check user input from form & assign input to variable
$object = str_replace(array('%','_'),'',$_GET['search_object']);
if (!$object)
{
    exit('Invalid form value: '.$object);
}


// Connect to server, select from the table, and search for object
$query = "SELECT description FROM dreams WHERE object LIKE :search";
$stmt = $dbh->prepare($query);
$stmt->bindValue(':search', '%' . $object . '%', PDO::PARAM_INT);
$stmt->execute();


/* Fetch all of the remaining rows in the result set */
print("Fetch all of the remaining rows in the result set:\n");

 $result = $stmt->fetchAll();

foreach( $result as $row ) {
    print $row["attitude"];
    print $row["description"];
}

?>