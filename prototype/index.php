<?php
require_once "Article.php";
$db = (new Database())->getConnection();
$article = new Article($db);

$articles = $article->readAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des articles</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <h1>Liste des articles</h1>
    <?php foreach($articles as $item): ?>
        <div class="article-card">
            <h2><?= htmlspecialchars($item['titre']) ?></h2>
            <p><?= htmlspecialchars($item['contenu']) ?></p>
            <small>Auteur: <?= htmlspecialchars($item['auteur'] ?: "Inconnu") ?></small>
        </div>
    <?php endforeach; ?>
</body>
</html>