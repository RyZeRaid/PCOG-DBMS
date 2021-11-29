<?php
session_start();

if(isset($_SESSION['username'])){
    session_destroy();
    require 'header.html';
}else{
    require 'header.html';
}
?>