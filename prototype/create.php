<?php
require_once "Article.php";

$db = (new Database())->getConnection();
$article = new Article($db);

if($_SERVER["REQUEST_METHOD"] == "POST"){

 
    $article->titre = $_POST["titre"];
    $article->contenu = $_POST["contenu"];

   
    $article->create();
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajouter article</title>
</head>
<body>

<h1>Ajouter un article</h1>

<form method="POST">

    <label>Titre:</label><br>
    <input type="text" name="titre"><br><br>

    <label>Contenu:</label><br>
    <textarea name="contenu"></textarea><br><br>

    <button type="submit">Ajouter</button>

</form>

</body>
</html>