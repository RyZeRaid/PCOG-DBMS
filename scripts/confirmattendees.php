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

$context = $_GET['context'];


if($context === "search"){

    $stmt = $conn->query("SELECT * FROM attendeelist");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(sizeof($results) != 0)
    {
        $date = date('d-m-y');

        echo"Select a check box for the members that have attended Church on ".$date."\n";
        echo "<table id = 'info' border =\"1\" style='border-collapse: collapse' id = 'Table1'>";

        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>First Name</th>";
        echo "<th>Last Name</th>";
        echo "<th>Position</th>";
        echo "<th>Priority</th>";
        echo "<th>Check Attendance</th>";
        echo "</tr>";

        foreach ($results as $row){
            echo "<tr> \n";
            echo "<td>" .$row['id']. "</td> \n";
            echo "<td>" .$row['firstname']. "</td> \n";
            echo "<td>" .$row['lasttname']. "</td> \n";
            echo "<td>" .$row['position']. "</td> \n";
            echo "<td>" .$row['priority']. "</td> \n";
            echo "<td><input type= 'checkbox' id = 'check' value =" .$row['id'].$row['priority']."></td> \n";
            echo "</tr>";
        }
        echo "</table>";
        echo "<div class='button'><button class='add' id='add'>Confirm Attendance</button></div>";
    }else{
        echo"No List has been generated";
    }
 
}




if($context=== "add"){
    $conn_pri = mysqli_connect($host , $username, $password, $dbname);
if(!$conn){
    echo'Connection Error:' . mysqli_connect_error();
}
    $appr = explode(",",$_GET['members_approved']);
    $pri = explode(",",$_GET['priority']);
    
    for ($x = 0; $x < sizeof($pri); $x++) {
        $change= $pri[$x]-1;
        $idnum = $appr[$x];
        $result=mysqli_real_escape_string($conn_pri, $change);
        $res=mysqli_real_escape_string($conn_pri, $idnum);
        

        $sql = "UPDATE priority1 SET priority='$result' WHERE id='$res'";
        if(mysqli_query($conn_pri,$sql)){
            echo'';
        }else{
            echo'';
        }

        $stmt = mysqli_query($conn_pri,"SELECT * FROM priority1 WHERE id = $res");
        $results_pri = mysqli_fetch_assoc($stmt);
        //mysqli_free_result($stmt);
        $fname = mysqli_real_escape_string($conn_pri,$results_pri['firstname']);
        $lname = mysqli_real_escape_string($conn_pri,$results_pri['lasttname']);

        $sql_pri = "INSERT INTO attendance( id, firstname, lasttname, date) VALUES('$res','$fname', '$lname', SYSDATE())";
        if(mysqli_query($conn_pri,$sql_pri)){
            echo'';
        }else{
            echo'';
        }
    
    }
      
    mysqli_close($conn_pri);            
    
}



