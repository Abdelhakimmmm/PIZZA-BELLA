<?php 
class updtUsr { 
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
  public function update_user() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Récupérer les données du formulaire
      $data = $_POST;
      try {
          // Vérifier que les champs requis sont définis
          if (isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["Email"]) && isset($_POST["mdp"])) {
              // Vérifier que l'identifiant de l'utilisateur à modifier est défini
              if (isset($_POST["id"])) {
                  // La requête de mise à jour (UPDATE) pour modifier l'utilisateur
                  $query = "UPDATE users SET nom = :nom, prenom = :prenom, Email = :Email, mdp = :mdp WHERE id = :id";
                  $statement = $this->_connexion->prepare($query);
                  // Lier les paramètres
                  foreach ($data as $key => $value) {
                      $statement->bindValue(':' . $key, $value);
                  }
                  // Exécuter la requête
                  $statement->execute();
                  // Rediriger vers une page de succès ou afficher un message de succès
                  header("Location: ../index.php");
                  exit();
              } else {
                  echo "L'identifiant de l'utilisateur à modifier n'est pas défini.";
                  exit();
              }
          } else {
              echo "C'est une erreur";
              header("Location: index.php?msg=C'est une erreur");
          }
      } catch (PDOException $e) {
          // Gérer les erreurs de la base de données
          echo "Erreur de la base de données : " . $e->getMessage();
      } catch (Exception $e) {
          // Gérer les erreurs générales
          echo "Erreur : " . $e->getMessage();
      }
  }
  }
}
//creer dautre fonction pour loger et les relier a connexxion.php