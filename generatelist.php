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
 
$mode = $_GET['mode'];

if($mode == 'count'){
    $stmt = $conn->query("SELECT COUNT(id) FROM member");

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $members = reset($results);
    $numMembers = reset($members);
    echo $numMembers;

}elseif($mode == 'generate'){
    $amount = $_GET['amount'];

    $stmt = $conn->query("SELECT COUNT(id) FROM member");

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $members = reset($results);
    $numMembers = reset($members);

    if($amount == "" || $amount == 0){
        echo '<span style="color:red;">Please Enter The Number Of Members That Will Be In Attendance</span>';
    }elseif($amount > $numMembers){
        echo '<span style="color:red;">Please Enter '.$numMembers.' Or Less Members </span>';
    }else{

        echo "<table id=\"generatedTable\" border =\"1\" style='border-collapse: collapse'>";

        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>First Name</th>";
        echo "<th>Last Name</th>";
        echo "<th>Position</th>";
        echo "<th>Priority</th>";
        echo "<tr>";

        $x=0;
        $workingPriority = 0;

        while($x < $amount){

            $stmt = $conn->query("SELECT * FROM priority1 WHERE priority='$workingPriority'");

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $i = $x;

            foreach ($results as $row){
                echo "<tr> \n";
                echo "<td>" .$row['id']. "</td> \n";
                echo "<td>" .$row['firstname']. "</td> \n";
                echo "<td>" .$row['lasttname']. "</td> \n";
                echo "<td>" .$row['position']. "</td> \n";
                echo "<td>" .$row['priority']. "</td> \n";
                echo "<tr>";

                if($i==$amount){
                    break;
                }
                $i++;
            }

            $x += count($results);
            $workingPriority++;

        }
            
        echo "</table>";
    }
    
}


