<?php
require 'Database.php';
require 'User.php';


$database = new Database();
$db = $database->getConnection();

if(!$db){
    die("Connexion échouée");
}


$user = new User($db);


$user->nom = "Alice";
$user->email = "alice@test.com";
$user->create();


$liste = $user->read();

foreach ($liste as $u) {
    echo $u['id'] . " - " . $u['nom'] . " - " . $u['email'] . "<br>";
}
?>
