<?php

/*
|--------------------------------------------------------------------------
| DATABASE CONFIGURATION
|--------------------------------------------------------------------------
|
| We will use this file when the dashboard is connected to MySQL.
|
*/

$host = "localhost";
$username = "root";
$password = "";
$database = "clinic_surgery_system";


$conn = new mysqli(
    $host,
    $username,
    $password,
    $database
);


if ($conn->connect_error) {

    die(
        "Database connection failed: " .
        $conn->connect_error
    );

}


$conn->set_charset("utf8mb4");

?>