<?php
// Inclure le fichier de connexion à la base de données
include 'db.php';

// Fonction pour créer un nouveau message
function createMessage($content, $sender) {
    global $pdo; // Récupérer la connexion à la base de données

    try {
        // Préparer la requête SQL pour l'insertion d'un nouveau message
        $stmt = $pdo->prepare("INSERT INTO messages (content, sender) VALUES (:content, :sender)");

        // Exécuter la requête en passant les valeurs en tant que tableau associatif
        $stmt->execute(array(':content' => $content, ':sender' => $sender));
        
        // Renvoyer l'ID du nouveau message inséré
        return $pdo->lastInsertId();
    } catch(PDOException $e) {
        // En cas d'erreur, afficher l'erreur
        echo "Erreur lors de la création du message : " . $e->getMessage();
        return false; // Renvoyer false en cas d'échec
    }
}

// Fonction pour récupérer tous les messages
function getMessages() {
    global $pdo; // Récupérer la connexion à la base de données

    try {
        // Préparer la requête SQL pour récupérer tous les messages
        $stmt = $pdo->query("SELECT * FROM messages");

        // Renvoyer les résultats sous forme de tableau associatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        // En cas d'erreur, afficher l'erreur
        echo "Erreur lors de la récupération des messages : " . $e->getMessage();
        return false; 
    }
}

// Fonction pour supprimer un message
function deleteMessage($messageId) {
    global $pdo; // Récupérer la connexion à la base de données

    try {
        // Préparer la requête SQL pour supprimer un message en fonction de son ID
        $stmt = $pdo->prepare("DELETE FROM messages WHERE id = :id");
        
        // Exécuter la requête en passant l'ID du message comme paramètre
        $stmt->execute(array(':id' => $messageId));
        
        return true; // Renvoyer true si la suppression réussit
    } catch(PDOException $e) {
        // En cas d'erreur, afficher l'erreur
        echo "Erreur lors de la suppression du message : " . $e->getMessage();
        return false; // Renvoyer false en cas d'échec
    }
}
?>
