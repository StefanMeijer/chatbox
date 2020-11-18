<?php
//check if admin is logged in
if (!isAdmin()) {
    header('location: index.php?page=login');
}

//  Load in chat messages
try {
    $select = $db->prepare("SELECT * FROM users INNER JOIN chat ON chat.users_ID = users.users_ID ORDER BY chat_ID DESC");
    $select->setFetchMode(PDO::FETCH_ASSOC);
    $select->execute();
} catch (PDOException $e) {
    echo $e->getMessage();
}

//  Load in users
try {
    $select2 = $db->prepare("SELECT * FROM users WHERE users.user_type = 'user' ORDER BY username DESC");
    $select2->setFetchMode(PDO::FETCH_ASSOC);
    $select2->execute();
} catch (PDOException $e) {
    echo $e->getMessage();
}

//  Get user details of selected user
if (isset($_POST['userDetails']) && isAdmin()) {
    $id = htmlspecialchars($_POST['users']);

    //  Load in userinfo
    try {
        $select3 = $db->prepare("SELECT * FROM users WHERE users_ID = '$id'");
        $select3->setFetchMode(PDO::FETCH_ASSOC);
        $select3->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

//  Change user password
if (isset($_POST['change']) && isAdmin()) {
    changePassword($db);
}

//  Delete chat messages
if (isset($_POST['delete']) && isAdmin()) {
    deleteMessage($db);
}

//  Change selected userpassword
function changePassword($db)
{
    //  Get user values
    $id = htmlspecialchars($_POST['userID']);
    $user = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);

    //  Get random password & hash password
    $randomPassword = generateRandomPassword();
    $password = password_hash($randomPassword, PASSWORD_DEFAULT);
    
    //  Change password of selected user
    try {
        $query = $db->prepare("UPDATE users SET password='$password' WHERE '$id' = users_ID");
        $query->execute();
    } catch (PDOException $e) {
        array_push($errors, "Kon wachtwoord niet veranderen");
        echo $e->getMessage();
    }

    //  Mail the new password to the user
    $msg = 'Uw wachtwoord is veranderd naar: ' . $randomPassword . '<br> Van het account: ' . $user . '<br><br>Met vriendelijke groet, <br>Lekker Chatten team';
    $sbj = 'Wachtwoord veranderd';
    $alertmessage = 'Wachtwoord is veranderd';
    phpMailer($msg, $sbj, $email, $alertmessage);
}

//  Function to delete chat-messages
function deleteMessage($db)
{
    //  Gettings the ID value of chat that has to be deleted
    $id = htmlspecialchars($_POST['chatID']);

    //  Query for deleting chat messages
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "DELETE FROM chat WHERE chat_ID='$id' ";
    $sth  = $db->prepare($query);
    $sth->execute();
    
    //  Refresh page after delete message
    echo "<script>location.href='index.php?page=admin';</script>";
}

include_once('views/adminPage.php');
