<?php

session_start();

require_once ('login_protect.php');
// Vérifier si l'utilisateur est connecté
if(isset($_SESSION["email"])) {
    $email = $_SESSION["email"];
    echo "Bienvenue," . $email . "!"; 
} 
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Page de connexion Protégée</title>
</head>

<body>
<!-- // Affiche le nom de l'utilisateur -->
    <h1>Bienvenue <?=$email?> !</h1>
    <!-- Ajoutez ici le contenu que vous souhaitez afficher aux utilisateurs authentifiés -->
</body>

</html>


<!-- echo "Bienvenue " . $userMail . "!"; -->
