<?php
session_start();

if(isset($_SESSION['username'])){
    require 'memberslist.html';
}else{
    require 'header.html';
}
?>