<?php 

  require_once("../class/add_users.php");
  require_once("../_partials/menu.php");
  require_once("../_partials/header.php");
?>
<form id="formu" class="inscription" method="post" action="page_add-user.php">
  <?php 
    $addUsr = new addUser();
    $addUsr->addUsrBusiness();
  ?>
  <div>
    <label for="nom"></label>
    <input type="text" name="nom" id="nom" required>
  </div>

  <div>
    <label for="prenom"></label>
    <input type="text" name="prenom" id="prenom" required>
  </div>

  <div>
    <label for="Email"></label>
    <input type="text" name="Email" id="Email" required>
  </div>

  <div>
    <label for="password"></label>
    <input type="password" name="mdp" id="password" required>
  </div>

  <div>
    <label for="verify_password"></label>
    <input type="password" name="verify_password" id="verify_password" placeholder="verify password" required>
  </div>

  <div>
    <label for="image"></label>
    <input type="file" name="photo" id="photo" required>
  </div>

  <div>
    <button type="submit">Enregistrer</button>
  </div>
</form>

</body>

</html>