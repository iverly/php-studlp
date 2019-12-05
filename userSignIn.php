<?php session_start();
    /* DataBase connection */
    require_once('bdd.php');

    /* User connection */
    $mailconnect = htmlspecialchars($_POST['mailConnect']);
    $passconnect = sha1($_POST['passConnect']);
    if (!empty($mailconnect) AND !empty($passconnect)) {
        $requser = $bdd->prepare("SELECT * FROM users WHERE Mail = ? AND Pass = ?");
        $requser->execute(array($mailconnect, $passconnect));
        $userexist = $requser->rowCount();
        if ($userexist == 1) {
            $userinfo = $requser -> fetch();
            $_SESSION['id'] = $userinfo['id_User'];
            $userRegistration = array("Connected"=>"Connected", "LastName"=>$lastName, "FirstName"=>$firstName, "Mail"=>$mailconnect, "City"=>$city, "School"=>$school, "DateB"=>$dateB);
            json_encode($userRegistration);
        }
        else {
            $userRegistration = array("Connected"=>"FailedMailORPass");
            json_encode($userRegistration);
        }
    }
    else {
        $userRegistration = array("Connected"=>"FailedInput");
        json_encode($userRegistration);
    }
?>