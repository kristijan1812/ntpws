<?php

include("dblayer.php");

global $DBCON;


$post = mysqli_real_escape_string($DBCON, $_POST['PostText']);

mysqli_query($DBCON, 'INSERT INTO `posts` (`PostText`) VALUES ("'.$post.'")');

?>