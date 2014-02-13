<?php

/* Notes

pdo= php data objects
dbh= database handle

prepared statements use fewer resources and runs faster, no SQL injections
*/

//Database Credentials
$host = 'localhost'; // host name
$database = 'dreamknit'; // database name
$username = 'root'; // username
$password = 'root'; // password


// Connect to server and select the chosen database
try {
$dbh = new PDO("mysql:dbname=$database;host=$host", $username, $password); // database driver neutral
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // will fire exceptions as they occur, halting the script
} catch (PDOException $e) {
echo 'Connection failed: ' . $e->getMessage(); // echoes the error message
}


// Check user input from form & assign input to variable
$object = str_replace(array('%','_'),'',$_GET['search_object']); // replace characters with nothing in the search_object variable
if (!$object) // if object is false? -> '' would be n
{
    exit('Invalid form value. Please try again.'); // exit the script with error
}


// Connect to server, select from the table, and search for object
$query = "SELECT attitude, description FROM dreams WHERE object LIKE :search"; // sets sql query command to variable 
$stmt = $dbh->prepare($query); // prepares the query using the server credentials
$stmt->bindValue(':search', '%' . $object . '%', PDO::PARAM_INT); // search is the parameter, value to bind to parameter, data type for parameter
$stmt->execute(); // executes prepared statement


/* Fetch all of the remaining rows in the result set */
echo('<p class="listing-intro">Listing results for the search term: ' . $object . '</p>');

 $result = $stmt->fetchAll(); // returns an array containing all of the result set

foreach( $result as $row ) { // loop through each array item

	echo '<div class="panel panel-default">';
	echo '<div class="panel-heading"><span class="title">Attitude: </span><span class="info">' . $row["attitude"] . '</span></div>';
	echo '<div class="panel-body">';
	echo '<p class="title">Description: </p><p class="info">' . $row["description"] . '</p></div>';
	echo '</div></div>';
}

?>