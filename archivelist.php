<?php
session_start();

if(isset($_SESSION['username'])){
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' href='styles/memberslist.css'>
        <link rel='stylesheet' href='styles/header.css'>
        <link rel='stylesheet' href='styles/footer.css'>
        <script src='scripts/archivelist.js'></script>
        <title>View Archive</title>
    </head>
    
    <body>
        
        <div class='container'>
        <header>
            <img src='./img/pcog logo.png' alt='' id= 'pcog-logo'>
            <h1>Portmore Church of God Database Management System</h1>
        
            <div class='logout'>
                <img src='./img/logout.png' alt=''>
                <p id='logout_user'>Logout</p>
            </div>
        </header> 
    
            <aside class='side1'>
                <div class='asiderleft'>
                    <div class='buttonaside'>
                        <a href='add-members.php'>Add Member</a>
                    </div>
                    <div class='buttonaside'>
                        <a href='Attendee-List.php'>Generate List</a>
                    </div>
                    <div class='buttonaside'>
                        <a href='editmembers.php'>Edit Members</a>
                    </div>
                    <div class='buttonaside'>
                        <a href='memberslist.php'>Members List</a>
                    </div>
                    <div class='buttonaside'>
                        <a href='confirmattendees.php'>Confirm Member</a>
                    </div>
                </div>
            </aside>
    
            <main>
                <div class='main'>
                <h1>Confirm Attendance of Members</h1>
                <p>Press the button to see an archive of the attendance of the church members</p>
    
                    <div class='button'>
                        <button class='search' id='search'>Show Archive</button>
                    </div>
                </div>
                
                <div class='table' id='table'></div>
                
            </main>
        </div>
    
        <footer>
            <p>Copyright &copy; 2020, Group 1</p>
        </footer>
    </body>
    
    
    
    </html>";
}else{
    require 'header.html';
}

?>