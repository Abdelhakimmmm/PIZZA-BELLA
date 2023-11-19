<?php
  // Vérifier si le fichier est de type MIME image
  if (isset($_FILES['ficherTemporaire']) && empty($_FILES['photos']['error'])) {

    $types_img = [

      "jpg" => "image/jpeg",
      "jpeg" => "image/jpeg",
      "png" => "image/png",

    ];

    $img_file_name = $_FILES['photos']['name'];
    $img_file_type = $_FILES['photos']['type'];
    $img_file_size = $_FILES['photos']['size'];

    $img_file_extention = pathinfo($img_file_name, PATHINFO_EXTENSION); 
    
    if (!array_key_exists($img_file_extention, $types_img) || !in_array($img_file_type, $types_img)) {
      header("Location: index.php");
    }

    // Vérifie que le fichier est < 10mo (1mo * 10)
    if (!($img_file_size < ((1024 * 1024) * 10))) {
      header("Location: index.php?msg=Fichier trop grand");
      exit();
    }

    
    // on renomme le fichier 
    $img_save_name = md5(uniqid()).'.'.$img_file_extention;

    $path_img = __DIR__."\\Assets\\Images\\".$img_save_name;

    echo $path_img;
    echo "<br>";
    echo $_FILES['photos']['tmp_name'];

    echo "<pre>";
    var_dump($_FILES);
    echo "</pre>";



    // On enregistre l'image
    if (!move_uploaded_file($_FILES['photos']['tmp_name'], $path_img)) {
      header("Location: index.php?msg=Erreur à l'enregistrement");
      exit();
    }

    chmod($path_img, 0644);

    // mkdir et unlink
    

    


  } else {
    // Rediriger avec un message d'erreur si le fichier est incorrect
    header("Location: index.php?msg=Fichier Incorrect");
    exit();
  }
?>