<?php
    /* DataBase connection */
    require_once('bdd.php');

    /* User modification */
    if (!empty($_POST['lastName']) AND !empty($_POST['firstName']) AND !empty($_POST['mail']) AND !empty($_POST['dateB']) AND !empty($_POST['city']) AND !empty($_POST['school'])) {
        $mail = htmlspecialchars($_POST['mail']);
        $lastName = htmlspecialchars($_POST['lastName']);
        $firstName = htmlspecialchars($_POST['firstName']);
        $dateB = htmlspecialchars($_POST['dateB']);
        $city = htmlspecialchars($_POST['city']);
        $school = htmlspecialchars($_POST['school']);
        $pass1 = sha1($_POST['pass1']);
        $pass2 = sha1($_POST['pass2']);

        $requser = $bdd->prepare("SELECT * FROM users WHERE id_User = ?");
        $requser->execute(array($_SESSION['id']));
        $user = $requser->fetch();

        if ($lastName != $user['LastName']) {
            $modifyLastName = $bdd->prepare("UPDATE users SET LastName = ? WHERE id_user = ?");
            $modifyLastName->execute(array($lastName, $user['id_User']));
        }
        if ($firstName != $user['FirstName']) {
            $modifyFirstName = $bdd->prepare("UPDATE users SET FirstName = ? WHERE id_User = ?");
            $modifyFirstName->execute(array($firstName, $user['id_User']));
        }
        if ($mail != $user['Mail']) {
            $modifyMail = $bdd->prepare("UPDATE membres SET Mail = ? WHERE id_User = ?");
            $modifymail->execute(array($mail, $user['id_User']));
        }
        if ($dateB != $user['DateB']) {
            $modifyDateB = $bdd->prepare("UPDATE membres SET Mail = ? WHERE id_User = ?");
            $modifyDateB->execute(array($dateB, $user['id_User']));
        }
        if ($city != $user['City']) {
            $modifyCity = $bdd->prepare("UPDATE membres SET Mail = ? WHERE id_User = ?");
            $modifyCity->execute(array($city, $user['id_User']));
        }
        if ($school != $user['School']) {
            $modifySchool = $bdd->prepare("UPDATE membres SET Mail = ? WHERE id_User = ?");
            $modifySchool->execute(array($school, $user['id_User']));
        }
        if (!empty($_POST['pass1']) AND !empty($_POST['pass2'])) {
            if ($pass1 == $pass2) {
                $modifyPass = $bdd->prepare("UPDATE users SET Pass = ? WHERE id_User = ?");
                $modifyPass->execute(array($pass1, $user['id_User']));
            }
            else {
                $userRegistration = array("Modify"=>"FailedPass");
                json_encode($userRegistration);
            }
        }
    }
    else {
        $userRegistration = array("Modify"=>"FailedInput");
        json_encode($userRegistration);
    }
?>