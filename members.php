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

$member = $_REQUEST['member'];
$context = $_REQUEST['context'];

if($member != ""){
    $member = filter_var($member, FILTER_SANITIZE_STRING);
    $member = trim($member);
}

if($member === ""){
    $stmt = $conn->query("SELECT * FROM member");
}else {
    $stmt = $conn->query("SELECT * FROM member WHERE firstname LIKE '%$member%'");
}


$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<table border =\"1\" style='border-collapse: collapse'>";

echo "<tr>";
echo "<th>ID</th>";
echo "<th>First Name</th>";
echo "<th>Last Name</th>";
echo "<th>Gender</th>";
echo "<th>Email</th>";
echo "<th>Age</th>";
echo "<th>Position</th>";
echo "<th>Home Address</th>";
echo "<th>Phone Number</th>";
echo "<th>Date of Birth</th>";
echo "</tr>";

foreach ($results as $row){
    echo "<tr> \n";
    echo "<td>" .$row['id']. "</td> \n";
    echo "<td>" .$row['firstname']. "</td> \n";
    echo "<td>" .$row['lasttname']. "</td> \n";
    echo "<td>" .$row['gender']. "</td> \n";
    echo "<td>" .$row['email']. "</td> \n";
    echo "<td>" .$row['age']. "</td> \n";
    echo "<td>" .$row['position']. "</td> \n";
    echo "<td>" .$row['home_address']. "</td> \n";
    echo "<td>" .$row['phonenumber']. "</td> \n";
    echo "<td>" .$row['date_of_birth']. "</td> \n";
    echo "</tr>";
}
echo "</table>";