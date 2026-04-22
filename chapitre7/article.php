<?php

class Article {
    public $titre;
    public $contenu;

    public function afficher() {
        return "Titre : " . $this->titre . 
               " - Contenu : " . $this->contenu;
    }
}

// objet 1
$article1 = new Article();
$article1->titre = "Introduction à PHP";
$article1->contenu = "PHP est un langage côté serveur.";

echo $article1->afficher();

echo "<br><br>";

// objet 2
$article2 = new Article();
$article2->titre = "POO en PHP";
$article2->contenu = "La POO facilite la programmation.";

echo $article2->afficher();

?>