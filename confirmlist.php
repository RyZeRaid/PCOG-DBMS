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

if($idNums=="none"){
    echo '<span style="color:red;">A List Must Be Generated First</span>';
}else{

    $idArray = explode(' ',$idNums);
    $status = -1;
    
    $sqlTrunc = "TRUNCATE TABLE attendeelist";
    
    $truncated = $conn->query($sqlTrunc);
    
    if($truncated){
    
        foreach($idArray as $id){
            $stmt = $conn->query("SELECT * FROM priority1 WHERE id=$id");
        
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            $attendant=reset($result);
    
            $aID = $attendant['id'];
            $fname = $attendant['firstname'];
            $lname = $attendant['lasttname'];
            $pos = $attendant['position'];
            $pri = $attendant['priority'];
            
    
            $sql = "INSERT INTO attendeelist (id, firstname, lasttname, position, priority)
            VALUES ('$aID','$fname','$lname','$pos',$pri)";
    
            $newPri = $pri + 1;
    
            $sqlUpdate = "UPDATE priority1 SET priority = $newPri WHERE id = $aID";
    
            if ($conn->query($sqlUpdate)){
                $status = 1;
            } else {
                $status = -1;
            }
            
            if ($conn->query($sql)){
                $status = 1;
            } else {
                $status = -1;
            }
                
        }
    }
    
    if($status==1){
        echo "Attendees Confirmed!!";
    }
}



