<?php
// Configuration de la base de données PostgreSQL Cloud (Render)
$host     = "dpg-d1234567890-a"; // Remplacez par votre Host Render interne/externe
$port     = "5432";
$dbname   = "jsd_db";           // Remplacez par le nom de votre DB Render
$user     = "jsd_user";         // Remplacez par votre User Render
$password = "votre_mot_de_passe"; // Remplacez par votre Password Render

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;";
    $pdo = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>

