<?php
require 'connexion.php';

$resultat = "";

if(isset($_POST['ok'])){
    $nom = htmlspecialchars(trim($_POST['nom']));
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

    if(!$email){
        $resultat = "Email invalide !";
    } else {
       
        $stmt = $pdo->prepare("INSERT INTO Utilisateur (nom, email) VALUES (:nom, :email)");
        $stmt->execute([
            'nom' => $nom,
            'email' => $email
        ]);
        $resultat = "Utilisateur ajouté avec succès.";
    }
}


$stmt = $pdo->prepare("SELECT * FROM Utilisateur");
$stmt->execute();
$liste = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion Utilisateurs</title>
</head>
<body>
<h1>Formulaire Utilisateur</h1>

<?php if($resultat) echo "<p>$resultat</p>"; ?>

<form action="" method="post">
    Nom: <input type="text" name="nom" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    <button type="submit" name="ok">Ajouter</button>
</form>

<h2>Liste des utilisateurs</h2>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Email</th>
    </tr>
    <?php foreach($liste as $u): ?>
    <tr>
        <td><?= $u['id'] ?></td>
        <td><?= $u['nom'] ?></td>
        <td><?= $u['email'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>
</body>
</html>