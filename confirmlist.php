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

$idNums = $_GET['ids'];

$idArray = explode(' ',$idNums);
$status = -1;

foreach($idArray as $id){
    $stmt = $conn->query("SELECT * FROM priority1 WHERE id=$id");

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($result as $attendant){

        $aID = $attendant['id'];
        $fname = $attendant['firstname'];
        $lname = $attendant['lasttname'];
        $pos = $attendant['position'];
        $pri = $attendant['priority'];
        

        $sql = "INSERT INTO attendeelist (id, firstname, lasttname, position, priority)
        VALUES ('$aID','$fname','$lname','$pos',$pri)";

        if ($conn->query($sql) === TRUE){
            $status = 1;
        } else {
            $status = -1;
        }
    }
}

if($status==1){
    echo "Attendees Confirmed";
}





