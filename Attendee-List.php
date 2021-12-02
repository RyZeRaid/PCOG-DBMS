<?php
session_start();

if(isset($_SESSION['username'])){
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Attendee List</title>
        <link rel='stylesheet' href='styles/AttendeeList.css'>
        <link rel='stylesheet' href='styles/header.css'>
        <link rel='stylesheet' href='styles/footer.css'>
        <script src='scripts/logout.js'></script>
    </head>
    
    <header>
        <img src='./img/pcog logo.png' alt='' id='pcog-logo'>
        <h1>Portmore Church of God Database Management System</h1>
    
        <div class='logout' id='logout'>
            <img src='./img/logout.png' alt=''>
            <p id='logout_user'>Logout</p>
        </div>
    </header>
    
    <body>
        <div class='Attendee'>
    
            <aside>
                <a href='memberslist.php'>View Members</a>
                <a href='add-members.php'>Add Members</a>
                <a href='editmembers.php'>Edit Members</a>
                <a href='confirmattendees.php'>Confirm Attendees</a>
                <a href='archivelist.php'>View Archive</a>
            </aside>
    
            <main>
                <h1> Attendee List</h1>
                <div id='attendance-count'>
                    <label for='member-count'>How many members will be in attendance?</label>
                    <input type='text' id='member-count' placeholder=''>
                </div>
    
                
                <div class='options'>
                    <button id='generateList'>Generate List</button>
                    <button id='overrideList'>Override List</button>
                    <button id='confirmList'>Confirm List</button>
                </div>
                <div id='result'></div>
                <div class='table'></div>
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