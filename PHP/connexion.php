<?php
  require_once("../class/connecting.php");
  require_once("../_partials/menu.php");
  require_once("../_partials/header.php");
?>
<form id="formu" action="../PHP/connexion.php" class="connexion" method="post">
  <?php 
    $iConnect = new connect();
    $iConnect->findlogs();
  ?>
  <div id="">
    <label for="email"></label>
    <input type="text" name="Email" id="email" required>
  </div>
  <div>
    <label for="verify_password"></label>
    <input type="password" name="mdp" required>
  </div>
  <div>
    <button type="submit">soummetre</button>
  </div>
</form>
</body>

</html>