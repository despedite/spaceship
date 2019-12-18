<?php

session_start();


// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'spaceship');

// initializing variables
$username = $_SESSION['username'];
$link     = mysqli_real_escape_string($db, $_POST['link']);
$name     = mysqli_real_escape_string($db, $_POST['name']);
$img      = mysqli_real_escape_string($db, $_POST['img']);
$errors = array(); 

print("A: " . $username . " - B: " . $link . " - C: " . $name . " - D: " . $img);

$user_check_query = "SELECT * FROM favoritos WHERE name='$name'";
$result = mysqli_query($db, $user_check_query);
$row_cnt = mysqli_num_rows($result);

if($row_cnt == 0) {
	$query = "INSERT IGNORE INTO favoritos (username, link, name, img) 
  			  VALUES('$username', '$link', '$name', '$img')";
			  /*todo: checkear valores duplicados*/
}
print($query);
mysqli_query($db, $query);
$_SESSION['success'] = "¡La canción fue añadida correctamente a Favoritos!";
header('location: ../favorites');
?>