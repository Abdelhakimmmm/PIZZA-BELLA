<?php 
class articles { 
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
  public function findAllPizzas() {
    $sql = "SELECT * FROM pizzas";
    $query = $this->_connexion->prepare($sql);
    $query->execute();
    return $query->fetchAll();
  }
}
//creer dautre fonction pour loger et les relier a connexxion.php