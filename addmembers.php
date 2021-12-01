<?php 


$host = 'localhost';
$username = 'new_user';
$password = 'password123';
$dbname = 'churchofgoddb';

$conn = mysqli_connect($host , $username, $password, $dbname);
if(!$conn){
    echo'Connection Error:' . mysqli_connect_error();
}

$fname = $_GET['fname'];
$lname = $_GET['lname'];
$dob = $_GET['dob'];
$age = $_GET['age'];
$gender = $_GET['gender'];
$position = $_GET['position'];
$phonenum = $_GET['phonenum'];
$email = $_GET['email'];
$curday= new DateTime();
$today = $curday->format('Y-m-d ');

if(empty($_GET['add1']) || empty($_GET['city']) || $_GET['parish'] == "None"){
    echo '<span style= "color: red;"> Please select a Parish and add information to Address.</span>';
    return;
}else{
    $address = $_GET['add1'] . " ". $_GET['add2'] ." ". $_GET['city'] ." ". $_GET['parish'];
}

$fname = trim(filter_var($fname, FILTER_SANITIZE_STRING));
$lname = trim(filter_var($lname, FILTER_SANITIZE_STRING));
$dob = filter_var($dob, FILTER_SANITIZE_STRING);
$age = trim(filter_var($age, FILTER_SANITIZE_STRING));
$gender = trim(filter_var($gender, FILTER_SANITIZE_STRING));
$position = trim(filter_var($position, FILTER_SANITIZE_STRING));
$address = filter_var($address, FILTER_SANITIZE_STRING);
$phonenum= trim(filter_var($phonenum, FILTER_SANITIZE_STRING));


$check = date_diff(date_create($dob),date_create($today));

if($check->format("%y") == $age){
    echo'correct age';
    $age= mysqli_real_escape_string($conn, $age);
    $dob= mysqli_real_escape_string($conn, $dob);
}else{
    echo '<span style= "color: red;"> The age does not correspond to the date of birth given.</span>';
    return;
}

if(empty($fname)){
    echo '<span style= "color: red;"> Please enter a value for First Name.</span>';
    return;
}else if(!preg_match('/^[a-zA-Z\s]+$/',$fname))
{
    echo '<span style= "color: red;"> First Name must be letters only.</span>';
    return;
}else{
    $fname= mysqli_real_escape_string($conn, $fname);
}

if(empty($lname)){
    echo '<span style= "color: red;"> Please enter a value for Last Name.</span>';
    return;
}else if(!preg_match('/^[a-zA-Z\s]+$/',$lname))
{
    echo '<span style= "color: red;"> Last Name must be letters only.</span>';
    return;
}else{
    $lname= mysqli_real_escape_string($conn, $lname);
}

if(empty($phonenum)){
    echo '<span style= "color: red;"> Please enter a value for Phone number.</span>';
    return;
}else if(!is_numeric($phonenum))
{
    echo '<span style= "color: red;">  must be letters only.</span>';
    return;
}else{
    $phonenum= mysqli_real_escape_string($conn, $phonenum);
}

if(empty($email)){
    echo '<span style= "color: red;"> Please enter a value for email.</span>';
    return;
}else if(!filter_var($email,FILTER_SANITIZE_EMAIL)){
    echo '<span style= "color: red;"> Email must be a valid email address.</span>';
    return;
}else{
    $email = mysqli_real_escape_string($conn, $email);
}

if($gender === "None")
{
    echo '<span style= "color: red;"> There must be a Gender selected.</span>';
    return;
}else{
    $gender= mysqli_real_escape_string($conn, $gender);
}


$address = mysqli_real_escape_string($conn, $address);
$position = mysqli_real_escape_string($conn, $position);

$sql = "INSERT INTO member( firstname, lasttname, age, gender, position, home_address, email, phonenumber, date_of_birth) VALUES('$fname', '$lname', '$age', '$gender', '$position', '$address', '$email', '$phonenum','$dob')";


if(mysqli_query($conn,$sql)){
    echo'added to the file';
}else{
    echo'didnt write to file';
}

mysqli_close($conn); 

$conn_pri = mysqli_connect($host , $username, $password, $dbname);
if(!$conn_pri){
    echo'Connection Error:' . mysqli_connect_error();
}


$stmt = mysqli_query($conn_pri,"SELECT * FROM member ORDER BY id DESC LIMIT 1");
$results = mysqli_fetch_assoc($stmt);
mysqli_free_result($stmt);

$id_pri = mysqli_real_escape_string($conn_pri, $results['id']);
$fname_pri = mysqli_real_escape_string($conn_pri, $results['firstname']);
$lname_pri = mysqli_real_escape_string($conn_pri, $results['lasttname']);
$position_pri = mysqli_real_escape_string($conn_pri, $results['position']);


if($position_pri != "Member" || $position_pri != "member"){
    $sql_pri = "INSERT INTO priority2( id, firstname, lasttname, position, priority) VALUES('$id_pri', '$fname_pri', '$lname_pri','$position_pri', 0)";
}else{
    $sql_pri = "INSERT INTO priority1( id, firstname, lasttname, position, priority) VALUES('$id_pri', '$fname_pri', '$lname_pri','$position_pri', 0)";
}
 

if(mysqli_query($conn_pri,$sql_pri)){
    echo'added to the file';
}else{
    echo'didnt write to file';
}


mysqli_close($conn_pri);

?>