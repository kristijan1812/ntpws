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
    if(isset($_POST["Input"]) && $_POST["Input"]=="Admin"){
        $userId = mysqli_insert_id($DBCON);
        echo '<td class="userid" align="center">'.$userId.'</td>
        <td class="username" align="center">'.$username.'</td>
        <td class="password" align="center">'.md5($password).'</td>
        <td class="datecreated" align="center">'.date('Y-m-d h:i:s', time()).'</td>
        <td align="center"><a href="#" class="admin-edit-user"><img src="media/images/edit-button.png" /></a></td>
        <td align="center"><a href="#" class="admin-delete-user"><img src="media/images/delete-button.png" /></a></td>';
    }
    else{
        echo "not_taken";
    }
    
    
}
