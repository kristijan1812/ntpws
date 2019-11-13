<?php
include("dblayer.php");
global $DBCON;

$results = mysqli_query($DBCON, 'SELECT * FROM `users` WHERE UserName = "'.$_POST['NewUserName'].'"');
if (mysqli_num_rows($results) > 0 && $_POST['NewUserName']!=$_POST['OldUserName']) {
       ?>
       
        <td class="userid" align="center">
            <p id="msg-edit-short" style="visibility:visible;left: 25px;bottom: 67px;">Username already taken!</p><?php echo $_POST['UserId']?>
        </td>
        <td class="username" style="display: none;" align="center"><?php echo $_POST['OldUserName']?></td>
        <td id="Username_edited_td"><input type="text" name="UserName" id="Username_edited" class="header-button" style="border:none;" placeholder="Edit Username" minlength="4" maxlength="15" value="<?php echo $_POST['UserId']?>"></td>
        <td class="password" style="display: none;" align="center"><?php echo $_POST['OldPassword']?></td>
        <td id="Password_edited_td"><input type="text" name="Password" id="Password_edited" class="header-button" style="border:none;" placeholder="Edit Password" minlength="4" maxlength="15"></td>
        <td class="datecreated" align="center"><?php echo $_POST['DateCreated'] ?></td>
        <td align="center"><a href="#" class="admin-edit-user" style="display: none;"><img src="media/images/edit-button.png"></a><input type="submit" class="Post-button" style="display:inline; margin-right:12px;" id="EditUser" value="POST"><input type="submit" class="Post-button" style="display:inline; margin-right:12px;" id="CancelEditUser" value="CANCEL"></td>
        <td align="center"><a href="#" class="admin-delete-user"><img src="media/images/delete-button.png"></a></td>
            <?php
}
else{
    $qry = 'UPDATE users SET UserName="'.$_POST["NewUserName"].'", Password="'.md5($_POST["NewPassword"]).'" WHERE UserId='.$_POST["UserId"].'';
    if(!$_POST['KeepOldPassword']){
        $qry = 'UPDATE users SET UserName="'.$_POST["NewUserName"].'", Password="'.$_POST["OldPassword"].'" WHERE UserId='.$_POST["UserId"].'';
    }
    mysqli_query($DBCON, $qry);
    ?>
    <td class="userid" align="center"><?php echo $_POST['UserId']?></td>
    <td class="username" align="center"><?php echo $_POST['NewUserName'] ?></td>
    <td class="password" align="center"><?php echo md5($_POST['NewPassword']) ?></td>
    <td class="datecreated" align="center"><?php echo $_POST['DateCreated'] ?></td>
    <td align="center"><a href="#" class="admin-edit-user"><img src="media/images/edit-button.png" /></a></td>
    <td align="center"><a href="#" class="admin-delete-user"><img src="media/images/delete-button.png" /></a></td><?php
    
}

?>


