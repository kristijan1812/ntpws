<?php

include("dblayer.php");

global $DBCON;


$username = mysqli_real_escape_string($DBCON, $_POST['Username']);
$password = mysqli_real_escape_string($DBCON, $_POST['Password']);


$qry = 'SELECT * FROM `users` WHERE `Username` = "'.$username.'" AND `Password` = "'.md5($password).'"';
$login_data = mysqli_query($DBCON, $qry);
$rows = mysqli_num_rows($login_data);
$row = mysqli_fetch_array($login_data);

if ($rows > 0)
{
    echo '{ "Result": "Logged in", "Username": "'.$username.'"}';

    $_SESSION['UserName'] = $username;
    $_SESSION['UserId'] = $row['UserId'];

    

}
else
{
    
    header('HTTP/1.0 404 Not Found');
    echo '{ "Result": "Username not found or password incorrect."}';

}
?>
