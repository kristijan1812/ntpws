<?php
include("dblayer.php");
global $DBCON;

$results = mysqli_query($DBCON, 'SELECT * FROM `users` WHERE UserName = "'.$_POST['NewUserName'].'"');
if (mysqli_num_rows($results) > 0 && $_POST['NewUserName']!=$_POST['OldUserName']) {
   	//DODAJ EXCEPTION DA VRATI NEKAJ DRUGO
}
else{
    mysqli_query($DBCON, 'UPDATE users SET UserName="'.$_POST['NewUserName'].'", Password="'.md5($_POST['NewPassword']).'" WHERE UserId='.$_POST['UserId'].'');
    ?>
    <td class="userid" align="center"><?php echo $_POST['UserId']?></td>
    <td class="username" align="center"><?php echo $_POST['NewUserName'] ?></td>
    <td class="password" align="center"><?php echo md5($_POST['NewPassword']) ?></td>
    <td align="center"><?php echo $_POST['DateCreated'] ?></td>
    <td align="center"><a href="#" class="admin-edit"><img src="media/images/edit-button.png" /></a></td>
    <td align="center"><a href="#" class="admin-delete"><img src="media/images/delete-button.png" /></a></td><?php
    
}

?>


