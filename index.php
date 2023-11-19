<?php 
  session_start();
  include("./class/articles.php");
  require_once("./_partials/header.php");
  require_once("./_partials/menu.php");
  require_once("./include/formulaireDeContact.php");
?>

<div id="bgaccueil">
  <img id="acc-bg" src="../RESSOURCES/bg2.jpg" alt="Logo La Bella🍕">
</div>

<!-- PROPOTIONS -->

<div class="container-promo">
  <p class="titre1 pos11">Promotion</p>

  <!-- PROM O1 -->
  <div class="promoVert promojs">
    <div class="Imgpromo1">
      <img id="imgpro1" src="../RESSOURCES/pro1.jpg" alt="image pizza">
    </div>
    <div class="txtpromo1">
      <p class="jours posjj">Les mardis</p>
      <p class="promotexte pospp">Ne manquez pas notre promotion <br> pizza à moitié prix !</p>
      <p class="prix posprr"><strong>7.00€</strong></p>

    </div>

  </div>
  <!-- PROM O2 -->

  <div class="PromoRouge promojs">
    <div class="Imgpromo2">
      <img id="imgpro2" src="../RESSOURCES/Pro2.jpg" alt="image pizza double">
    </div>
    <div class="txtpromo2">
      <p class="jours posj">Les vendredis</p>
      <p class="promotexte posp">3 pizzas Maxi achetées</p>
      <p class="prix pospr">La 3ème à <span>3.00€</span></p>
    </div>

  </div>
</div>

<button class="buttonpro buttposs">Commander</button>
<button class="buttonproun buttpos">Commander</button>

<!-- NOS PIZZA -->
<div class="containerNospizzas">
  <p class="nosPizza" id="tnpizz">Nos Pizza >>></p>
  <div class="container-nav2 ">
    <!-- MENU -->
    <button class="b btnch">Base tomate</button>
    <button class="b btnch">Base creme fraiche</button>
    <button class="b btnch">Base chocolat</button>
  </div>
</div>

<section id="possibliities">
  <div class="wrapper">
    <?php 
      $findPizza = new articles();
      $articles = $findPizza->findAllPizzas();
    ?>
    <?php foreach ($articles as $article): ?>
    <article class="ChoixPizza"
      style="background-image: url(../RESSOURCES/<?= $article['photos'] ?>); background-repeat: no-repeat; background-position: 0 -65px;">
      <div class="overlay">
      </div>
      <p class="Npizz"><?= $article['nom'] ?></p>
      <p class="txtpiuzz"><?= $article['description'] ?></p>
      <p class="prixpuizz"><?= $article['prix']."$" ?></p>
      <a class="btnpuz" href="#">Commander</a>
    </article>
    <?php endforeach; ?>

  </div>

</section>

<footer>
  <div class="form-container">
    <form class="formuilaire" method="post" action="index.php" id="formuilaire">
      <label for="Nom">Nom</label>
      <input class="in" type="text" name="nom" placeholder="Nom">

      <label for="E-Mail">
        <input class="in" type="text" name="mail" placeholder="E-Mail">
      </label>
      <label for="Sujet">
        <input class="in" type="text" name="sujet" placeholder="Sujet">
      </label>
      <textarea name="text" id="" cols="30" rows="5"></textarea>
      <button id="Envoye">ENVOYER</button>
    </form>
  </div>

  <div id="SocialMedia">
    <div id="cdf">
      <article class="Lacdf">
        <div class="backbtnc">
          <a class="btncdf" href="../">Carte de fidélité disponible</a>
        </div>
      </article>
    </div>
    <article>
      <div class="maps">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2931.2086861525354!2d1.4062763729617191!3d38.88952874121661!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12994550e186d8d7%3A0x75cdf6d8bdfc6e4e!2sBaloo%20Ibiza!5e0!3m2!1sfr!2sfr!4v1685970551938!5m2!1sfr!2sfr"
          width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
  </div>
  </article>

  <div id="end">
    <div class="ca">
      <p class="ttt"> <strong>LIENS UTILES</strong> </p>
      <p class="thinstxt">
        Mentions légales <br>
        Politique de cookies<br>
        Politique de données<br>
        Conditions Générales<br>
        Copyright </p>

      <a href="#" target="_blank" class="Snap"></a>
      <a href="#" target="_blank" class="Tweet"></a>
      <a href="#" target="_blank" class="YT"></a>
      <a href="www.facebook.com" target="_blank" class="Fb"></a>
      <a href="#" target="_blank" class="Insta"></a>
      <a href="#" target="_blank" class="Tiktok"></a>
    </div>

    <div class="cb">
      <p class="ttt"> <strong>HORAIRES D'OUVERTURE</strong> </p>
      <p class="thinstxt">Du dimanche au jeudi<br>
        de 11h à 14h et de 18h à 23h.<br>
        et du vendredi au samedi<br>
        de 18h à 00h.</p>
    </div>
</footer>

</body>

</html>