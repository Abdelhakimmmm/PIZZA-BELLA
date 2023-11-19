<!-- HEADER : LE MENU DE MA PAGE -->
<header id="navbar" class="header headeranim">
  <div id="pop" class="menudeux">
    <li class="nav-link">
      <a class="Acc" href="../PHP/page_add-user.php">> Inscription </a>
    </li>
    <li class="nav-link ">
      <a class="lac" href="../PHP/connexion.php">> Connexion </a>
    </li>
    <li class="nav-link">
      <a href="../PHP/deconnexion.php">> Déconnexion </a>
    </li>

    <?php if (isset($_SESSION['user']) && intval($_SESSION['user']['role']) === 1): ?>

    <li class="nav-link">
      <a href="../PHP/page_new_pizza.php">> Ajouter une pizza </a>
    </li>
    <li class="nav-link">
      <a href="./Contacts/Contacts.html">> Modifier une pizza </a>
    </li>
    <li class="nav-link">
      <a href="../PHP/page_delete_pizza.php">> Suprimer une pizza </a>
    </li>
    <li class="nav-link">
      <a href="../PHP/page_add-user.php">> Ajouter un utilisateur </a>
    </li>
    <li class="nav-link">
      <a href="../PHP/page_update_user.php">> Modifier un utilisateur </a>
    </li>
    <li class="nav-link">
      <a href="../PHP/page_delete-user.php">> Supprimer un utilisateur </a>
    </li>
    <?php endif; ?>

  </div>
  <a href="../Acuueil/index.php"><img class="navbar-brand" id="Logo" src="../RESSOURCES/Logo/La Bella.png"
      alt="Logo La Bella🍕"></a>

  <nav class="navbar navbar-expand-lg">
    <ul class="nav-list">
      <!-- <li class="nav-link">
        <a class="Acc" href="./Accueil/Accueil.html">Accueil</a>
      </li> -->
      <li class="nav-link ">
        <a class="lac" href="../Acuueil/laCarte.php">La carte</a>
      </li>
      <li class="nav-link">
        <a href="./Contacts/Contacts.html">Contact</a>
      </li>
      <li class="nav-link">
        <a href="#">0769853127</a>
      </li>
    </ul>

    <a id="burger" href="#">
      <div class="menu-wrapper">
        <div class="burger-icon">
          <div class="line"></div>
          <div class="line un"></div>
          <div class="line deux"></div>
        </div>
      </div>
    </a>
  </nav>


</header>