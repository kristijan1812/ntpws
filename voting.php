<?php

include("dblayer.php");

global $DBCON;


$posttext = mysqli_real_escape_string($DBCON, $_POST['PostText']);
$posttitle = mysqli_real_escape_string($DBCON, $_POST['PostTitle']);
mysqli_query($DBCON, 'INSERT INTO posts (PostText, UserId, PostDate,PostTitle) VALUES ("'.$posttext.'",'.$_SESSION["UserId"].',CURRENT_TIMESTAMP,"'.$posttitle.'")');

?>
<?php echo $post['Upvotes']-$post['Downvotes'] ?>