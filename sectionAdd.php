<?php 
# pour ajouter un article, post -> description, title et category
#pour supprimer un article post -> delete qui contient l'id de l'article a supp
require_once("bdd.php");


   
    if(isset($_POST['description']) AND isset($_POST['title']) AND isset($_POST['category'])) 
    {
        if(strlen($_POST['title']) < 255)
        {
            if(is_numeric($_POST['category']) AND $_POST['category'] >= 1 AND $_POST['category'] <= 4)
            
            {
                $titre = $_POST['title'];
                $desc = $_POST['description'];
                $category =  $_POST['category'];
                $stmt = $bdd->prepare("INSERT INTO sections(Title,DescS,Category,DateC) VALUES(?,?,?,CURTIME())");
                $desc = nl2br($desc);       
                $stmt->execute(array($titre, $desc, $category));  
                echo "ok";
            }
            else die ("Category doit être un entier compris entre 1 et 4");
            
            
        }
        
        else
        {
            die ("Le titre ne doit pas dépasser 255 car");
        }
        
        
    }
    
    
    
?>
    