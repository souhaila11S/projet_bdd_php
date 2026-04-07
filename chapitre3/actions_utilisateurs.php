<?php
require 'connexion.php';

// Ajouter utilisateur
if(isset($_POST['add'])){
    $nom = $_POST['nom'];
    $email = $_POST['email'];

    $stmt = $pdo->prepare("INSERT INTO Utilisateur (nom, email) VALUES (:nom, :email)");
    $stmt->execute([
        'nom'=>$nom,
        'email'=>$email
    ]);

    header("Location: actions_utilisateurs.php");
    exit;
}

// Modifier utilisateur
if(isset($_POST['update'])){
    $id = (int)$_POST['id'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];

    $stmt = $pdo->prepare("UPDATE Utilisateur SET nom=:nom, email=:email WHERE id=:id");
    $stmt->execute([
        'id'=>$id,
        'nom'=>$nom,
        'email'=>$email
    ]);

    header("Location: actions_utilisateurs.php");
    exit;
}

// Supprimer utilisateur
if(isset($_GET['delete'])){
    $id = (int)$_GET['delete'];

    $stmt = $pdo->prepare("DELETE FROM Utilisateur WHERE id=:id");
    $stmt->execute(['id'=>$id]);

    header("Location: actions_utilisateurs.php");
    exit;
}

// Afficher utilisateurs
$stmt = $pdo->query("SELECT * FROM Utilisateur");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD Utilisateur</title>
</head>
<body>

<h2>Ajouter Utilisateur</h2>
<form method="POST">
    Nom: <input type="text" name="nom" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    <button type="submit" name="add">Ajouter</button>
</form>

<hr>

<h2>Liste des utilisateurs</h2>
<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Nom</th>
    <th>Email</th>
    <th>Actions</th>
</tr>

<?php foreach($users as $user): ?>
<tr>
    <td><?= $user['id'] ?></td>
    <td><?= $user['nom'] ?></td>
    <td><?= $user['email'] ?></td>
    <td>
        <a href="?delete=<?= $user['id'] ?>" onclick="return confirm('Supprimer ?')">Supprimer</a>
    </td>
</tr>
<?php endforeach; ?>

</table>

<hr>

<h2>Modifier Utilisateur</h2>
<form method="POST">
    ID: <input type="number" name="id" required><br><br>
    Nom: <input type="text" name="nom" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    <button type="submit" name="update">Modifier</button>
</form>

</body>
</html>