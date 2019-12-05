<?php
    /* DataBase connection */
    require_once('bdd.php');

    /* User registration */
    $mail = htmlspecialchars($_POST['mail']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $firstName = htmlspecialchars($_POST['firstName']);
    $dateB = htmlspecialchars($_POST['dateB']);
    $city = htmlspecialchars($_POST['city']);
    $school = htmlspecialchars($_POST['school']);
    $pass1 = sha1($_POST['pass1']);
    $pass2 = sha1($_POST['pass2']);

    if(!empty($_POST['lastName']) AND !empty($_POST['firstName']) AND !empty($_POST['mail']) AND !empty($_POST['dateB']) AND !empty($_POST['city']) AND !empty($_POST['school']) AND !empty($_POST['pass1']) AND !empty($_POST['pass2'])) {
        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $reqmail = $bdd->prepare("SELECT * FROM users WHERE mail=? ");
            $reqmail->execute(array($mail));
            $mailexist = $reqmail->rowCount();
            if ($mailexist == 0) {
                if ($pass1 == $pass2) {
                    $insertmbr = $bdd -> prepare("INSERT INTO users(Mail, LastName, FirstName, Pass, City, DateB, School) VALUES (?, ?, ?, ?, ?, ?, ?)");
                    $insertmbr -> execute(array($mail, $lastName, $firstName, $pass1, $city, $dateB, $school));
                    $userRegistration = array("Registration"=>"Registered", "LastName"=>$lastName, "FirstName"=>$firstName, "Mail"=>$mailconnect, "City"=>$city, "School"=>$school, "DateB"=>$dateB);
                    json_encode($userRegistration);
                }
                else {
                    $userRegistration = array("Registration"=>"FailedPass");
                    json_encode($userRegistration);
                }
            }
            else {
                $userRegistration = array("Registration"=>"FailedMailUsed");
                json_encode($userRegistration);
            }
        }
        else {
            $userRegistration = array("Registration"=>"FailedMail");
            json_encode($userRegistration);
        }
    }
    else {
        $userRegistration = array("Registration"=>"FailedInput");
        json_encode($userRegistration);
    }
?>