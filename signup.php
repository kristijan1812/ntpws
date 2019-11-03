<?php

include("dblayer.php");

global $DBCON;
?>

<div id="signup-outer-container">
    <div class="signup-container">
        <form id="signup-form">
            <input id="signup-username" type="text" placeholder="Username" />
            <input id="signup-password" type="password" placeholder="Password" />
            <input type="submit" value="SUBMIT" />
            <p id="signup-error">Wrong username or password.</p>
        </form>
    </div>
</div>
