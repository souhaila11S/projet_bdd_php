<?php
require 'connexion.php';

if(isset($_POST['ok'])) {
    $nom = htmlspecialchars(trim($_POST['nom']));
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

    if(!$email){
        die("Email invalide !");
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO Utilisateur (nom, email) VALUES (:nom, :email)");
        $stmt->execute([
            'nom' => $nom,
            'email' => $email
        ]);
        header("Location: index.php"); 
        exit;
    } catch(PDOException $e){
        file_put_contents('logs/errors.log', $e->getMessage(), FILE_APPEND);
        echo "Une erreur est survenue. Contactez l’administrateur.";
    }
}
?>