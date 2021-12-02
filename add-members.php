<?php
session_start();

if(isset($_SESSION['username'])){
    echo "<!DOCTYPE html>
    <html lang='en'>
    
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Add Members</title>
        <link href='styles/add-members.css' rel='stylesheet'/>
        <script src='scripts/add-members.js'></script>
    </head>
    
    
    <body>
    
        <div class='container'>
    
            <header>
    
                <div class='logo'>
                    <img id='pcog-logo' src='./img/pcog logo.png' alt='PCOG Logo'>
                    <h1>Portmore Church of God Database Management System</h1>
                </div>
                
                <div class='logout'>
                    <img src='./img/logout.png' alt=''>
                    <p id='logout_user'>Logout</p>
                </div>
            
            </header>
    
            <aside id='left-sidebar'>
                <div id='side'>
                    <a href='memberslist.php'>View Members</a>
                    <a href='Attendee-List.php'>Generate List</a>
                    <a href='editmembers.php'>Edit Members</a>
                    <a href='confirmattendees.php'>Confirm Attendees</a>
                    <a href='archivelist.php'>View Archive</a>
                </div>   
                
            </aside>
    
            <main>
                <form method='post' action='addmembers.php'></form>
                <div id='form-section'>
    
                    <div id='heading'><h1>Add Member</h1></div>
                    
                    <div id='member-name'>
    
                        <label for='fname'>First name:</label>
                        <input type='text' id='fname' name='fname' required>
    
                        <label for='lname'>Last name:</label>
                        <input type='text' id='lname' name='lname' required>
                    </div>
    
    
                    <div id='member-dob'>
                        <label for='dob'>Date of Birth:</label>
                        <input type='date' id='dob' name='dob' required>
                    </div>
    
    
                    <div id='member-age-gender'>
    
                        <label for='age'>Age:</label>
                        <input type='text' id='age' name='age' required>
    
                        <label for='gender'>Gender:</label>
                        
                        <select name='gender' id='gender'>
                            <option value='None'>Choose a Gender</option>
                            <option value='male'>Male</option>
                            <option value='female'>Female</option>
                        </select>
    
                    </div>
    
    
                    <div id='member-position'>
                        <label for='position'>Position:</label>
                        <input type='text' id='position' name='position' required>
                    </div>
    
                    <div id='contact'>
                        <label for='position'>Phone Number:</label>
                        <input type='text' id='phonenum' name='phonenum'>
    
                        <label for='email'>Email:</label>
                        <input type='email' id='email' name='email'>
                    </div>
    
    
                    <div id='member-address'>
    
                        <p>Home Address:</p>
    
                        <div id='address1'>
                            <input type='text' id='add-line1' placeholder='Address 1'>
                        </div>
    
                        <div id='address2'>
                            <input type='text' id='add-line2' placeholder='Address 2'>
                        </div>
    
                        <div id='city-parish'>
                            
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
    
                        </div>
    
                    </div>
        
    
                    <div id='button-section'>
                        <button type='submit' id = 'button' name= 'button'>Add Member</button>
                    </div>
    
                </div>
                </form>
                <div id = 'show'></div>
            </main>
    
            
    
        </div>
    
        <footer> 
            <div>
                Copyright &copy; 2020, Group 1
            </div> 
        </footer>
        
    </body>
    
    </html>";
}else{
    require 'header.html';
}
?>