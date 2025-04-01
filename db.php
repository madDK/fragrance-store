<?php
$host = 'sql108.hstn.me';
$user = 'mseet_38638554';
$password = '9AhTQto51X7s';
$dbname = 'mseet_38638554_perfume';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>