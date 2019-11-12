<?php
include("dblayer.php");
global $DBCON;
if (isset($_SESSION['UserType']) && $_SESSION['UserType']=="admin"){
    mysqli_query($DBCON, 'DELETE FROM users WHERE UserId='.$_POST["UserId"].'');
    ?>
    <p>User deleted</p><?php
}   
else{
    ?><p>Wrong user type</p><?php
}
