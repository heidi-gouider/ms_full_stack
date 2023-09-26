<?php

// !!!! ATTENTION !!!! 
////  LES UPLOADS SONT FORTEMENT DECONSEILLES AUX UTILISATEURS NON INSCRITS ET DONC NON IDENTIFIES /////

// MEMO : 1 Mo = 1024*1024

//Je vérifie si le tableau d'erreurs est supérieur à 0(0= aucune erreur)
//et j'affiche ce que signifie l'erreur
$erreur = $_FILES["fichier"]["error"];
$err3 = "Le fichier téléchargé n'a été que partiellement téléchargé";
$err4 = " Aucun fichier n'a été téléchargé";

// Je récupère les informations du fichier téléchargé(elles vont me servir pour les vérifications)
$nomFichier = $_FILES["fichier"]["name"];
$tailleFichier = $_FILES["fichier"]["size"];
$erreurFichier = $_FILES["fichier"]["error"];
//les fichiers sont stockés dans un répertoire temporaire
$cheminTemporaire = $_FILES["fichier"]["tmp_name"];
$typeFichier = $_FILES["fichier"]["type"];

//je vérifie si le fichier a été envoyé
if(isset($_FILES["fichier"]) && $erreur === 0){
    //on a reçu un fichier
    //Je récupre les informations du formulaire
// var_dump(($_FILES));

 //je fais les vérifications pour sécurisé le téléchargement :
 // - l'extension, le type MIME, les dimensions(image), le poids

 $accept = [
    //image
    "jpeg" => "image/jpeg",
    "jpg" => "image/jpeg",
    "png" => "image/png",
    "svg" => "image/svg+xml",
    //fichier
    "odt" => "application/vnd.oasis.opendocument.text",
    "pdf" => "application/pdf",
 ];
 //Je vérifie l'extension et le type mime (avec pathinfo())
 $extention = pathinfo($nomFichier, PATHINFO_EXTENSION);

 //je vérifie si l'extension ou le type mine(format) sont présent ou non dans les clées => valeurs de $accept
 if(!array_key_exists($extention,$accept) || !in_array($typeFichier, $accept)){
    //si incorrect
    die("Erreur: format incorrect");
 }
 //je vérifie la taille
 if($tailleFichier > 50*1024*1024){
    die("Taille du fichier tros grande");
 }
}

//je supprime le fichier téléchargé

// if (file_exists($cheminTemporaire)) {
//     if (unlink($cheminTemporaire)) {
//         echo "Le fichier a été supprimé avec succès.";
//     } else {
//         echo "Erreur lors de la suppression du fichier.";
//     }
// } else {
//     echo "Le fichier n'existe pas.";
// }

//j'affiche le fichier 

//pour trouver le nom  du chemin afficher les informations contenu dans $_FILES
// if (file_exists($cheminTemporaire)) {
//     header("Content-Type: " . $_FILES["fichier"]["type"]);
//     readfile($cheminTemporaire);
// } else {
//     echo "Le fichier temporaire n'existe pas.";
// }
?>