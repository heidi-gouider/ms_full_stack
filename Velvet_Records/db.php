<?php

//le bloc try-catch permet de gérer les erreurs
// je definie les constantes
$servername = "localhost";
$dbname = "record";
$username = "heidi";
$password = "ra#tro"; // serait il préférable de cacher le mot de passe ici ?
try {
    // Établir une connexion à la base de données MySQL en utilisant une instance d'une classe PDO
    // le premier argument le datasource name (dsn)
    // le deusieme est le nom utilisateur
    //le troisieme le mdp
    $db = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);

    // Configurer le mode de gestion des erreurs de PDO pour générer des exceptions en cas d'erreurs
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // la ligne ci-dessus permet d'indiquer à PDO de générer une exception à chaque fois qu'un problème est rencontré.
    //Très pratique en mode développement, mais déconseillé en mode production.

    //je vais modifier la structure de la table disc avec l'instruction ALTER TABLE pour y insérer des images
    //je n'utilise pas de requetes préparées car aucun utilisateur ne pourra changer la structure d'une table
    // $sql = "ALTER TABLE disc MODIFY COLUMN disc_picture BLOB";
    // $db->exec($sql);
    // echo 'Colonne mise à jour';


    // Exécuter la requête SQL pour mettre à jour le chemin d'accès
    //!!! j'ai fais une erreur dans ma modifiction de chemin et j'ai perdu tous les noms des images de ma base de donnée....!!!!
    // d'ou l'importance de faire une sauvegarde de la bdd !!!!!!

    //!!!!code erroné :
    // $sql = "UPDATE disc SET disc_picture = :pictureDirectory";
    // $stmt = $db->prepare($sql);
    // $stmt->bindParam(':pictureDirectory', $pictureDirectory, PDO::PARAM_STR);
    // $stmt->execute();

    //nouveau code :

    // Le chemin du sous-dossier où se trouvent les images
    // $pictureDirectory = 'ASSETS/';

    //Exécuter la requête SQL pour mettre à jour le chemin d'accès de chaque image
    // $sql = "UPDATE disc SET disc_picture = CONCAT(:pictureDirectory, disc_picture)";
    // $stmt = $db->prepare($sql);
    // $stmt->bindParam(':pictureDirectory', $pictureDirectory, PDO::PARAM_STR);
    // $stmt->execute();

    // Le chemin du sous-dossier où se trouvent les images
    // $pictureDirectory = 'ASSETS/';
    // Utilise un modèle pour rechercher les valeurs qui commencent par 'ASSETS/'.
    // $prefix = 'ASSETS/%';

    //Exécuter la requête SQL pour mettre à jour le chemin d'accès de chaque image
    //     $sql = "UPDATE disc SET disc_picture = CONCAT(:pictureDirectory, disc_picture)";
    //     $stmt = $db->prepare($sql);
    //     $stmt->bindParam(':pictureDirectory', $pictureDirectory, PDO::PARAM_STR);
    // $stmt->bindParam(':prefix', $prefix, PDO::PARAM_STR);
    //     $stmt->execute();

} catch (Exception $e) {
    // En cas d'erreur, afficher un message d'erreur et le numéro d'erreur, puis arrêter le script
    echo "Erreur : " . $e->getMessage() . "<br>";
    echo "N° : " . $e->getCode();
    die("Fin du script");
}