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
</head>

<body>

	<div id="page">
		<header class="site-header">
			<div class="header-content">
				<nav>
					<ul>
						<li><a href="index.php?menu=1"> <img src="media/images/disc-vinyl-icon.png" alt="Avatar" /> RecordView</a></li>
						<li><a href="#">search bar</a></li>
						<li id="login">
							<div class="container">
								<?php
								if (isset($_SESSION['Username'])) {
									?>
									<p><?php echo ($_SESSION['Username']); ?></p>
								<?php
								} else {
									?>
									<button id="login-button">log in</button>
									<div class="login-container">
										<form id="login-form">
											<input id="login-username" type="text" placeholder="Username" />
											<input id="login-password" type="password" placeholder="Password" />
											<input type="submit" value="SUBMIT" />
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
			<p>Kristijan Antolić, NTPWS 2019<a href="https://github.com/kristijan1812/ntpws" target="_blank"><img src="media/images/25231.svg" title="Github link" alt="Github link"></a><a href="#">Contact us</a></p>
		</footer>
	</div>
</body>

</html>