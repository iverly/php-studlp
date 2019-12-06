<?php
    /* DataBase connection */
    require_once('bdd.php');

    /* Tickets storage */
    $LastName = htmlspecialchars($_POST['contactLastName']);
    $firstName = htmlspecialchars($_POST['contactFirstName']);
    $mail = htmlspecialchars($_POST['contactEmail']);
    $message = htmlspecialchars($_POST['contactMessage']);
    $insertTicket = $bdd -> prepare("INSERT INTO tickets(LastName, FirstName, Mail, MessageU) VALUES (?, ?, ?, ?)");
    $insertTicket -> execute(array($lastName, $firstName, $mail, $message));
    $ticket = array("Ticket"=>"Created");
    json_encode($ticket);
?>