<?php 
    /* DataBase connection */
    require_once('bdd.php');

    /* Section updating */
    $req = $bdd->prepare("UPDATE sections SET Title = ?, DescS = ?, Category = ? WHERE id_Section = :id ");
    $req->execute(array($_POST['Title'], $_POST['Desc'], $_POST['Category']));*
    $sectionModify = array("Modify"=>"Succed");
    json_encode($sectionModify);
?>