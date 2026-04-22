<?php
require_once 'connexion.php';

class Article {

    private $conn;
    public $id;
    public $titre;
    public $contenu;

    public function __construct($db){
        $this->conn = $db;
    }

    // 🔹 Lire tous les articles
    public function readAll(){

        $sql = "SELECT * FROM articles";

        $stmt = $this->conn->query($sql);

        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $articles;
    }

    // 🔹 Lire article par id
    public function readById($id){

        $sql = "SELECT * FROM articles WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            'id' => $id
        ]);

        $article = $stmt->fetch(PDO::FETCH_ASSOC);

        return $article;
    }

    // 🔹 Créer article
    public function create(){

        // validation
        if(empty($this->titre) || empty($this->contenu)){
            return false;
        }

        $sql = "INSERT INTO articles (titre, contenu)
                VALUES (:titre, :contenu)";

        $stmt = $this->conn->prepare($sql);

        $result = $stmt->execute([
            'titre' => $this->titre,
            'contenu' => $this->contenu
        ]);

        return $result;
    }
}
?>
