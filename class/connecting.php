<?php 
class connect { 
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
  public function findlogs() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      if (isset($_POST['Email'])  && isset($_POST['mdp'])) {
        // Vérification de l'email
        if (!filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)) {
              echo ("Entrer un email correct");
              exit();
          }
          $sql = "SELECT * FROM users WHERE Email = :Email";
                $req = $this->_connexion->prepare($sql);
                $req->bindParam(":Email", $_POST['Email']); // Utilisez le même nom que dans la requête SQL
                $req->execute();             
                $usr = $req->fetch();
                // SI USR DANS LE IF EST FALASE IL YA UNE ERREUR
                //password_verify PERMET DE VERIFIER LE HACHAGE IL VERIFIE LEMPRINTE DU MOT DE PASS HACHé
                if($usr && password_verify($_POST['mdp'], $usr['mdp']) )
                {
                    session_start();
                    $_SESSION['user'] = $usr;
                    header("Location: ../index.php");
                    // Définir un cookie avec l'ID de l'utilisateur
                    setcookie('userID', $usr['id'], time() + (24 * 60 * 60));
                    exit();
                }
                else
                {
                    echo "Email ou/et mdp incorrecte";
                }
                }  
        }
  }
}
//creer dautre fonction pour loger et les relier a connexxion.php