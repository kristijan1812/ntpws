<?php
include("dblayer.php");
global $DBCON;

$username = $_POST['Username'];
$password = $_POST['Password'];
$results = mysqli_query($DBCON, 'SELECT * FROM `users` WHERE UserName = "'.$username.'"');
if (mysqli_num_rows($results) > 0) {
    echo "taken";	
}
else{
    $signup_qry = mysqli_query($DBCON, 'INSERT INTO users (`UserName`, `Password`, `UserType`) VALUES ("'.$username.'", "'.md5($password).'", "user")');
    echo "not_taken";
    
}
