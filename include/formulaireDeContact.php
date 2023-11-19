<?php
 // Vérifie si la requête HTTP est de type POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Vérifie si les champs nom, Email, sujet et text sont présents dans la requête POST
    if (isset($_POST["nom"])  && isset($_POST["Email"] ) && isset($_POST["sujet"]) && isset($_POST["text"])) {
      // Vérification de l'email
      if (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'vos informations ne sont pas correcte';
      }
     /*j'envoie un mail en forme texte*/  // En-têtes du message
      $headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
      $headers .= 'Reply-To: '.$_POST["Email"]."\n"; // Mail de reponse
      $headers .= 'From: "Nom_de_expediteur"<'.$_POST["nom"].'>'."\n"; // Expediteur
      $headers .= 'Delivered-to: '.$_POST["Email"]."\n"; // Destinataire
      $message = $_POST["text"];
      if (mail($_POST["Email"], $_POST["sujet"], $message, $headers)) // Envoi du message
      {
          echo 'Votre message a bien été envoyé ';
      } else {
          echo "Votre message n'a pas pu être envoyé";
      }
      } 
      else {
        $_SESSION['error'] = 'vos informations ne sont pas correcte';
      }
}
 ?>