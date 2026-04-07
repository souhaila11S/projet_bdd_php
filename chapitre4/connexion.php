<?php
$host = '127.0.0.1';
$port = 3307; // أو 3306 حسب XAMPP
$dbname = 'test';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie<br>";
} catch (PDOException $e) {
    // سجل الخطأ فـ fichier
    file_put_contents('erreurs.log', $e->getMessage() . PHP_EOL, FILE_APPEND);
    echo "Erreur de connexion. Contactez l'administrateur.";
    exit;
}
?>