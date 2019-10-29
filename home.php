<?php

include("dblayer.php");

global $DBCON;

function get_timeago($ptime)
{
    $estimate_time = time() - $ptime;

    if( $estimate_time < 1 )
    {
        return 'less than 1 second ago';
    }

    $condition = array(
                12 * 30 * 24 * 60 * 60  =>  'year',
                30 * 24 * 60 * 60       =>  'month',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $estimate_time / $secs;

        if( $d >= 1 )
        {
            $r = round( $d );
            return  $r . ' ' . $str . ( $r > 1 ? 's' : '' ) . ' ago';
        }
    }
}

?>
<?php
if (isset($_SESSION['UserId'])){ ?>
    <div id="submit-post-form" style="margin-bottom: 20px;">
        <form id="post-form">
            <input type="text" name="PostTitle" id="PostTitle" placeholder="Write Post"></input>
            <div class="submit-container">
                <textarea name="PostText" id="PostText" placeholder="Content"></textarea>
                <input type="submit" id="AddPost" />
                </div>
        </form>
    </div>
<?php }
else{ ?>
<div id="submit-post-form-notification">You must be logged in to submit a post.</div>
<?php } ?>


<div id="sort-section">
    <div id="sorting-buttons">
    Sort by:
    <button class="sort-button-highlighted " class="sort-button" id="sort-by-date" >Newest</button><button class="sort-button" id="sort-by-date">Oldest</button><button class="sort-button" id="sort-by-popularity">Most popular</button>
    </div>
</div>
<div id="site-posts">
    <?php
    $qry = mysqli_query($DBCON, "SELECT posts.*, users.UserName FROM posts INNER JOIN users ON posts.UserId = users.UserId ORDER BY PostDate DESC");
    while($post = mysqli_fetch_array($qry))
    {  
        $timeago=get_timeago(strtotime($post['PostDate']));
        ?>
        <div class="post">
            <div class="post-header">
                <p class="post-title"><?php echo $post['PostTitle']; ?></p>
                <p class="post-author">Author: <a href='#'><?php 
                    $author = (isset($_SESSION['UserName']) && $post['UserId'] == $_SESSION['UserId'])? 'you' : $post['UserName'];

                    echo $author; 
                ?>, <?php echo $timeago; ?>  </a></p>
            </div>
            <p><?php echo $post['PostText']; ?></p>
            <div class="time-ago"></div>
        </div>
        <?php
    }

    ?>
</div>


