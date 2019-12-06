<?php
    /* DataBase connection */
    require_once('bdd.php');

    /* Section requirering */
    if(isset($_POST['category']) AND is_numeric($_POST['category'])) {
        $req = $bdd->prepare("SELECT * FROM sections WHERE category=?");
        $req->execute(array($_POST['category'])); 
    }
    else {
        $req = $bdd->prepare("SELECT * FROM sections");
        $req->execute();
    }
    $array = array();
    $z = 0;
    while ($i = $req->fetch(PDO::FETCH_OBJ)) {
        $array[$z] = $i;
        $z++;
    }
    json_encode($array);
?>