<?php

include("dblayer.php");

global $DBCON;


$comment = mysqli_real_escape_string($DBCON, $_POST['CommentText']);

mysqli_query($DBCON, 'INSERT INTO `comments` (`CommentText`) VALUES ("'.$comment.'")');

?>
<p><?php echo $comment; ?></p>