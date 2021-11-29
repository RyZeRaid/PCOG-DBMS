<?php
session_start();

if(isset($_SESSION['username'])){
    require 'HomeScreen.html';
}else{
    require 'header.html';
}
?>


