<?php
 
$host = 'localhost';
$username = 'new_user';
$password = 'password123';
$dbname = 'churchofgoddb';

$info =explode(" ",$_GET['user']);
$user= $info[0];
$userpassword = $info[1];

$user = trim(filter_var($user, FILTER_SANITIZE_STRING));
$userpassword = trim(filter_var($userpassword, FILTER_SANITIZE_STRING));

$conn = mysqli_connect($host , $username, $password, $dbname);
if(!$conn){
    echo'Connection Error:' . mysqli_connect_error();
}

if(isset($user) && isset($userpassword))
{
    $user = mysqli_real_escape_string($conn, $user);
    $userpassword = mysqli_real_escape_string($conn, $userpassword);

    $result1 = mysqli_query($conn, "SELECT username, password FROM user WHERE username = '".$user."' AND  password = '".$userpassword."'");

   
    if(mysqli_num_rows($result1) > 0 )
        { 
            include()
        }
        else
        {
            echo 'The username or password are incorrect!';
        }
    }
 
?>
