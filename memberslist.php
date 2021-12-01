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
        <link rel='stylesheet' href='styles/footer.css'>
        <script src='scripts/memberslist.js'></script>
        <title>Member's List</title>
    </head>
    
    <body>
        
        <div class='container'>
        <header>
            <img id='pcog-logo' src='./img/pcog logo.png' alt=''>
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
                        <a href='overridelist.html'>Override List</a>
                    </div>
                    <div class='buttonaside'>
                        <a href='confirmattendees.html'>Confirm Attendees</a>
                    </div>
                    <div class='buttonaside'>
                        <a href='viewarchives.html'>View Archive</a>
                    </div>
                </div>
            </aside>
    
            <main>
                <div class='main'>
                <h1>Member's List</h1>
                <form action='#' method='post' id='form'>
                    <div id = 'form-div'>
                        <input type='text' name='text' id='text' placeholder=''>
                    </div>
                </form>
    
                <form>
                    <input type='radio' id='firstname' name='f'>
                    <label for='firstname'>First Name</label>
    
                    <input type='radio' id='lastname' name='f'>
                    <label for='lastname'>Last Name</label>
    
                    <input type='radio' id='age' name='f'>
                    <label for='age'>Age</label>
    
                    <input type='radio' id='gender' name='f'>
                    <label for='age'>Gender</label>
                </form>
    
                    <div class='button'>
                        <button class='search' id='search'>Search</button>
                        <button class='sort' id='sort'>Sort</button>
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