<?php
//Check if user is trying to escape GET methode
if (!isset($_GET["page"])) {
    echo 'Use website as expected.';
    exit;
}
?>
<div class="container" id="contactpageContainer">
    <center>
        <h5>Neem contact op</h5>
        <form method="post" action="">
            <div class="form-group">
                <input class="form-control" type="text" name="naam" placeholder="Naam">
            </div>
            <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="E-mail">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="bericht" placeholder="Bericht">
            </div>
            <div class="form-group errorMessage">
                <?php
                //	Display Error
                echo display_error();
                ?>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-lg btn-border" name="contact_btn">Verzenden</button>
            </div>

        </form>
    </center>
</div>