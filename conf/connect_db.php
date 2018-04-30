<?php

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "db_portfolio";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$conn->query("set names utf8");

?>