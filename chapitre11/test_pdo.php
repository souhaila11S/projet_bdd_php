<?php
require 'Database.php';

// Connexion
$db = (new Database())->getConnection();

// --- Ajouter un article ---
$sqlAdd = "INSERT INTO articles (titre, contenu, auteur) VALUES (:titre, :contenu, :auteur)";
$stmtAdd = $db->prepare($sqlAdd);
$stmtAdd->execute([
    'titre' => 'Nouveau post',
    'contenu' => 'Ceci est un article ajouté via PDO.',
    'auteur' => 'Admin'
]);
$messageAdd = "Article ajouté avec succès.";

// --- Mettre à jour un article ---
$sqlUpdate = "UPDATE articles SET auteur = :auteur WHERE id = :id";
$stmtUpdate = $db->prepare($sqlUpdate);
$stmtUpdate->execute(['auteur' => 'Alice', 'id' => 1]);
$messageUpdate = "Article mis à jour.";

// --- Supprimer un article ---
$sqlDelete = "DELETE FROM articles WHERE id = :id";
$stmtDelete = $db->prepare($sqlDelete);
$stmtDelete->execute(['id' => 2]);
$messageDelete = "Article supprimé.";

// --- Lire tous les articles ---
$stmtRead = $db->query("SELECT * FROM articles");
$articles = $stmtRead->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des articles</title>
    <style>
        table { border-collapse: collapse; width: 80%; margin: 20px auto; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .message { text-align: center; margin: 10px; font-weight: bold; color: green; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Liste des articles</h2>

    <div class="message">
        <?php
        echo $messageAdd . "<br>";
        echo $messageUpdate . "<br>";
        echo $messageDelete;
        ?>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Contenu</th>
            <th>Auteur</th>
        </tr>
        <?php foreach ($articles as $article): ?>
            <tr>
                <td><?= $article['id'] ?></td>
                <td><?= $article['titre'] ?></td>
                <td><?= $article['contenu'] ?></td>
                <td><?= $article['auteur'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>