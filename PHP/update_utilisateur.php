<?php

require_once("../PHP/connexion-Data-Base.php");

// Vérifier si le formulaire a été soumis
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Récupérer les données du formulaire
//     $data = $_POST;
//     try {
//         // Vérifier que les champs requis sont définis
//         if (isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["Email"]) && isset($_POST["mdp"])) {
//             // Vérifier que l'identifiant de l'utilisateur à modifier est défini
//             if (isset($_POST["id"])) {
//                 // La requête de mise à jour (UPDATE) pour modifier l'utilisateur
//                 $query = "UPDATE users SET nom = :nom, prenom = :prenom, Email = :Email, mdp = :mdp WHERE id = :id";
//                 $statement = $db->prepare($query);
//                 // Lier les paramètres
//                 foreach ($data as $key => $value) {
//                     $statement->bindValue(':' . $key, $value);
//                 }
//                 // Exécuter la requête
//                 $statement->execute();
//                 // Rediriger vers une page de succès ou afficher un message de succès
//                 header("Location: ../index.php");
//                 exit();
//             } else {
//                 echo "L'identifiant de l'utilisateur à modifier n'est pas défini.";
//                 exit();
//             }
//         } else {
//             echo "C'est une erreur";
//             header("Location: index.php?msg=C'est une erreur");
//         }
//     } catch (PDOException $e) {
//         // Gérer les erreurs de la base de données
//         echo "Erreur de la base de données : " . $e->getMessage();
//     } catch (Exception $e) {
//         // Gérer les erreurs générales
//         echo "Erreur : " . $e->getMessage();
//     }
// }