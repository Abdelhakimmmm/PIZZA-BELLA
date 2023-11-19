<!-- Cette approche permet de séparer les responsabilités et de rendre le code plus modulaire et plus facile à maintenir. -->
<?php
require_once("./class/add_users.php");
class ControllerAddUser {
private $model;
public function __construct() {
$this->model = new addUser();
}
public function addingUser() {
  // Logique de gestion du formulaire d'ajout d'utilisateur
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Vérification des champs, traitement de l'ajout d'utilisateur, etc.
      if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['Email']) && isset($_POST['mdp']) && isset($_POST['verify_password'])) {
          // Votre logique d'ajout d'utilisateur
          $this->model->addUsrBusiness();
      }
  }
}
}
// Instanciation du contrôleur
$controller = new ControllerAddUser();
// Appel de la méthode pour gérer la connexion
$controller->addingUser();
?>