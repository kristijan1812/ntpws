<?php

include("dblayer.php");
global $DBCON;
global $DBCON;
if (isset($_SESSION['UserType']) && $_SESSION['UserType']=="admin"){
    $query_content = "SELECT UserId, UserName, DateCreated, Password FROM users WHERE UserType='user'";
    if(isset($_GET["Manage"]) and $_GET["Manage"]=="Votes"){
        $query_content = "SELECT likes.LikeId,likes.UserId AS UserId, users.UserName AS UserName, likes.PostId AS PostId, posts.PostTitle AS PostTitle,LikeValue FROM likes LEFT JOIN users On likes.UserId=users.UserId LEFT JOIN posts ON likes.PostId=posts.PostId";
    }
    
$qry = mysqli_query($DBCON, $query_content);



?>
<div id="admin-content-categories">
    <button class ="header-button " id="admin-manage-votes" type="redirect" style="display:block;">Manage Votes</button>
    <div class="clearfix"></div>
    <button class ="header-button " id="admin-manage-posts" type="redirect" style="display:block;">Manage Posts</button>
    <div class="clearfix"></div>
    <button class ="header-button " id="admin-manage-users" type="redirect" style="display:block;">Manage Users</button>
</div>
<div id="admin-content">
    <?php 
    if(isset($_GET["Manage"]) and $_GET["Manage"]=="Votes")
    {?>
        <table border=1 frame=void rules=rows>
            <col width="120">
            <col width="120">
            <col width="240">
            <col width="120">
            <col width="240">
            <col width="60">
            <col width="60">
            <col width="60">
            <thead>
                <th>LikeId</th>
                <th>UserId</th>
                <th>UserName</th>
                <th>PostId</th>
                <th>PostTitle</th>
                <th>LikeValue</th>
                <th colspan="2">Action</th>
            </thead>
            <tbody id="liketable"><?php
            while($like = mysqli_fetch_array($qry))
            {  ?>
                <tr>
                    <td class="likeid" align="center"><?php echo $like['LikeId'] ?></td>
                    <td class="userid" align="center"><?php echo $like['UserId'] ?></td>
                    <td class="username" align="center"><?php echo $like['UserName'] ?></td>
                    <td class="postid" align="center"><?php echo $like['PostId'] ?></td>
                    <td class="posttitle" align="center"><?php echo $like['PostTitle'] ?></td>
                    <td class="likevalue" align="center"><?php echo $like['LikeValue'] ?></td>
                    <td align="center"><a href="#" class="admin-edit-like"><img src="media/images/edit-button.png" /></a></td>
                    <td align="center"><a href="#" class="admin-delete-like"><img src="media/images/delete-button.png" /></a></td>
                </tr><?php
            }?>
            </tbody>
        </table>
        
    <?php
    }
    else
    {?>
        <table border=1 frame=void rules=rows>
            <col width="120">
            <col width="240">
            <col width="240">
            <col width="240">
            <col width="60">
            <col width="60">
            <thead>
                <th>UserId</th>
                <th>UserName</th>
                <th>Password(md5)</th>
                <th>DateCreated</th>
                <th colspan="2">Action</th>
            </thead>
            <tbody id="usertable"><?php
            while($user = mysqli_fetch_array($qry))
            {  ?>
                <tr>
                    <td class="userid" align="center"><?php echo $user['UserId'] ?></td>
                    <td class="username" align="center"><?php echo $user['UserName'] ?></td>
                    <td class="password" align="center"><?php echo $user['Password'] ?></td>
                    <td class="datecreated" align="center"><?php echo $user['DateCreated'] ?></td>
                    <td align="center"><a href="#" class="admin-edit-user"><img src="media/images/edit-button.png" /></a></td>
                    <td align="center"><a href="#" class="admin-delete-user"><img src="media/images/delete-button.png" /></a></td>
                </tr><?php
            }?>
            </tbody>
        </table>
        <button class ="header-button " id="admin-add-user" type="redirect" style="display:block;">New User</button>
    <?php
    };?>
</div><?php
}   
else{
    ?><p>Not admin!</p><?php
};
