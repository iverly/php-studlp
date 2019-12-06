<?php
    /* DataBase connection */
    require_once('bdd.php');

    $id_User = $_POST['id_user'];
    $delete = $bdd->prepare("DELETE FROM Users WHERE id_User=$id_User");
    $delete->execute();
    $userDelete = array("Delete"=>"Succed");
    json_encode($userDelete);
?>