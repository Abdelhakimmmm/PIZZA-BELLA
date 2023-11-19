<?php 

    session_start(); 
    unset($_SESSION['user']);
    //enleve du tableau la clé et tout dedant qui sapelle user
    header("Location: ..\Acuueil\index.php");
    //exit();
?>