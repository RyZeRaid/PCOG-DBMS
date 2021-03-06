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
        <link href='styles/tables.css' rel='stylesheet'/>
        <link rel='stylesheet' href='styles/edit-members.css'>
        <script src='scripts/edit-members.js'></script>
        <title>Edit Member List</title>
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
                        <a href='memberslist.php'>View Members</a>
                    </div>
                    <div class='buttonaside'>
                        <a href='confirmattendees.php'>Confirm Attendees</a>
                    </div>
                    <div class='buttonaside'>
                        <a href='archivelist.php'>View Archive</a>
                    </div>
                </div>
            </aside>
    
            <main>
                <div class='main'>
                <h1>Edit Member</h1>
                <p>Please enter the ID of the member you would like to edit:</p>
                <form action='#' method='post' id='form'>
                    <div id = 'form-div'>
                        <input type='text' name='text' id='text' placeholder=''>
                    </div>
                </form>
    
                    <div class='button'>
                        <button class='editInfo' id='editInfo'>Edit Member</button>
                        <button class='dlt' id='dlt'>Delete Member</button>
                    </div>
                </div>
    
                <div class='table' id='table'></div>
    
                <div id='edit'>
                    <div id='form-section'>
            
                        <label for='fname'>First name:</label>
                        <input type='text' id='fname' name='fname' required>
    
                        <label for='lname'>Last name:</label>
                        <input type='text' id='lname' name='lname' required>
                    
    
    
                    
                        <label for='dob'>Date of Birth (Enter both Age and Date of Birth to update any of the two):</label>
                        <input type='date' id='dob' name='dob' required>
    
    
                        <label for='age'>Age:</label>
                        <input type='text' id='age' name='age' required>
    
                        <label for='gender'>Gender:</label>
                        
                        <select name='gender' id='gender'>
                            <option value='None'>Choose a Gender</option>
                            <option value='male'>Male</option>
                            <option value='female'>Female</option>
                        </select>
    
                        <label for='position'>Position:</label>
                        <input type='text' id='position' name='position' required>
    
                        <label for='position'>Phone Number:</label>
                        <input type='text' id='phonenum' name='phonenum'>
    
                        <label for='email'>Email:</label>
                        <input type='email' id='email' name='email'>
    
    
                        <p>Home Address (Enter the full address, city and parish to update any of the three):</p>
    
                    
                        <input type='text' id='add-line1' placeholder='Address 1'>
                    
    
                    
                        <input type='text' id='add-line2' placeholder='Address 2'>
                        
    
                        
                            
                        <input type='text' id='city' placeholder='City'>
    
                        <label for='parish'>Parish</label>
    
                        <select name='parish' id='parish'>
                            <option value='None'>Choose a Parish</option>
                            <option value='Clanderon'>Clanderon</option>
                            <option value='Hanover'>Hanover</option>
                            <option value='Kingston'>Kingston</option>
                            <option value='Manchester'>Manchester</option>
                            <option value='Portland'>Portland</option>
                            <option value='St. Andrew'>St. Andrew</option>
                            <option value='St. Ann'>St. Ann</option>
                            <option value='St. Catherine'>St. Catherine</option>
                            <option value='St. Elizabeth'>St. Elizabeth</option>
                            <option value='St. James'>St. James</option>
                            <option value='St. Mary'>St. Mary</option>
                            <option value='St. Thomas'>St. Thomas</option>
                            <option value='Trelawny'>Trelawny</option>
                            <option value='Westmoreland'>Westmoreland</option>
                        </select>
                        
                        <div id='button-section'>
                            <button type='submit' id = 'button' name= 'button'>Edit Member</button>
                        </div>
                        
    
                    </div>
                </div>
                
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