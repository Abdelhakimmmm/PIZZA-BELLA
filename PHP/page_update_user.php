<?php 
require_once("../class/update_users.php");
require_once("../_partials/menu.php");
require_once("../_partials/header.php");
?>
<form id="formu" method="post" action="../PHP/page_update_user.php">
  <?php 
    $updateOfUser = new updtUsr();
    $updateOfUser->update_user();
  ?>
  <div>
    <label for="id">id</label>
    <input type="number" name="id" id="id" required>
  </div>
  <div>
    <label for="nom">nom</label>
    <input type="text" name="nom" id="nom" required>
  </div>
  <div>
    <label for="prenom">prenom</label>
    <input type="text" name="prenom" id="prenom" required>
  </div>
  <div>
    <label for="Email">mail</label>
    <input type="text" name="Email" id="Email" required>
  </div>
  <div>
    <label for="password">pass</label>
    <input type="password" name="mdp" id="password" required>
  </div>
  <div>
    <button type="submit">Enregistrer</button>
  </div>
</form>
</body>

</html>