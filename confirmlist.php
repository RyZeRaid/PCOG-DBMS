<?php

session_start();
 
$host = 'localhost';
$username = 'new_user';
$password = 'password123';
$dbname = 'churchofgoddb';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
if(!$conn){
    echo'Connection Error:' . mysqli_connect_error();
}

$idNum = $_GET['id'];

$stmt = $conn->query("SELECT * FROM priority1 WHERE id=$idNum");

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($result as $mm){
    echo $mm['firstname'];
}