<?php

include("dblayer.php");

global $DBCON;

?>

<div id="site-comments">
    <?php
    $qry = mysqli_query($DBCON, "SELECT * FROM comments");
    while($post = mysqli_fetch_array($qry))
    {
        ?>
        <p><?php echo $post['CommentText']; ?></p>
        <?php
    }

    ?>
</div>


<div>
    <form id="comment-form">
        <textarea name="CommentText" id="CommentText"></textarea>
        <input type="submit" id="AddComment" />
    </form>
</div>