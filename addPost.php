<?php

include("dblayer.php");

global $DBCON;

mysqli_query($DBCON, 'INSERT INTO posts (PostText, UserId, PostDate,PostTitle) VALUES ("'.$_POST['PostText'].'",'.$_SESSION["UserId"].',CURRENT_TIMESTAMP,"'.$_POST['PostTitle'].'")');
$postId = mysqli_insert_id($DBCON);
if (isset($_SESSION['UserId'])){
    $qry_likes = mysqli_query($DBCON, "SELECT PostId FROM likes WHERE likes.UserId=".$_SESSION['UserId']."");
    $qry_likes_rows = [];
    while($row = mysqli_fetch_array($qry_likes))
    {
        $qry_likes_rows[] = $row['PostId'];
    }
}
?>

<div class="post" postid="<?php echo $postId; ?>">
    <div class="post-header">
        <p class="post-title"><?php echo $_POST['PostTitle']; ?></p>
        <p class="post-author"><a href='#'>you, right now  </a></p>
    </div>
    <p class ="post-text-paragraph" style='margin-bottom: 20px;word-wrap: break-word;'><?php echo nl2br($_POST['PostText']); ?></p><hr style="margin-bottom:36px;"/>
    <div class="post-edit-area">
        <div class="editing-buttons delete-button" postid="<?php echo $postId; ?>"><img src="media/images/delete-button.png" /></div>
        <div class="editing-buttons edit-button" postid="<?php echo $postId; ?>"><img src="media/images/edit-button.png" /></div>  
    </div>
    <div class="voting-area">
        <div class="vote-button" id="upvote"></div>
        <div class="vote-button" id="downvote" ></div>            
        <span id="vote-status">0</span>
    </div>
</div>