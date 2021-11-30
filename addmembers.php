<?php 


$host = 'localhost';
$username = 'new_user';
$password = 'password123';
$dbname = 'churchofgoddb';

echo'shows ';

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
$address = $_GET['add1'] . " ". $_GET['add2'] ." ". $_GET['city'] ." ". $_GET['parish'];
$phonenum = $_GET['phonenum'];
$email = $_GET['email'];
$curday= new DateTime();
$today = $curday->format('d-m-Y ');;

$fname = trim(filter_var($fname, FILTER_SANITIZE_STRING));
$lname = trim(filter_var($lname, FILTER_SANITIZE_STRING));
$dob = filter_var($dob, FILTER_SANITIZE_STRING);
$age = trim(filter_var($age, FILTER_SANITIZE_STRING));
$gender = trim(filter_var($gender, FILTER_SANITIZE_STRING));
$position = trim(filter_var($position, FILTER_SANITIZE_STRING));
$address = filter_var($address, FILTER_SANITIZE_STRING);
$phonenum= trim(filter_var($phonenum, FILTER_SANITIZE_STRING));


$check = date_diff(date_create($dob),date_create($today));

if($check == $age){
    echo'correct age';
    $age= mysqli_real_escape_string($conn, $age);
    $dob= mysqli_real_escape_string($conn, $dob);
}

if(empty($fname)){
    echo '<span style= "color: red;"> Please enter a value for First Name.</span>';
}else if(!preg_match('/^[a-zA-Z\s]+$/',$fname))
{
    echo '<span style= "color: red;"> First Name must be letters only.</span>';
}else{
    $fname= mysqli_real_escape_string($conn, $fname);
}

if(empty($lname)){
    echo '<span style= "color: red;"> Please enter a value for Last Name.</span>';
}else if(!preg_match('/^[a-zA-Z\s]+$/',$lname))
{
    echo '<span style= "color: red;"> Last Name must be letters only.</span>';
}else{
    $lname= mysqli_real_escape_string($conn, $lname);
}

if(empty($phonenum)){
    echo '<span style= "color: red;"> Please enter a value for Phone number.</span>';
}else if(!is_numeric($phonenum))
{
    echo '<span style= "color: red;">  must be letters only.</span>';
}else{
    $phonenum= mysqli_real_escape_string($conn, $phonenum);
}

if(empty($email)){
    echo '<span style= "color: red;"> Please enter a value for email.</span>';
}else if(!filter_var($email,FILTER_SANITIZE_EMAIL)){
    echo '<span style= "color: red;"> Email must be a valid email address.</span>';
}else{
    $email = mysqli_real_escape_string($conn, $email);
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

?>