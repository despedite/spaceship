<?php

session_start();
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'spaceship');

$username = $_GET["username"];
$name     = $_GET["name"];

$query = ('DELETE FROM favoritos
		  WHERE name="'.$name.'" AND username="'.$username.'"');

print($query);

mysqli_query($db, $query);

header('location: ./');	

?>