<?php
//Check if user is trying to escape GET methode
if (!isset($_GET["page"])) {
    echo 'Use website as expected.';
    exit;
}
?>

<div class="container-fluid" id="adminContainer">

    <div>
        <h5>Verander een gebruiker zijn wachtwoord</h5>
        <form method="POST">
            <div class="form-group" style="width:23em;">
                <select class="custom-select" name="users" id="users">
                    <?php
                    while ($data=$select2->fetch()) {
                        ?>
                    <option
                        value="<?php echo $data['users_ID']; ?>">
                        <?php echo $data['username']; ?>
                    </option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-border" name="userDetails">Krijg<br>Gebruikers info</button>
            </div>
        </form>
        <?php
            if (isset($_POST['userDetails']) && isAdmin()) {
                ?>
        <div class="form-group">
            <table class="table" style="width:30%">
                <tr style="border: 2px solid black">
                    <th>ID</th>
                    <th>Gebruikersnaam</th>
                    <th>Email</th>
                    <th>Verander wachtwoord</th>
                </tr>
                <tr style="border: 2px solid black">
                    <?php
                        while ($data=$select3->fetch()) {
                            ?>
                    <td>
                        <?php echo $data['users_ID']; ?>
                    </td>
                    <td>
                        <?php echo $data['username']; ?>
                    </td>
                    <td>
                        <?php echo $data['email']; ?>
                    </td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="userID"
                                value="<?php echo $data['users_ID']; ?>">
                            <input type="hidden" name="username"
                                value="<?php echo $data['username']; ?>">
                            <input type="hidden" name="email"
                                value="<?php echo $data['email']; ?>">
                            <input type="submit" class="btn" name="change" value="Verander wachtwoord">
                        </form>
                    </td>
                    <?php
                        } ?>
                </tr>
            </table>
        </div>
        <?php
            }
        ?>
    </div>
    
    <div>
        <h5>Beheer verstuurde berichten</h5>
        <div style="height: 700px;position:relative;">
            <div style="max-height:100%;overflow:auto;">
                <table class="table">
                    <tr style="border: 2px solid black">
                        <th>Gebruikersnaam</th>
                        <th>Bericht</th>
                        <th>Bericht verwijderen</th>
                    </tr>
                    <?php
            while ($data=$select->fetch()) {
                ?>
                    <tr style="border: 2px solid black">
                        <td>
                            <?php echo $data['username']; ?>
                        </td>
                        <td>
                            <?php echo $data['text']; ?>
                        </td>
                        <td>
                            <form method="POST">
                                <input type="hidden" name="chatID"
                                    value="<?php echo $data['chat_ID']; ?>">
                                <input type="submit" class="btn" name="delete" value="Verwijderen">
                            </form>
                        </td>
                    </tr>
                    <?php
            }
            ?>
                </table>
            </div>
        </div>
    </div>
</div>