
<?php
// Active l'affichage des erreurs dans le navigateur
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//connexion à la base de donnée
require_once('db_connect.php');

// Configuration de l'attribut SameSite pour les cookies de session
session_set_cookie_params([
    // Ou 'Lax' ou 'Strict' selon vos besoins
    'samesite' => 'None',
    // Utilisez 'secure' uniquement si vous utilisez HTTPS
    'secure' => true,
    'httponly' => true,
]);
//j'active la session
// session_start();

$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$email = $_POST["email"];
$passwowrd = $_POST["password"];

if (!empty($_POST)) {
    //Je vérifie que tous les champs du form sont remplis
    if (
        isset($nom, $prenom, $email, $passwowrd)
        && !empty($email) && !empty($passwowrd) && !empty($nom) && !empty($prenom)
    ) {
        //Je récupère les données et les protège
        //Je nettoie les données entrées par l'utilisateur, je supprime toutes les balises html
        $nom = strip_tags($nom);
        $prenom = strip_tags($prenom);

        // Je vérifie que le format email est valide
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die("Le format pour l'email est incorrect");
        }

        $password_hash = password_hash($passwowrd, PASSWORD_DEFAULT);

            // elements à afficher
    $datas = $_POST;

    // Ajout de la date (heure d'envoi) aux données
    $datas['timestamp'] = date('Y-m-d H:i:s');

    // Je stocke le chemin du fichier vers lequel les données récupérés vont être affiché dans une variables
    $cheminTarget = "data_user.txt";

    // La fonction fopen() = file open > permet d'ouvrir un fichier
    // les paramètres de cette fonction sont (nom du fichier à ouvrir, mode d'ouverture du dit fichier)"a"=append
    $fp = fopen($cheminTarget, "a");

    // Parcours des données et écriture dans le fichier txt
    // foreach ($REQUEST as $data=>$valeur){
    foreach ($datas as $champ => $valeur) {
        fwrite($fp, $champ . ":" . $valeur . "\n");
        // fputs($fp, $datas . ":" . $valeur . "\n");
    }

    fclose($fp);
    // var_dump($_POST);
    // Redirige l'utilisateur vers une page de confirmation après la soumission réussie
    header("Location: connexion.php");
    exit(); //  terminer le script ici pour éviter toute exécution supplémentaire

    } else {
        die("Le formulaire est imcomplet");
    }



}
?>
