<?php

session_start();
 
$host = 'localhost';
$username = 'new_user';
$password = 'password123';
$dbname = 'churchofgoddb';

$conn = mysqli_connect($host , $username, $password, $dbname);
if(!$conn){
    echo'Connection Error:' . mysqli_connect_error();
}

$user = $_POST['username'];
$userpassword = $_POST['password'];

$user = filter_var($user, FILTER_SANITIZE_STRING);
$userpassword = filter_var($userpassword, FILTER_SANITIZE_STRING);

if(isset($user) && isset($userpassword))
{
    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $userpassword = mysqli_real_escape_string($conn, $_POST['password']);

    $result1 = mysqli_query($conn, "SELECT username, password FROM user WHERE username = '".$user."' AND  password = '".$userpassword."'");

   
    if(mysqli_num_rows($result1) > 0 )
        {
            $_SESSION['username'] = $user;
            header('Location: HomeScreen.php');
        }
        else
        {
            include 'header.html';
            echo 'The username or password is incorrect!';
        }
}

    mysqli_close($conn);
 
?>

