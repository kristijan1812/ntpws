<?php

include("dblayer.php");

global $DBCON;

?>

<div id="site-posts">
    <?php
    $qry = mysqli_query($DBCON, "SELECT posts.*, users.UserName FROM posts INNER JOIN users ON posts.UserId = users.UserId");
    while($post = mysqli_fetch_array($qry))
    {  
        ?>
        <div class="post">
            <div class="post-header">
                <p class="post-title"><?php echo $post['PostTitle']; ?></p>
                <p class="post-author">Posted by: <a href='#'><?php echo $post['UserName']; ?>  </a></p>
            </div>
            <p><?php echo $post['PostText']; ?></p>
        </div>
        <?php
    }

    ?>
</div>


<div>
    <form id="post-form">
        <textarea name="PostText" id="PostText"></textarea>
        <input type="submit" id="AddPost" />
    </form>
</div>