<?php

include("dblayer.php");

global $DBCON;


$posttext = mysqli_real_escape_string($DBCON, $_POST['PostText']);
$posttitle = mysqli_real_escape_string($DBCON, $_POST['PostTitle']);
mysqli_query($DBCON, 'INSERT INTO posts (PostText, UserId, PostDate,PostTitle) VALUES ("'.$posttext.'",'.$_SESSION["UserId"].',CURRENT_TIMESTAMP,"'.$posttitle.'")');

?>

<div class="post">
    <div class="post-header">
        <p class="post-title"><?php echo $posttitle; ?></p>
        <p class="post-author">Author: <a href='#'>you, right now  </a></p>
    </div>
    <p><?php echo $posttext; ?></p>
    <div class="time-ago"></div>
</div>