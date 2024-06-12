<?php
/*
$servername = "localhost";
$username = "cartsenc_festus";
$password = "AbbY@Nz!26@FeZzaH";
$dbname = "cartsenc_cartsen";
*/
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cartsen";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>