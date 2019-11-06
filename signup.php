<?php

include("dblayer.php");

global $DBCON;

$username = $_POST['Username'];
$password = $_POST['Password'];
$signup_qry = mysqli_query($DBCON, 'INSERT INTO users (`UserName`, `Password`) VALUES ("'.$username.'", "'.md5($password).'")');


echo '{"Miki": "Milane"}';
// if ($signup_qry)
// {
//     echo '{"Username": "'.$username.'", "Password": "'.password.'"}';   

// }
// else
// {
//     echo '{ "Result": "Sign up failed, please try again later."}';

// }
?>

