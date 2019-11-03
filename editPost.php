<?php

include("dblayer.php");

global $DBCON;

mysqli_query($DBCON, 'UPDATE posts SET PostTitle="'.$_POST['NewTitle'].'", PostText="'.$_POST['NewText'].'" WHERE PostId='.$_POST['PostId'].'');

?>


<div class="post-header">
    <p class="post-title"><?php echo $_POST['NewTitle']; ?></p>
    <p class="post-author"><a href='#'><?php echo $_POST['PostAuthor'] ?></a></p>
</div>
<p class ="post-text-paragraph" style='margin-bottom: 20px;'><?php echo nl2br($_POST['NewText']); ?></p><hr style="margin-bottom:36px;"/>
<div class="post-edit-area">
    <div class="editing-buttons delete-button" postid="<?php echo $_POST['PostId']; ?>"><img src="media/images/delete-button.png" /></div>
    <div class="editing-buttons edit-button" postid="<?php echo $_POST['PostId']; ?>"><img src="media/images/edit-button.png" /></div>  
</div>
<div class="voting-area">
    <div class="vote-button upvote" ></div>
    <div class="vote-button downvote" ></div>            
    <span id="vote-status"><?php echo $_POST['PostLikes'] ?></span>
</div>
