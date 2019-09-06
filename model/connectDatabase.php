<?php
// require_once "DataHandler.php";
$servername = "localhost";
$username = "ilias_admin";
$password = "Admin4a7a";
$dbname = "ilias_multiversum";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
