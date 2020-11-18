<?php
$errors = array();

//  Include the view of contact
include_once('views/contactPage.php');


if (isset($_POST['contact_btn'])) {
    $naam = htmlspecialchars($_POST['naam']);
    $email = htmlspecialchars($_POST['email']);
    $bericht = htmlspecialchars($_POST['bericht']);

    // Make sure form is filled in correctly
    if (empty($naam)) {
        array_push($errors, "Naam mag niet leeg zijn");
    }
    if (empty($email)) {
        array_push($errors, "Email mag niet leeg zijn");
    }
    if (empty($bericht)) {
        array_push($errors, "Bericht mag niet leeg zijn");
    }

    //  If no errors accur, check the user
    if (count($errors) == 0) {
        contactOpnemen($naam, $email, $bericht);
    }

}

function contactOpnemen($naam, $email, $bericht)
{
    $msg = 'Mail van: ' . $naam . ' <br>Met de email: '. $email . '<br><br>' . $bericht;
    $sbj = 'Contact';
    $email = 'chatbox@lekkerchatten.nl';
    $alertmessage = 'Bericht verzonden';
    phpMailer($msg, $sbj, $email, $alertmessage);
}
