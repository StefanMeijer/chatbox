<?php
//Check if user is trying to escape GET methode
if (!isset($_GET["page"])) {
    echo 'Use website as expected.';
    exit;
}
?>

<div class="content">
    <!-- logged in user information -->
    <div class="profile_info">
        <div>
            <?php  if (isset($_SESSION['user'])) : ?>
            <strong><?php echo $_SESSION['user']['username']; ?></strong>

            <small>
                <i style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>
            </small>

            <?php endif ?>
        </div>
    </div>
</div>

<div class="container-fluid" id="adminContainer">

    <div>
        <h5>Verander een gebruiker zijn wachtwoord</h5>
        <form method="POST">
            <div class="form-group">
                <select name="users" id="users">
                    <?php
                    while ($data=$select2->fetch()) {
                        ?>
                    <option
                        value="<?php echo $data['username']; ?>">
                        <?php echo $data['username']; ?>
                    </option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <table class="table" style="width:30%">
                    <tr style="border: 2px solid black">
                        <th>ID</th>
                        <th>Gebruikersnaam</th>
                        <th>Email</th>
                        <th>Verander wachtwoord</th>
                    </tr>
                    <tr style="border: 2px solid black">
                        <td>1</td>
                        <td>stefan</td>
                        <td>stefan@stefan.nl</td>
                        <td>Wachtwoord veranderen</td>
                    </tr>
                </table>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-border" name="userDetails">Krijg<br>Gebruikers info</button>
            </div>
        </form>
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