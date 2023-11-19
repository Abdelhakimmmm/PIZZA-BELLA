<?php
require_once("./class/connecting.php");
class Controller {
    private $model;

    public function __construct() {
        $this->model = new connect();
    }

    public function handleLogin() {
        // Logique de gestion du formulaire de connexion
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['Email']) && isset($_POST['mdp'])) {
                // Logique de vérification des champs, traitement de la connexion, etc.
                $this->model->findlogs();
            }
        }
    }
}

// Instanciation du contrôleur
$controller = new Controller();
// Appel de la méthode pour gérer la connexion
$controller->handleLogin();
?>