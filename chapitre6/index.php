<?php
require 'connexion.php';

// جلب كل المستخدمين لعرضهم في جدول
$stmt = $pdo->query("SELECT * FROM Utilisateur");
$users = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un utilisateur</title>
</head>
<body>
    <h2>Formulaire Utilisateur</h2>
    <form action="ajout_utilisateur_secure.php" method="post">
        Nom: <input type="text" name="nom" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        <button type="submit" name="ok">Ajouter</button>
    </form>

    <h2>Liste des utilisateurs</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
        </tr>
        <?php foreach($users as $user): ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= htmlspecialchars($user['nom']) ?></td>
            <td><?= htmlspecialchars($user['email']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>