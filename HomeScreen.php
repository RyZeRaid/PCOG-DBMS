<?php
session_start();

if(isset($_SESSION['username'])){
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Home Screen</title>
        <link rel='stylesheet' href='./styles/HomeScreen.css'>
        <link rel='stylesheet' href='./styles/footer.css'>
        <link rel='stylesheet' href='./styles/header.css'>
        <link href='styles/tables.css' rel='stylesheet'/>
        <script src='scripts/homescreen.js'></script>
    </head>
    
    <header>
        <img id='pcog-logo' src='./img/pcog logo.png' alt=''>
        <h1>Portmore Church of God Database Management System</h1>
    
        <div class='logout' id='logout'>
            <img src='./img/logout.png' alt=''>
            <p id='logout_user'>Logout</p>
        </div>
    </header>
    
    <body>
        <div class='Home'>  
            <main>
                <h1> Database Options</h1>
                <button id='viewDatabase'>View Members Database</button>
                <button id='addMember'>Add Member</button>
                <button id='editMember'>Edit Member</button>
                <button id='generateAttendee'>Generate Attendee List</button>
                <button id='viewArchive'>View Archive</button>  
                <button id='confirmAttendees'>Confirm Attendees</button>
            </main>
        </div>
    </body>
    
    <footer>
        <p>Copyright &copy; 2020, Group 1</p>
    </footer>
    
    </html>";
}else{
    require 'header.html';
}
?>


