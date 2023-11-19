<?php 
class addNewPizza { 
  private $serv_db = "localhost";
  private $user_db = "sulo";
  private $name_db = "bella";
  private $pw_db = "666";
  protected $_connexion;
  public function __construct() {
    /* Je me connecte a la base de donnée*/
    $this->_connexion = null;
    
    /*j'essaye de me connecter a la base de donnée**/
    $dsn = "mysql:host=". $this->serv_db .";dbname=". $this->name_db .";charset=utf8";
    try{
      $this->_connexion = new PDO($dsn, $this->user_db, $this->pw_db);
    } catch(PDOException $e){
      echo "erreur de connexion" . $e->getMessage();
    }
  }
  public function add_new_Pizza() {
    require_once("../PHP/img_param.php");
     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      if (isset($_POST["nom"]) && isset($_POST["options"]) && isset($_POST["prix"] ) && isset($_POST["description"]) && isset($_POST["photos"])) {
     // Expression régulière pour vérifier la longueur du mot de passe (au moins 8 caractères)
          $regexLongueur = '/^.{3,45}$/';    
          // Vérification de la longueur du nom
          if (!preg_match($regexLongueur, $_POST["nom"])) {
            echo "Le nom doit contenir au moins 8 caractères.<br>";
            exit();
          }
          if (!preg_match($regexLongueur, $_POST["options"])) {
            echo "Le options doit contenir au moins 8 caractères.<br>";
            exit();
          }
          if (!preg_match($regexLongueur, $_POST["prix"])) {
            echo "Le prix doit contenir au moins 8 caractères.<br>";
            exit();
          }
          if (!preg_match($regexLongueur, $_POST["description"])) {
            echo "La description doit contenir au moins 8 caractères.<br>";
            exit();
          }
          }
          $data = $_POST;
          $data["photos"] = strtolower($img_save_name);
          $query = "INSERT INTO pizzas (";
          $query .= implode(", ", array_keys($data)); // Obtenir la liste des colonnes
          $query .= ") VALUES (";
          $query .= ":" . implode(", :", array_keys($data)); // Obtenir la liste des paramètres
          $query .= ")";
          $statement = $this->_connexion->prepare($query);
          // Lier les paramètres
          foreach ($data as $key => $value) {
            $statement->bindValue(':' . $key, $value);
          }
          // Exécuter la requête  
          $statement->execute();
          header("Location: ../index.php");
          exit();
        }
  }
}