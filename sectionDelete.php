<?php 
#pour supprimer un article post -> delete qui contient l'id de l'article a supp
if(isset($_POST['delete']) AND is_numeric($_POST['delete']))
    {
      $req = $bdd->prepare("DELETE FROM sections WHERE id_Section= :id");
      $req->bindParam(':id',$_POST['delete']);
      $req->execute();
      echo "ok";
        
    }
    
?>