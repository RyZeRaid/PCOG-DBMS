<?php 


$host = 'localhost';
$username = 'new_user';
$password = 'password123';
$dbname = 'churchofgoddb';

$conn = mysqli_connect($host , $username, $password, $dbname);
if(!$conn){
    echo'Connection Error:' . mysqli_connect_error();
}

$id=$_GET["id"];
$fname = $_GET['fname'];
$lname = $_GET['lname'];
$dob = $_GET['dob'];
$age = $_GET['age'];
$gender = $_GET['gender'];
$position = $_GET['position'];
$address = $_GET['add1'] . " ". $_GET['add2'] ." ". $_GET['city'] ." ". $_GET['parish'];
$phonenum = $_GET['phonenum'];
$email = $_GET['email'];
$context=$_GET['context'];
$curday= new DateTime();
$today = $curday->format('Y-m-d ');

$fname = trim(filter_var($fname, FILTER_SANITIZE_STRING));
$lname = trim(filter_var($lname, FILTER_SANITIZE_STRING));
$dob = filter_var($dob, FILTER_SANITIZE_STRING);
$age = trim(filter_var($age, FILTER_SANITIZE_STRING));
$gender = trim(filter_var($gender, FILTER_SANITIZE_STRING));
$position = trim(filter_var($position, FILTER_SANITIZE_STRING));
$address = filter_var($address, FILTER_SANITIZE_STRING);
$phonenum= trim(filter_var($phonenum, FILTER_SANITIZE_STRING));
$id = trim(filter_var($id, FILTER_SANITIZE_STRING));

if ($dob!=""){
    $check = date_diff(date_create($dob),date_create($today));

    if($check->format("%y") == $age){
        echo'correct age';
        $age= mysqli_real_escape_string($conn, $age);
        $dob= mysqli_real_escape_string($conn, $dob);
    }else{
        echo '<span style= "color: red;"> The age does not correspond to the date of birth given.</span>';
        return;
    }
}

if ($context=="find"){
    $id=mysqli_real_escape_string($conn,$id);

    $stmt = mysqli_query($conn,"SELECT * FROM member WHERE id = $id");
    $results = mysqli_fetch_assoc($stmt);
    mysqli_free_result($stmt);
    
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
}

if ($context=="edit"){
    echo "non functional";
}

    


