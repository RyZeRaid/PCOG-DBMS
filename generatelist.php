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

$stmt = null;
$results = [];
 
$mode = $_GET['mode'];

if($mode == 'count'){
    $stmt = $conn->query("SELECT COUNT(id) FROM member");

}elseif($mode == 'generate'){
    $amount = $_GET['amount'];

    if($amount == ""){
        echo '<span style="color:red;">Please Enter The Number Of Members That Will Be In Attendance</span>';
    }else{
        $stmt = $conn->query("SELECT * FROM priority1 LIMIT " . $amount);
    }
    
}

if($stmt != null){
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}


if($mode == 'count'){
    $members = reset($results);
    echo reset($members);

}elseif($mode == 'generate'){

    if(count($results)>0){
        echo "<table id=\"generatedTable\" border =\"1\" style='border-collapse: collapse'>";

        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>First Name</th>";
        echo "<th>Last Name</th>";
        echo "<th>Position</th>";
        echo "<th>Priority</th>";
        echo "<tr>";

        foreach ($results as $row){
            echo "<tr> \n";
            echo "<td>" .$row['id']. "</td> \n";
            echo "<td>" .$row['firstname']. "</td> \n";
            echo "<td>" .$row['lasttname']. "</td> \n";
            echo "<td>" .$row['position']. "</td> \n";
            echo "<td>" .$row['priority']. "</td> \n";
            echo "<tr>";
        }

        echo "</table>";
    }
    
}

