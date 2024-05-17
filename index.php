<?php include 'functions.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <div class="chat-container">
        <div class="chat-header">
            <h2>Chat Room</h2>
        </div>
        <div class="chat-messages" id="chat-messages">
            <!-- Les messages apparaîtront ici -->
            <?php
            // Appeler la fonction pour récupérer tous les messages
            $messages = getMessages();

            // Vérifier si des messages ont été récupérés
            if ($messages) {
                // Parcourir tous les messages et les afficher dans des balises HTML
                foreach ($messages as $message) {
                    echo '<div class="message">';
                    echo '<span>' . $message['message'] . '</span>'; // Utiliser $message['content'] au lieu de $message['message']
                    echo '<button class="delete-button" data-message-id="' . $message['id'] . '">Delete</button>';
                    echo '</div>';
                }
            } else {
                // Afficher un message si aucune donnée n'est disponible
                echo '<p>Aucun message disponible pour le moment.</p>';
            }
            ?>
        </div>
        <div class="chat-input">
            <!-- Le formulaire pour envoyer des messages doit se trouver ci-dessous -->
        </div>
    </div>
</body>
</html>
