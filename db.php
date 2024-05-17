<?php

// Définition des constantes de connexion à la base de données
define ('APP_DB_USER' ,'root');
define ('APP_DB_PASSWORD' ,'dwwm_2024');
define ('APP_DB_HOST' ,'localhost');
define ('APP_DB_PORT' ,'3308');
define ('APP_DB_NAME' ,'chat_app');

try {
    // Connexion à la base de données
    $dsn = "mysql:host=" . APP_DB_HOST . ";port=" . APP_DB_PORT . ";dbname=" . APP_DB_NAME;
    $pdo = new PDO($dsn, APP_DB_USER, APP_DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("La connexion à la base de données a échoué: " . $e->getMessage());
}

// Requête pour récupérer tous les messages depuis la base de données
$sql = "SELECT * FROM messages";
$stmt = $pdo->query($sql);


