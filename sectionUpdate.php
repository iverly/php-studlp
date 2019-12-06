<?php 
require("bdd.php");


    $req = $bdd->prepare("UPDATE sections SET title =:title, description = :description, category = :category WHERE id_Section = :id ");
    $req->bindParam(":column",$_POST['Column']);
    $req->bindParam(":value",$_POST['Value']);
    $req->bindParam(":id",$_POST['Id']);
    $req->execute();
    
