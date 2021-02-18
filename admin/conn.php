<?php
$servername = "localhost";
$username = "arogyam_user";
$password = "Z*nb_K@Ew[J7";
$Db="arogyam_db";



// Create connection
$connect = mysqli_connect($servername, $username, $password,$Db);

//echo "<pre>"; echo print_r($connect); echo "</pre>"; 

// Check connection
if (!$connect) {
  die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
?>

