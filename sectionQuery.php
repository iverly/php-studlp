<?php

require_once("bdd.php");
if(isset($_POST['category']) AND is_numeric($_POST['category']))
{
    $req = $bdd->prepare("SELECT * FROM sections WHERE category=:input");
    $req->bindParam(':input',$_POST['category']);
    $req->execute();
    
}
else
{
    $req = $bdd->prepare("SELECT * FROM sections");
    $req->execute();


   
}
 $array = array();
 $z = 0;

    while ($i = $req->fetch(PDO::FETCH_OBJ))
    {
           $array[$z] = $i;
           $z++;

    }
print_r(json_encode($array));
