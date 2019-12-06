<?php
    /* DataBase connection */
    require_once('bdd.php');

    /* Section deleting */
    if(isset($_POST['delete']) AND is_numeric($_POST['delete'])) {
      $req = $bdd->prepare("DELETE FROM sections WHERE id_Section= ?");
      $req->execute(array($_POST['id']));
      $sectionDelete = array("Delete"=>"Succed");
      json_encode($sectionDelete);
    }
    else {
      $sectionDelete = array("Delete"=>"Failed");
      json_encode($sectionDelete);
    }
?>