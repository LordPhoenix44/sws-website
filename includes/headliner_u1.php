<?php
	$logout = "";
	$login_t = "Login";
	$login_l = "../login.php";
	if(isset($_COOKIE["user"])) {
		$mail1 = explode("@", $_COOKIE["user"]);
		$mail3 = explode(".", $mail1[0]);
		$login_t = ucfirst($mail3[0]);
		$login_l = '';
		$logout = '<ul><li><a href="../redirections/logout.php">Logout</a></li></ul>';
	}
	
?>
	<section id="menubar">
		<ul>
			<li>
				<a class="menubutton" href="#menu"><img src="../Bilder/menubutton.png"/></a>
			</li>
		</ul>
	</section>
	<header>
		<div class="Banner">
			<h1>Schule wird Staat</h1>
		</div>
	</header>
	<div class="backg">
		<nav>
			<ul>
				<li><a href="../home.php">Home</a></li>
				<li><a href="../Impressum.php">Hilfe</a></li>
				<li><a href="../Impressum.php">Kontakt</a></li>
				<li><a href="<?php echo $login_l; ?>"><?php echo $login_t; ?></a>
					<?php echo $logout; ?>
				</li>
			</ul>
		</nav>
	</div>
