<?php
include("dblayer.php");
global $DBCON;


$qry = 'UPDATE likes SET LikeValue='.$_POST["NewLikeValue"].' WHERE LikeId='.$_POST["LikeId"].'';
mysqli_query($DBCON, $qry);
?>
<td class="userid" align="center"><?php echo $_POST['LikeId'] ?></td>
<td class="userid" align="center"><?php echo $_POST['UserId'] ?></td>
<td class="username" align="center"><?php echo $_POST['UserName'] ?></td>
<td class="postid" align="center"><?php echo $_POST['PostId'] ?></td>
<td class="posttitle" align="center"><?php echo $_POST['PostTitle'] ?></td>
<td class="likevalue" align="center"><?php echo $_POST['NewLikeValue'] ?></td>
<td align="center"><a href="#" class="admin-edit-like"><img src="media/images/edit-button.png" /></a></td>
<td align="center"><a href="#" class="admin-delete-like"><img src="media/images/delete-button.png" /></a></td>