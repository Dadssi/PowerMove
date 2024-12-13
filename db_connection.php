<?php
$host = 'localhost';
$dbname = 'powermove';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connexion reussi";
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>