<?php

include("dblayer.php");

global $DBCON;

?>

<!doctype html>

<html lang="en">

<head>
	<meta charset="utf-8">

	<title>RecordView</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta name="description" content="Write your oppinion on the latest records.">
	<meta name="author" content="kantolic">
	<meta name="keywords" content="music, record, album, review">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="media/fav/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<script src="js/jquery.js"></script>
	<script src="js/scripts.js"></script>
	<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
</head>

<body>
	<input type="hidden" value="<?php
			if(isset($_SESSION['UserId'])){
				echo $_SESSION['UserId'];
			} 
	?>" id="session">
	<div id="hider" style="display:none;"></div>
	<div id="popup_box_signup" style="display:none;">
		<div id="website-logo-signup"><img src="media/images/disc-vinyl-icon.png" alt="RecordView" />RecordView - Sign up</div>
		<form id="signup-form">
			<input class ="input-data nospace" id="signup-username" type="text" minlength=4 maxlength=15 placeholder="Username (4 - 15 characters)" />
			<input class ="input-data nospace" id="signup-password" type="password" minlength=4 maxlength=15 placeholder="Password (4 - 15 characters)" />
			<input class ="input-data nospace" id="confirm-password" type="password" minlength=4 maxlength=15 placeholder="Confirm Password" />
			<p id="msg-username-taken" style="visibility:hidden;">Username already taken!</p>
			<p id="msg-password-match"></p>
			<div id="recaptcha-div"></div>
			<p id="recaptcha-error" style="visibility:hidden;"></p>
			<input class ="input-data" type="submit" value="SUBMIT" />
		</form>
		
		<a id="buttonClose_signup_popup_box">X</a>
	</div>
	<div id="page">
		<button id="button-back-to-top" title="Go to top"><div id="top-arrow"></div></button>
		<header class="site-header">
			<div class="header-content">
				<nav>
					<ul>
						<li><a id="homebtn" href="index.php?menu=1"> <img src="media/images/disc-vinyl-icon.png" alt="Avatar" /> RecordView</a></li>
						
						<li id="login">
							<div class="container">
								<?php
								if (isset($_SESSION['UserName'])) {
									?>
									<a href='logout.php' id='logout-button'><button class="header-button" >logout</button></a><p>Welcome, <?php echo ($_SESSION['UserName']); ?></p>
								<?php
								} else {
									?>
									
									<button class="header-button" id="login-button">log in</button>
									<button class="header-button" id="signup-button" >sign up</button>
									<div class="login-container">
										<form id="login-form">
											<input class ="input-data nospace" id="login-username" type="text" placeholder="Username" />
											<input class ="input-data nospace" id="login-password" type="password" placeholder="Password" />
											<input class ="input-data" type="submit" value="SUBMIT" />
											<p id="login-error">Wrong username or password.</p>
										</form>
									</div>
								<?php
								}
								?>

							</div>
						</li>
							
					</ul>
				</nav>
			</div>
		</header>
		<main class="site-content">
		<?php
			if (!isset($_GET['menu']) || $_GET['menu'] == 1) {
				include("home.php");
			}
			?>
		</main>
		<footer class="site-footer">
			<p>Kristijan Antolić, NTPWS 2019<a href="https://github.com/kristijan1812/ntpws" target="_blank"><img src="media/images/25231.svg" title="Github link" alt="Github link"></a></p>
		</footer>
	</div>
</body>

</html>