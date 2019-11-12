<?php

include("dblayer.php");
global $DBCON;
$query_content = "SELECT UserId, UserName, DateCreated FROM users WHERE UserType='user'";
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
    <table border=1 frame=void rules=rows>
        <col width="160">
        <col width="320">
        <col width="320">
        <col width="60">
        <col width="60">
        <thead>
            <th>UserId</th>
            <th>UserName</th>
            <th>DateCreated</th>
            <th colspan="2">Action</th>
        </thead>
        <tbody><?php
        while($user = mysqli_fetch_array($qry))
        {  ?>
            <tr>
                <td align="center"><?php echo $user['UserId'] ?></td>
                <td align="center"><?php echo $user['UserName'] ?></td>
                <td align="center"><?php echo $user['DateCreated'] ?></td>
                <td align="center"><a href="#" class="admin-edit"><img src="media/images/edit-button.png" /></a></td>
                <td align="center"><a href="#" class="admin-delete"><img src="media/images/delete-button.png" /></a></td>
            </tr><?php
        }?>
        </tbody>
    </table>
    <button class ="header-button " id="admin-add-user" type="redirect" style="display:block;">Add User</button>
</div>