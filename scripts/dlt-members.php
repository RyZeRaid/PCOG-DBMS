<?php 


$host = 'localhost';
$username = 'new_user';
$password = 'password123';
$dbname = 'churchofgoddb';

$conn = mysqli_connect($host , $username, $password, $dbname);
if(!$conn){
    echo'Connection Error:' . mysqli_connect_error();
}
$stmt=null;

$id=$_GET["id"];
$id=mysqli_real_escape_string($conn,$id);

$stmt = mysqli_query($conn,"SELECT * FROM member WHERE id = $id");
$results = mysqli_fetch_assoc($stmt);
//mysqli_free_result($stmt);

$cnt=$stmt->num_rows;

if ($cnt!=0){
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


    echo "<tr> \n";
    echo "<td>" .$results['id']. "</td> \n";
    echo "<td>" .$results['firstname']. "</td> \n";
    echo "<td>" .$results['lasttname']. "</td> \n";
    echo "<td>" .$results['gender']. "</td> \n";
    echo "<td>" .$results['email']. "</td> \n";
    echo "<td>" .$results['age']. "</td> \n";
    echo "<td>" .$results['position']. "</td> \n";
    echo "<td>" .$results['home_address']. "</td> \n";
    echo "<td>" .$results['phonenumber']. "</td> \n";
    echo "<td>" .$results['date_of_birth']. "</td> \n";
    echo "</tr>";

    echo "</table>";
    echo "<br>";

    $stmt = mysqli_query($conn,"DELETE FROM member WHERE id = $id");
    $stmt = mysqli_query($conn,"DELETE FROM priority1 WHERE id = $id");
    $stmt = mysqli_query($conn,"DELETE FROM priority2 WHERE id = $id");
    
    echo "Deleted";
    
}
else{
    echo "Member does not exist";
}


