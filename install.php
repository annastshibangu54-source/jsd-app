<?php
// Inclusion du fichier de connexion à la base de données PostgreSQL de Render
require_once 'config.php';

try {
    // 1. Création de la table 'membres'
    $sqlMembres = "CREATE TABLE IF NOT EXISTS membres (
        id SERIAL PRIMARY KEY,
        matricule VARCHAR(50) UNIQUE,
        nom VARCHAR(100) NOT NULL,
        prenom VARCHAR(100) NOT NULL,
        email VARCHAR(150) UNIQUE NOT NULL,
        telephone VARCHAR(30),
        pin_code VARCHAR(255) NOT NULL,
        statut VARCHAR(50) DEFAULT 'Membre',
        date_inscription TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );";

    // 2. Création de la table 'messages'
    $sqlMessages = "CREATE TABLE IF NOT EXISTS messages (
        id SERIAL PRIMARY KEY,
        expediteur_id INT NOT NULL,
        destinataire_id INT NOT NULL,
        contenu TEXT NOT NULL,
        date_envoi TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (expediteur_id) REFERENCES membres(id) ON DELETE CASCADE,
        FOREIGN KEY (destinataire_id) REFERENCES membres(id) ON DELETE CASCADE
    );";

    // Exécution des requêtes SQL
    $pdo->exec($sqlMembres);
    echo "✅ Table 'membres' créée avec succès.<br>";

    $pdo->exec($sqlMessages);
    echo "✅ Table 'messages' créée avec succès.<br>";

    echo "<br><strong>🎉 Succès ! La base de données PostgreSQL sur Render est parfaitement configurée.</strong>";

} catch (PDOException $e) {
    echo "❌ Erreur lors de la création des tables : " . $e->getMessage();
}
?>

