<?php
$host = '127.0.0.1';
$port = 3307;        // port ديال MySQL عندك
$dbname = 'test';    // الاسم ديال database
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connexion réussie à la base $dbname"; // ممكن تحيدها بعد ما تأكد
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    exit;
}
?>