<?php
include_once('DBconfig.php');

//Load in chat messages with username
try {
    $select = $db->prepare("SELECT * FROM users INNER JOIN chat ON chat.users_ID = users.users_ID ORDER BY chat_ID DESC");
    $select->setFetchMode(PDO::FETCH_ASSOC);
    $select->execute();

    //Loop to display chat-texts & usernames that belong to the message
    while ($data=$select->fetch()) {
            echo '<span>'.$data['username'].'</span><br>';
            echo '<span>'.$data['text'].'</span>';
            echo '<br><br>';
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
