<?php
//Check if user is trying to escape GET methode
if (!isset($_GET["page"])) {
    echo 'Use website as expected.';
    exit;
}
?>

<div class="container" id="chatboxContainer">
    <center>
        <h5>Welkom bij de chatbox! Hou het gezellig en veel plezier met chatten!</h5>
    </center>

    <div style="height: 500px;position:relative; border: 1px solid black;">
        <div style="max-height:100%;overflow:auto;">
            <div id="chatboxContent"></div>
        </div>
    </div>

    <form id="chatForm" method="POST">
        <div class="form-group" style="margin-bottom: 0rem;">
            <input class="form-control" id="chatBericht" type="text" name="chat" maxlength="115"
                placeholder="Typ hier uw bericht">
        </div>
        <?php
            //	Display Error
            echo display_error();
        ?>
    </form>
</div>

<script>
    //  Script for auto-reloading chat messages
    $(document).ready(function() {
        setInterval(function() {
            $('#chatboxContent').load('elements/fetch.php').fadeIn("slow");
        }, 1000);
    });
</script>