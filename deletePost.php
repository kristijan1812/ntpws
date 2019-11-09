<?php
include("dblayer.php");
global $DBCON;
mysqli_query($DBCON, 'DELETE FROM posts WHERE PostId='.$_POST["PostId"].';');
?>

<div class="post-header">
    <p class="post-title">Deleted</p>
    <p class="post-author"></p>
</div>
<p></p>
<div class="time-ago"></div>