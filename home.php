<?php

include("dblayer.php");

global $DBCON;

?>

<div id="site-posts">
    <?php
    $qry = mysqli_query($DBCON, "SELECT * FROM posts");
    while($post = mysqli_fetch_array($qry))
    {
        ?>
        <p><?php echo $post['PostText']; ?></p>
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