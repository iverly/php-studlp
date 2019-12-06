<?php 
    /* DataBase connection */
    require_once('bdd.php');

    /* Section adding */
    if(isset($_POST['description']) AND isset($_POST['title']) AND isset($_POST['category'])) {
        if(strlen($_POST['title']) < 255) {
            if(is_numeric($_POST['category']) AND $_POST['category'] >= 1 AND $_POST['category'] <= 4) {
                $titre = $_POST['title'];
                $desc = $_POST['description'];
                $category =  $_POST['category'];
                $link = $_POST['link'];
                $stmt = $bdd->prepare("INSERT INTO sections(Title,DescS,Category,Link,DateC) VALUES(?,?,?,?,CURTIME())");
                $desc = nl2br($desc);       
                $stmt->execute(array($titre, $desc, $category, $link));  
                $sectionAdd = array("Add"=>"Succed");
                json_encode($sectionAdd);
            }
            else {
                $sectionDelete = array("Delete"=>"FailledCat");
                json_encode($sectionDelete);
            }
        }
        else {
            $sectionDelete = array("Delete"=>"FailledLength");
            json_encode($sectionDelete);
        }
    }
?>
    