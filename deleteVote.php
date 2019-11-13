<?php
include("dblayer.php");
global $DBCON;
if (isset($_SESSION['UserType']) && $_SESSION['UserType']=="admin"){
    mysqli_query($DBCON, 'DELETE FROM likes WHERE LikeId='.$_POST["LikeId"].'');
    ?>
    <p>Vote deleted</p><?php
}   
else{
    ?><p>Wrong user type</p><?php
}
