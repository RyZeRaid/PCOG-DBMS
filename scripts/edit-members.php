<?php 


$host = 'localhost';
$username = 'new_user';
$password = 'password123';
$dbname = 'churchofgoddb';

$conn = mysqli_connect($host , $username, $password, $dbname);
if(!$conn){
    echo'Connection Error:' . mysqli_connect_error();
}

$id=$_GET["id"];
$fname = $_GET['fname'];
$lname = $_GET['lname'];
$dob = $_GET['dob'];
$age = $_GET['age'];
$gender = $_GET['gender'];
$position = $_GET['position'];
$phonenum = $_GET['phonenum'];
$email = $_GET['email'];
$context=$_GET['context'];
$curday= new DateTime();
$today = $curday->format('Y-m-d ');

if(empty($_GET['add1']) && empty($_GET['add2']) && empty($_GET['city']) && $_GET['parish'] == "None"){
    $address = $_GET['parish'];
}else{
    $address = $_GET['add1'] . " ". $_GET['add2'] ." ". $_GET['city'] ." ". $_GET['parish'];
}


$fname = trim(filter_var($fname, FILTER_SANITIZE_STRING));
$lname = trim(filter_var($lname, FILTER_SANITIZE_STRING));
$dob = filter_var($dob, FILTER_SANITIZE_STRING);
$age = trim(filter_var($age, FILTER_SANITIZE_STRING));
$gender = trim(filter_var($gender, FILTER_SANITIZE_STRING));
$position = trim(filter_var($position, FILTER_SANITIZE_STRING));
$address = filter_var($address, FILTER_SANITIZE_STRING);
$phonenum= trim(filter_var($phonenum, FILTER_SANITIZE_STRING));
$id = trim(filter_var($id, FILTER_SANITIZE_STRING));



