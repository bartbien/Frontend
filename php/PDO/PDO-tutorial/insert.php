<?php
/*** mysql hostname ***/
$hostname = 'localhost';

/*** mysql username ***/
$username = 'root';

/*** mysql password ***/
$password = '';

try {
	$dbh = new PDO("mysql:host=$hostname;dbname=animals", $username, $password);
	/*** echo a message saying we have connected ***/
	echo 'Connected to database<br />';

	/*** INSERT data ***/
	$count = $dbh->exec("INSERT INTO animals(animal_type, animal_name) VALUES ('kiwi', 'troy')");

	/*** echo the number of affected rows ***/
	echo $count;

	/*** close the database connection ***/
	$dbh = null;
}
catch(PDOException $e)
{
	echo $e->getMessage();
}
?>