<?php
include("dblayer.php");
global $DBCON;
$postid = $_POST['PostId'];
$userid = $_POST['UserId'];
$vote = intval($_POST['Vote']);
$current = intval($_POST['Current']);
$qry_likes = mysqli_query($DBCON, "SELECT LikeValue FROM likes WHERE likes.UserId=".$userid." AND likes.PostId=".$postid."");
$qry_likes_rows = mysqli_num_rows($qry_likes);
if ($qry_likes_rows > 0){
    $usr_like = intval(mysqli_fetch_assoc($qry_likes)['LikeValue']);
    if($usr_like==$vote){
        mysqli_query($DBCON, "DELETE FROM `likes` WHERE UserId=".$userid." AND PostId=".$postid."");
        echo "exists";
    }
    else{
        mysqli_query($DBCON, "DELETE FROM `likes` WHERE UserId=".$userid." AND PostId=".$postid."");
        mysqli_query($DBCON, "INSERT INTO `likes` (UserId, PostId, LikeValue) VALUES (".$userid.", ".$postid.", ".$vote.")");
        echo "counter";
    }
}
else{
    mysqli_query($DBCON, "INSERT INTO `likes` (UserId, PostId, LikeValue) VALUES (".$userid.", ".$postid.", ".$vote.")");
    echo strval($current+$vote);
}
