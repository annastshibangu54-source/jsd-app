<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Configuration de la base de données PostgreSQL sur Render
$host     = 'dpg-dao5418473hc73bfmfng-a.oregon-postgres.render.com';
$port     = '5432';
$dbname   = 'jsd_db';
$username = 'jsd_user';
$password = 'fEPwCcF3c3XE6WYc8n0dXoBOQLXWUlfj';

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e.getMessage());
}
?>

