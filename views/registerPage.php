<?php
//Check if user is trying to escape GET methode
if (!isset($_GET["page"])) {
    echo 'Use website as expected.';
    exit;
}
?>
<div class="container" id="registerpageContainer">
    <center>
        <h5>Registreer een account</h5>
        <form method="post" action="">
            <div class="form-group">
                <input class="form-control" type="text" name="username" placeholder="Gebruikersnaam">
            </div>
            <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="E-mail">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password_1" placeholder="Wachtwoord">
            </div>
            <div class="form-group errorMessage">
                <?php
                //	Display Error
                echo display_error();
                ?>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-lg btn-border" name="register_btn">Registreer</button>
            </div>
    </center>

    </form>
</div>