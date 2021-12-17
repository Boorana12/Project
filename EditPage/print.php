<?php
session_start();
include_once "../Connection/db.php";
echo $_SESSION["username"];
echo $_SESSION["admin"];

?>