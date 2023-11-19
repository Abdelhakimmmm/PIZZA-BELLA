<?php 
require_once("../PHP/connexion-Data-Base.php");
require_once("../Acuueil/menu.php");
require_once ("../model/pizza.php"); 


  if (!isset($_GET['id']) || empty($_GET['id']) || !is_numeric($_GET['id'])) 
  {
    // header("Location: index.php");
    exit("Erreur : ID de pizza non valide.");
  }
  

  $pizza = new Pizza ($_GET['id'], $db);
  

  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="Stylesheet" href="./Accueil/Styles.css">
</head>

<body>
  <main>
    <section id="possibliities">
      <div class="wrapper">


        <article class="ChoixPizza"
          style="background-image: url(../Assets/Images/<?= $pizza->photos ?>);background-size: cover;background-repeat: no-repeat; background-position: 0 -50px; overflow: hidden;">
          <div class="overlay">
            <p class="Npizz"><?= $pizza->nom ?></p>
            <p class="txtpiuzz"><?= $pizza->description ?></p>
            <p class="prixpuizz"><?= $pizza->prix ?></p>
            <a class="btnpuz" href="#">Commander</a>
          </div>
        </article>

      </div>
    </section>
  </main>

</body>

</html>