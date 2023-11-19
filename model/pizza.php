<?php 

class Pizza {
  public $id;
  public $nom;
  public $options;
  public $prix;
  public $description;
  public $types;
  public $photos;

    
  public function __construct($id, $db)
  {
    $sql = "SELECT * FROM pizzas WHERE id =:id";
    $requet = $db->prepare($sql);
    $requet->bindParam('id', $id, PDO::PARAM_INT);
    $requet->execute();

    $usr = $requet->fetch();
    $this->id = $usr["id"];
    $this->nom = $usr["nom"];
    $this->options = $usr["options"];
    $this->prix = $usr["prix"];
    $this->description = $usr["description"];
    $this->types = $usr["types"];
    $this->photos = $usr["photos"];

  }

  public function __set($name, $value) {
    $this->$name = $value;
  }
}

?>


<?php 

class PizzaFuture {

  private $data = [];
    
  public function __construct($id, $db)
  {
    $sql = "SELECT * FROM pizzas WHERE id =:id";
    $requet = $db->prepare($sql);
    $requet->bindParam('id', $id, PDO::PARAM_INT);
    $requet->execute();

    $usr = $requet->fetch();
    foreach ($usr as $key => $value) {
      $this->$key = $value;
    }
    
  }

  public function __set($name, $value) {
    $this->data[$name] = $value;
  }

  public function __get($name) {
      return $this->data[$name];
  }
}

?>