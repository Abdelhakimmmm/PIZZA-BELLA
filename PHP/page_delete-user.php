<?php 
require_once("../class/delete_users.php");
require_once("../_partials/menu.php");
require_once("../_partials/header.php");
?>
<form id="formu" class="iii" action="page_delete-user.php" method="POST">
  <?php 
    $deleteOfUser = new deleteUs();
    $deleteOfUser->delete_user();
  ?>
  <label for="user  ">ID de l'utilisateur à supprimer :</label>
  <input type="number" name="id" id="id" required>
  <button type="submit">Supprimer</button>
</form>
</body>

</html>