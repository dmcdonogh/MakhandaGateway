<?php

$server = 'is3-dev.ict.ru.ac.za';
$user = 'G23M3169';
$password = 'McdDyl21';
$dbname = 'thegateway5';

$conn = new mysqli($server, $user, $password, $dbname);

if ($conn->connect_error) {
    die('Database connection failed: ' . $conn->connect_error);
}
?>