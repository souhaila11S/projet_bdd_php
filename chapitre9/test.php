<?php
require 'ArticleEncapsule.php';

$article = new Article();

$article->setTitre("POO en PHP");
$article->setContenu("<p>Introduction à la POO</p>");

echo $article->afficher();

?>
