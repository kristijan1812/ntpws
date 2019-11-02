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
                <input type="submit" id="AddPost" value="POST"/>
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
    if (isset($_SESSION['UserId'])){
        $qry_likes = mysqli_query($DBCON, "SELECT PostId FROM likes WHERE likes.UserId=".$_SESSION['UserId']."");
        $qry_likes_rows = [];
        while($row = mysqli_fetch_array($qry_likes))
        {
            $qry_likes_rows[] = $row['PostId'];
        }
    }
    
    
    while($post = mysqli_fetch_array($qry))
    {  
        $timeago=get_timeago(strtotime($post['PostDate']));
        $post_qry = mysqli_query($DBCON, "SELECT likes.Value FROM `likes` WHERE PostId=".$post['PostId']."" );
        $like_status = 0;
        while($like = mysqli_fetch_array($post_qry))
        {
            $like_status += $like['Value'];
        }
        ?>
        <div class="post" postid="<?php echo $post['PostId']; ?>">
            <div class="post-header">
                <p class="post-title"><?php echo $post['PostTitle']; ?></p>
                <p class="post-author"><a href='#'><?php 
                    $author = (isset($_SESSION['UserName']) && $post['UserId'] == $_SESSION['UserId'])? 'you' : $post['UserName'];

                    echo $author; 
                ?>, <?php echo $timeago; ?>  </a></p>
            </div>
            <p style='margin-bottom: 20px;'><?php echo nl2br($post['PostText']); ?></p><hr style="margin-bottom:36px;"/>
            <div class="post-edit-area">
                <?php
                if (isset($_SESSION['UserName']) && $post['UserId'] == $_SESSION['UserId']){?>
                    <div class="editing-buttons delete-button" postId="<?php echo $post['PostId']; ?>"><img src="media/images/delete-button.png" /></div>
                    <div class="editing-buttons edit-button" postId="<?php echo $post['PostId']; ?>"><img src="media/images/edit-button.png" /></div><?php
                }
                
                ?>
            </div>
            <div class="voting-area"><?php 
                if (isset($_SESSION['UserId']) && in_array($post['PostId'], $qry_likes_rows)){ ?> 
                    <div class="vote-button upvote" style="border-top-color: red;"></div>
                    <div class="vote-button downvote" style="border-bottom-color: red;"></div><?php
                
                }
                else{
                    ?><div class="vote-button upvote"></div>
                    <div class="vote-button downvote"></div><?php
                }
                ?>
                
                
                <span id="vote-status"><?php echo $like_status; ?></span>
            </div>
        </div>
        <?php
    }

    ?>
</div>
