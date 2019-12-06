<?php
    /* DataBase connection */
    require_once('bdd.php');

    $requser = $bdd->prepare("SELECT * FROM users");
    $requser->execute();

    $array = array();
    $z = 0;
    while ($req = $requser->fetch())
    {
           $array[$z] = $req;
           $z++;
    }
    json_encode($array);
?>