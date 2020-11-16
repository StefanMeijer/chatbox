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
    $select2 = $db->prepare("SELECT * FROM users WHERE users.user_type = 'user'");
    $select2->setFetchMode(PDO::FETCH_ASSOC);
    $select2->execute();
} catch (PDOException $e) {
    echo $e->getMessage();
}

if (isset($_POST['delete']) && isAdmin()) {
    deleteMessage($db);
}
if (isset($_POST['userDetails']) && isAdmin()) {
    userInfo($db);
}

function userInfo($db) {
    echo 'hpi';
}

//  Function to delete chat-messages
function deleteMessage($db)
{
    //  Gettings the ID value of chat that has to be deleted
    $id = htmlspecialchars($_POST['chatID']);

    //Query for deleting data
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "DELETE FROM chat WHERE chat_ID='$id' ";
    $sth  = $db->prepare($query);
    $sth->execute();
    
    //If succesfull redirect back to page
    echo "<script>location.href='index.php?page=admin';</script>";
}

include_once('views/adminPage.php');
