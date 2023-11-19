<?php 
require_once("../_partials/menu.php");
require_once("../_partials/header.php");
require_once("../class/add_new_pizza.php");
?>

<body>
  <div class="form-container">
    <form class="ajouterpizzas" method="POST" action="page_new_pizza.php" enctype="multipart/form-data">
      <?php 
        $addNewOfPizza = new addNewPizza();
        $addNewOfPizza->add_new_Pizza();
      ?>
      <div>
        <label for="nom">nom</label>
        <input type="text" name="nom" id="nom" required>
      </div>
      <div>
        <label for="options">options</label>
        <input type="text" name="options" id="options" required>
      </div>
      <div>
        <label for="prix">prix</label>
        <input type="text" name="prix" id="prix" required>
      </div>
      <div>
        <label for="description">description</label>
        <input type="text" name="description" id="description" required>
      </div>
      <div>
        <label for="photos">photos</label>
        <input type="file" name="photos" id="photos" required>
      </div>
      <div>
        <button class="submit" type="submit">soummetre</button>
      </div>
    </form>
  </div>
</body>

</html>