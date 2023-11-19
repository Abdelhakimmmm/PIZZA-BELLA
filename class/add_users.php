<?php 
class addUser { 
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
  public function addUsrBusiness() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Récupérer les données du formulaire
      $data = $_POST;
      //require_once('include/modifier_pizza.php');
      try {
        //verifier mot de pass
    
        if (isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["Email"] ) && isset($_POST["mdp"]) && isset($_POST["verify_password"])) {
          // Expression régulière pour vérifier la longueur du mot de passe (au moins 8 caractères)
          $regexLongueur = '/^.{3,45}$/';    
          $regexEmail = '/^.{3,200}$/';    
          $regexPass = '/^(?=.*[a-zA-Z])(?=.*[!@#$%^&*])/';
          //CONTROL DE REGEX !:
          // Vérification de la longueur du nom
          if (!preg_match($regexLongueur, $_POST["nom"])) {
            echo "Le nom doit contenir au moins 8 caractères.<br>";
            exit();
          }
          // Vérification de la longueur du prenom
          if (!preg_match($regexLongueur, $_POST["prenom"])) {
            echo "Le prenomnom doit contenir au moins 8 caractères.<br>";
            exit();
          }
          // Vérification de la longueur du email
          if (!preg_match($regexEmail, $_POST["Email"])) {
            echo "Le email doit contenir au moins 8 caractères.<br>";
            exit();
          }  
          // Vérification de la longueur du pass
          if (!preg_match($regexPass, $_POST["mdp"])) {
            echo "Le pass doit contenir au moins 8 caractères.<br>";
            exit();
          }
          // Vérification de la longueur du pass
          if (!preg_match($regexLongueur, $_POST["verify_password"])) {
            echo "Le verfy doit contenir au moins 8 caractères.<br>";
            exit();
          }
          // Vérification de caractere du pass
          if (!preg_match($regexPass, $_POST["mdp"])) {
            echo "Le pass doit contenir les caractères indiqués.<br>";
            exit();
          }
          // Vérification de caractere du pass
          if (!preg_match($regexPass, $_POST["verify_password"])) {
            echo "Le nom doit contenir les caractères indiqués.<br>";
            exit();
          }
                // Vérification de l'egalié'
                if ($_POST["mdp"] !== $_POST["verify_password"]) {
                  echo "Vous devez reecrire le mot de psse .<br>";
                  exit();
                }
          //filter_var est utilisée pour vérifier si l'email est valide en utilisant le filtre FILTER_VALIDATE_EMAIL. Cette fonction a une validation intégrée spécifique aux adresses email et vérifie si la valeur passée correspond au format attendu d'une adresse email
          // Vérification de l'email
          if (!filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL)) {
            echo ("Entrer un email correct");
            exit();
          }
          
        } 
        else {
        
          echo " C'est une erreur";
          // header("Location: index.php?msg=C'est une erreur");
        }
    
        //la fonction password_hash sert a hacher le motdepass 
        //lalgorythme passworld_defauld est utilisé par défaut est le plus approprié et sécurisé disponible sur votre version de PHP
        $data['mdp'] = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
    
        //grace au insert into quon recupere la valeur entré par lutilisateur dans la BD
        // Préparer la requête d'insertion
        $query = "INSERT INTO users (";
        $query .= implode(", ", array_keys($data)); // Obtenir la liste des colonnes
        //implode : prendre un tab separe le par ";" et faire en chaine de carac
        //array key : retourne une chaine avec key
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
        // Rediriger vers une page de succès ou afficher un message de succès
        header("Location: ../index.php");
        exit();
      } 
      catch (PDOException $e) {
        // Gérer les erreurs de la base de données
        echo ("Erreur de la base de données : " . $e->getMessage());
        echo "Erreur de la base de données : " . $e->getMessage();
      }
      catch (Exception $e) {
        // Gérer les erreurs de la base de données
        echo ("Erreur de la base de données : " . $e->getMessage());
        echo "Erreur de la base de données : " . $e->getMessage();
      }
    }
  }
}
//creer dautre fonction pour loger et les relier a connexxion.php