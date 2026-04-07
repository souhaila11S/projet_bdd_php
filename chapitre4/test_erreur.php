<?php
require 'connexion.php';


try {
    $stmt = $pdo->query("SELECT * FROM table_inexistante");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "Nombre de lignes : " . count($rows);
} catch (PDOException $e) {
    
    file_put_contents('erreurs.log', $e->getMessage() . PHP_EOL, FILE_APPEND);
    echo "Une erreur SQL est survenue. Vérifiez le log.";
}
?>