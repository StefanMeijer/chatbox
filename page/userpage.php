<?php
//check if user is logged in
if (!isLoggedIn()) {
    header('location: index.php?page=login');
}
$errors = array();

//  Get chat value's & define variables
if (isset($_POST['chat'])) {
    //  Variables
    global $db;
    $chat = htmlspecialchars($_POST['chat']);
    $curUser = $_SESSION['user']['users_ID'];

    // Make sure form is filled in correctly
    if (empty($chat)) {
        array_push($errors, "Voer een bericht in");
    }
    if (strlen($chat) > 115) {
        array_push($errors, "Bericht is te lang");
    }

    //  If no errors accur, uplaod the chat message
    if (count($errors) == 0) {
        uploadChat($chat, $curUser, $db);
    }
}

//  Upload chat message
function uploadChat($chat, $curUser, $db)
{
    $query = $db->prepare("INSERT INTO chat (text, users_ID) VALUES (:chatcontent, :curuser)");
    $query->execute(array(':chatcontent' => $chat, ':curuser' => $curUser));
}

include_once('views/userPage.php');
