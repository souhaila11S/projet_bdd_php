<?php
require 'connexion.php'; 

try {
    $sql = "SELECT * FROM Utilisateur"; 
    $stmt = $pdo->query($sql);

    $utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC); 

    
    echo "<h2>Liste des utilisateurs</h2>";
    echo "<table border='1'>
    <tr><th>ID</th><th>Nom</th><th>Email</th></tr>";
    foreach ($utilisateurs as $user) {
        echo "<tr>
        <td>{$user['id']}</td>
        <td>{$user['nom']}</td>
        <td>{$user['email']}</td>
        </tr>";
    }
    echo "</table>";

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>