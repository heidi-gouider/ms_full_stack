<?php
// J'ajoute la vérification de la variable de session 'auth' pour déterminer si le user est authentifié

//j'initialise la session
session_start();

// Je vérifie si la variable de session auth n'est pas définie ou si elle n'a pas la valeur "ok"
if (!isset($_SESSION['auth']) || $_SESSION['auth'] !== 'ok') {
    // L'utilisateur n'est pas authentifié, je le redirige vers la page de connexion
    header('Location: login_form.php');
    exit();
}
//attention !!!!  dans la page connexion.php je require once la page login_protect.php ce qui a pour conscéquence de créer
//une boucle de redirection si je décommente les lignes au-dessous!!!!
// header('Location: connexion.php');
// exit();

// L'utilisateur est authentifié
?>

