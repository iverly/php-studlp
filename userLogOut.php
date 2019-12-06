<?php session_start();
    $_SESSION = array();
    session_destroy();
    $userLogOut = array("LogOut"=>"Succed");
    json_encode($userLogOut);
?>