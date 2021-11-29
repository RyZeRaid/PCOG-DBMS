<?php 


$host = 'localhost';
$username = 'new_user';
$password = 'password123';
$dbname = 'churchofgoddb';

$conn = mysqli_connect($host , $username, $password, $dbname);
if(!$conn){
    echo'Connection Error:' . mysqli_connect_error();
}

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$dob = $_POST['dob'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$position = $_POST['position'];
$address = $_POST['add1'] + " "+ $_POST['add2'] +" "+ $_POST['city'] +" "+ $_POST['parish'];
$phonenum = $_POST['phonenum'];
$email = $_POST['email'];
$curday= new DateTime();

echo $curday->format('m-d-Y').'\n';

$fname = trim(filter_var($fname, FILTER_SANITIZE_STRING));
$lname = trim(filter_var($lname, FILTER_SANITIZE_STRING));
$dob = filter_var($dob, FILTER_SANITIZE_STRING);
$age = trim(filter_var($age, FILTER_SANITIZE_STRING));
$gender = trim(filter_var($gender, FILTER_SANITIZE_STRING));
$position = trim(filter_var($position, FILTER_SANITIZE_STRING));
$address = filter_var($address, FILTER_SANITIZE_STRING);
$phonenum= trim(filter_var($phonenum, FILTER_SANITIZE_STRING));
$email = filter_var($email, FILTER_VALIDATE_EMAIL));

$check = date_diff(date_create($dob),date_create($curday));

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
    $lname= mysqli_real_escape_string($conn, $last);
}

if(empty($phonenum)){
    echo '<span style= "color: red;"> Please enter a value for Phone number.</span>';
}else if(!is_numeric($phonenum))
{
    echo '<span style= "color: red;"> First Name must be letters only.</span>';
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

$sql = "INSERT INTO member( firstname, lasttname, age, gender, position, home_address, email, phonenumber, date_of_birth) VALUES('$fname', '$lname', '$age', '$gender', '$position', '$address', '$email', '$phonenumber','$dob')";

if(mysqli_query($conn,$sql)){
    echo'added to the file';
}else{
    echo'didnt write to file';
}

mysqli_close($conn);

?>