if ($context=="find"){
    $id=mysqli_real_escape_string($conn,$id);

    $stmt = mysqli_query($conn,"SELECT * FROM member WHERE id = $id");
    $results = mysqli_fetch_assoc($stmt);
    mysqli_free_result($stmt);
    
    echo "<table border =\"1\" style='border-collapse: collapse'>";

    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>First Name</th>";
    echo "<th>Last Name</th>";
    echo "<th>Gender</th>";
    echo "<th>Email</th>";
    echo "<th>Age</th>";
    echo "<th>Position</th>";
    echo "<th>Home Address</th>";
    echo "<th>Phone Number</th>";
    echo "<th>Date of Birth</th>";
    echo "</tr>";


    echo "<tr> \n";
    echo "<td>" .$results['id']. "</td> \n";
    echo "<td>" .$results['firstname']. "</td> \n";
    echo "<td>" .$results['lasttname']. "</td> \n";
    echo "<td>" .$results['gender']. "</td> \n";
    echo "<td>" .$results['email']. "</td> \n";
    echo "<td>" .$results['age']. "</td> \n";
    echo "<td>" .$results['position']. "</td> \n";
    echo "<td>" .$results['home_address']. "</td> \n";
    echo "<td>" .$results['phonenumber']. "</td> \n";
    echo "<td>" .$results['date_of_birth']. "</td> \n";
    echo "</tr>";

    echo "</table>";
} 
if($context=="edit"){
    

    if (!empty($dob) && !empty($age)){
        $check = date_diff(date_create($dob),date_create($today));
    
        if($check->format("%y") == $age){
            echo'correct age';
            $age= mysqli_real_escape_string($conn, $age);
            $dob= mysqli_real_escape_string($conn, $dob);

            $sql = "UPDATE member SET age='$age' WHERE id=$id";
            if(mysqli_query($conn,$sql)){
                echo'';
            }else{
                echo'=';
            }

            $sql = "UPDATE member SET date_of_birth='$dob' WHERE id=$id";
            if(mysqli_query($conn,$sql)){
                echo'';
            }else{
                echo'=';
            }

        }else{
            echo '<span style= "color: red;"> The age does not correspond to the date of birth given.</span>';
            return;
        }
    }

    if(!empty($fname)){
        if(!preg_match('/^[a-zA-Z\s]+$/',$fname))
        {
            echo '<span style= "color: red;"> First Name must be letters only.</span>';
            return;
        }else{
            $fname= mysqli_real_escape_string($conn, $fname);
            $sql = "UPDATE member SET firstname='$fname'WHERE id=$id";
            if(mysqli_query($conn,$sql)){
                echo'';
            }else{
                echo'=';
            }
            
        }
    }
    
    if(!empty($lname)){
        if(!preg_match('/^[a-zA-Z\s]+$/',$lname))
        {
            echo '<span style= "color: red;"> Last Name must be letters only.</span>';
            return;
        }else{
            $lname= mysqli_real_escape_string($conn, $lname);
            $sql = "UPDATE member SET lasttname='$lname'WHERE id=$id";
            if(mysqli_query($conn,$sql)){
                echo'';
            }else{
                echo'=';
            }
            
        }
    }
    
    if(!empty($phonenum)){
        if(!is_numeric($phonenum))
        {
            echo '<span style= "color: red;">  must be letters only.</span>';
            return;
        }else{
            $phonenum= mysqli_real_escape_string($conn, $phonenum);
            $sql = "UPDATE member SET phonenumber=$phonenum WHERE id=$id";
            if(mysqli_query($conn,$sql)){
                echo'';
            }else{
                echo'=';
            }
            
        }
    }
    
    if(!empty($email)){
        if(!filter_var($email,FILTER_SANITIZE_EMAIL)){
            echo '<span style= "color: red;"> Email must be a valid email address.</span>';
            return;
        }else{
            $email = mysqli_real_escape_string($conn, $email);
            $sql = "UPDATE member SET email='$email'WHERE id=$id";
            if(mysqli_query($conn,$sql)){
                echo'';
            }else{
                echo'=';
            }
            
        }
    }
    
    if($address != "None"){
        $address = mysqli_real_escape_string($conn, $address);
        $sql = "UPDATE member SET home_address='$address'WHERE id=$id";
        if(mysqli_query($conn,$sql)){
            echo'';
        }else{
            echo'';
        }
    }
    if(!empty($position)){
        $position = mysqli_real_escape_string($conn, $position);
        $sql = "UPDATE member SET position='$position'WHERE id=$id";
        if(mysqli_query($conn,$sql)){
            echo'';
        }else{
            echo'';
        }
    }

    if($gender != "None")
    {
        $gender= mysqli_real_escape_string($conn, $gender);
        $sql = "UPDATE member SET gender='$gender'WHERE id=$id";
        if(mysqli_query($conn,$sql)){
            echo'';
        }else{
            echo'=';
        }
    }

    $id = mysqli_real_escape_string($conn, $id);
    
    $stmt = mysqli_query($conn,"SELECT * FROM member WHERE id = $id");
    $results = mysqli_fetch_assoc($stmt);
    mysqli_free_result($stmt);
    
    echo "<table border =\"1\" style='border-collapse: collapse'>";

    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>First Name</th>";
    echo "<th>Last Name</th>";
    echo "<th>Gender</th>";
    echo "<th>Email</th>";
    echo "<th>Age</th>";
    echo "<th>Position</th>";
    echo "<th>Home Address</th>";
    echo "<th>Phone Number</th>";
    echo "<th>Date of Birth</th>";
    echo "</tr>";


    echo "<tr> \n";
    echo "<td>" .$results['id']. "</td> \n";
    echo "<td>" .$results['firstname']. "</td> \n";
    echo "<td>" .$results['lasttname']. "</td> \n";
    echo "<td>" .$results['gender']. "</td> \n";
    echo "<td>" .$results['email']. "</td> \n";
    echo "<td>" .$results['age']. "</td> \n";
    echo "<td>" .$results['position']. "</td> \n";
    echo "<td>" .$results['home_address']. "</td> \n";
    echo "<td>" .$results['phonenumber']. "</td> \n";
    echo "<td>" .$results['date_of_birth']. "</td> \n";
    echo "</tr>";

    echo "</table>";
}



mysqli_close($conn);

    
?>

