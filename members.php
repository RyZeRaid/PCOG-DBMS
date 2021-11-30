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

$member = $_REQUEST['member'];
$context = $_REQUEST['context'];

if($member != ""){
    $member = filter_var($member, FILTER_SANITIZE_STRING);
    $member = trim($member);
}

echo $member;

