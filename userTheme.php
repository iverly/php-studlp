<?php
    $modifyTheme = $bdd->prepare("UPDATE users SET Theme = ? WHERE id_User = ?");
    $modifyTheme->execute(array($_POST['theme'], $_POST['id_User']));
?>