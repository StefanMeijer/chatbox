<?php
//Check if user is trying to escape GET methode
if (!isset($_GET["page"])) {
    echo 'Use website as expected.';
    exit;
}
?>
<div class="container" id="inlogpageContainer">
	<center>
		<h5>Inloggen</h5>
		<form method="post" action="">
			<div class="form-group">
				<input class="form-control" type="text" name="username" placeholder="Gebruikersnaam">
			</div>
			<div class="form-group">
				<input class="form-control" type="password" name="password" placeholder="Wachtwoord">
			</div>
			<div class="form-group errorMessage">
				<?php
                //	Display Error
                echo display_error();
                ?>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-lg btn-border" name="login_btn">Login</button>
			</div>

		</form>
	</center>
</div>

