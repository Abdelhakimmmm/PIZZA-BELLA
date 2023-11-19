<?php 
require_once("../class/delete_pizzas.php");
require_once("../_partials/menu.php");
require_once("../_partials/header.php");
?>
<form id="formu" class="iii" action="page_delete_pizza.php" method="post">
  <?php 
    $delOfPizza = new delPizza();
    $delOfPizza->delete_pizza();
  ?>
  <label for="id">ID de la pizza à supprimer :</label>
  <input type="number" name="id" id="id" required>
  <button type="submit">Supprimer</button>
</form>

</body>

</html>