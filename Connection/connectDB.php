<?php
$servername = "localhost";    //Hosting / 127.0.0.1
$username = "admin_internship"; //User Databass
$password = "ZAuPDcMLoF@2022";  //User Password
$dbname = "db_internship";  //Database Name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Change character set to utf8
$conn -> set_charset("utf8");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//else{
//  echo "Connnect Successfully!";
//}

?>
