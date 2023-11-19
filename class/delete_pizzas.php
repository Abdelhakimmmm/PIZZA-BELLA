<?php 
class delPizza { 
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
  public function delete_pizza() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id = $_POST["id"];
      $query = "DELETE FROM pizzas WHERE id = :id";
      // Préparation de la requête
      $req = $this->_connexion->prepare($query);
      // Liaison du paramètre ID
      $req->bindParam("id", $id);
      $req->execute();
      // Exécution de la requête
      if($req->rowCount()){
          echo "L'utilisateur avec l'ID $id a été supprimé avec succès.";
          http_response_code(200);
      }
      else
      {
          echo "Erreur de suppression";
          http_response_code(404);
      }    exit();
  }
  }
}