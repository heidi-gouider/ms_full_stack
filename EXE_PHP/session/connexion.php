<?php
session_start();

// Vérifier si l'utilisateur est connecté
if(isset($_SESSION["mail"])) {
    $userMail = $_SESSION["mail"];
    echo "Bienvenue, $userMail !"; // Affiche le nom de l'utilisateur
} 
?>


<!-- echo "Bienvenue " . $userMail . "!"; -->
