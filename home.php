<?php

include("dblayer.php");
global $DBCON;

//FUNCTION FOR TIME AGO CALCULATION
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

if (isset($_SESSION['UserId'])){ ?>
    <div id="submit-post-form" style="margin-bottom: 20px;">
        <form id="post-form">
            <input type="text" name="PostTitle" id="PostTitle" class="PostTitle" placeholder="Write Post" minlength=6 maxlength=100></input>
            <div class="submit-container">
                <textarea name="PostText" id="PostText" class="PostText" placeholder="Content" minlength=300 maxlength=3000></textarea>
                <input type="submit" class="Post-button" id="AddPost" value="POST"/>
            </div>
        </form>
        <p id="msg-post-short" style="visibility:hidden;"></p>
    </div>
<?php }
else{ ?>
<div id="submit-post-form-notification">You must be logged in to submit a post.</div>
<?php } ?>
<div id="sort-section">
    <div id="sorting-buttons">
        Sort by:
        <button class="sort-button <?php if ((isset($_GET['Sort']) && $_GET['Sort'] == "Newest") || !isset($_GET['Sort'])){echo "sort-button-highlighted";}?>" id="sort-by-date-new" >Newest</button>
        <button class="sort-button <?php if ((isset($_GET['Sort']) && $_GET['Sort'] == "Oldest")){echo "sort-button-highlighted";}?>" id="sort-by-date-old">Oldest</button>
        <button class="sort-button <?php if ((isset($_GET['Sort']) && $_GET['Sort'] == "Popularity")){echo "sort-button-highlighted";}?>" id="sort-by-popularity">Most popular</button>
    </div>
</div>
<div id="site-posts">
    <?php
    if (isset($_GET['Sort'])){
        if($_GET['Sort'] == "Newest"){
            $query_content = "SELECT posts.*, users.UserName FROM posts INNER JOIN users ON posts.UserId = users.UserId ORDER BY PostDate DESC";
        }
        elseif($_GET['Sort'] == "Oldest"){
            $query_content = "SELECT posts.*, users.UserName FROM posts INNER JOIN users ON posts.UserId = users.UserId ORDER BY PostDate ASC";
        }
        elseif($_GET['Sort'] == "Popularity"){
            $query_content = "SELECT 
            CASE WHEN SumLikes IS NULL THEN 0
            ELSE SumLikes END AS SumLikesF,
            posts.*, users.UserName 
            FROM `posts` 
            LEFT JOIN (SELECT likes.PostId, SUM(LikeValue) AS SumLikes FROM `likes` GROUP BY PostId) `likes` 
            ON likes.PostId = posts.PostId
            INNER JOIN `users`
            On users.UserId = posts.UserId
            ORDER BY SumLikesF DESC";
        }
    }
    else{
        $query_content = "SELECT posts.*, users.UserName FROM posts INNER JOIN users ON posts.UserId = users.UserId ORDER BY PostDate DESC";
    }
    $qry = mysqli_query($DBCON, $query_content);
    while($post = mysqli_fetch_array($qry))
    {  
        $timeago=get_timeago(strtotime($post['PostDate']));
        $post_qry = mysqli_query($DBCON, "SELECT likes.PostId, SUM(LikeValue) AS SumLikes FROM `likes` WHERE PostId = ".$post['PostId']." GROUP BY PostId");
        $like_status = (mysqli_num_rows($post_qry)==0) ? 0 : mysqli_fetch_assoc($post_qry)['SumLikes'];
        ?>
        <div class="post" postid="<?php echo $post['PostId']; ?>">
            <div class="post-header">
                <p class="post-title"><?php echo $post['PostTitle']; ?></p>
                <p class="post-author"><a href='#'><?php 
                    $author = (isset($_SESSION['UserName']) && $post['UserId'] == $_SESSION['UserId'])? 'you' : $post['UserName'];
                    echo $author; 
                ?>, <?php echo $timeago; ?>  </a></p>
            </div>
            <p class ="post-text-paragraph" style='margin-bottom: 20px;word-wrap: break-word;'><?php echo nl2br($post['PostText']); ?></p><hr style="margin-bottom:36px;"/>
            <div class="post-edit-area">
                <?php
                if (isset($_SESSION['UserName']) && $post['UserId'] == $_SESSION['UserId']){?>
                    <div class="editing-buttons delete-button" postId="<?php echo $post['PostId']; ?>"><img src="media/images/delete-button.png" /></div>
                    <div class="editing-buttons edit-button" postId="<?php echo $post['PostId']; ?>"><img src="media/images/edit-button.png" /></div><?php
                }
                ?>
            </div>
            <div class="voting-area"><?php
                if (isset($_SESSION['UserId'])){
                    $qry_likes = mysqli_query($DBCON, "SELECT LikeValue FROM likes WHERE likes.UserId=".$_SESSION['UserId']." AND likes.PostId=".$post['PostId']."");
                    $qry_likes_rows = mysqli_num_rows($qry_likes);
                    if ($qry_likes_rows > 0){
                        $usr_like = mysqli_fetch_assoc($qry_likes)['LikeValue'];
                        if($usr_like==1){
                            ?><div class="vote-button " id="upvote" style="border-bottom-color: #1BBC9B;"></div>
                            <div class="vote-button " id="downvote"></div><?php
                        }
                        else{
                            ?><div class="vote-button " id="upvote"></div>
                            <div class="vote-button " id="downvote" style="border-top-color: #1BBC9B;"></div><?php
                        } 
                    }
                    else{
                        ?><div class="vote-button " id="upvote"></div>
                        <div class="vote-button " id="downvote"></div><?php
                    }
                }                
                else{
                    ?><div class="vote-button signup-to-vote"></div>
                    <div class="vote-button signup-to-vote"></div><?php
                }
                ?>
                <span id="vote-status"><?php echo $like_status; ?></span>
            </div>
        </div>
        <?php
    }
    ?>
</div>
