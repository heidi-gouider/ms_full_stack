<!-- je récupère les données saisies par l'utilisateur
j'enregistre les données dans la bdd-->
<?php
// Active l'affichage des erreurs dans le navigateur
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//connexion à la base de donnée
require_once('db_conect.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //vérifier si le form a été envoyé
    // if (!empty($_POST)) {
    // var_dump($_POST);
    //pour vérifier la validité du format d'entrée je peux :
    // 1. utiliser des regex
    // 2. des fonctions php comme => filter_var (voir doc php : types de filtres => filtres de validation)
    //vérifier le formulaire

    $requete = $db->query("SELECT artist.* FROM artist");
    $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
    $requete->closeCursor();
  
    if (
        isset($_POST["title"], $_POST["artist"] ,$_POST["annee"], $_POST["genre"], $_POST["label"], $_POST["price"])
        
    ) {
        //je récupère les données saisies
        $title = $_POST["title"];
        $artist = $_POST["artist"];
        $year = $_POST["annee"];
        $genre = $_POST["genre"];
        $label = $_POST["label"];
        $price = $_POST["price"];

        $sql = "INSERT INTO disc (disc_title, artist_id, disc_year, disc_genre, disc_label, disc_price)
        VALUES (:title, :artist, :annee, :genre, :label, :price)";

        // $insertDisc = $db->prepare('INSERT INTO disc (disc_title,disc_year, disc_genre, disc_label)
        // VALUES (:title, :disc_year, :genre, :label)' );
        $insertDisc = $db->prepare($sql);

        // $insertDisc->bindValue(":title", $title, PDO::PARAM_STR);
        // $insertDisc->bindValue(":artist", $artist, PDO::PARAM_INT);
        // $insertDisc->bindValue(":annee", $year, PDO::PARAM_INT);
        // $insertDisc->bindValue(":genre", $genre, PDO::PARAM_STR);
        // $insertDisc->bindValue(":label", $label, PDO::PARAM_STR);
        // $insertDisc->bindValue(":price", $price, PDO::PARAM_INT);

        $insertDisc->execute([
        'title' => $title,
        'artist' => $artist,
        'annee' => $year,
        'genre' => $genre,
        'label' => $label,
        'price' => $price
        ]);

        

        // if (!$insertDisc->execute()){
        //     $error_message = "Erreur lors de l'insertion dans la base de données.";            
            // Arrêtez l'exécution du script après la redirection
            // exit(); 
        // } else {
            // $id = $db->lastInsertId();
            // Redirigez ici après l'insertion réussie
            // header("Location: index.php?added=true");
            header("Location: index.php");

            //Arrêtez l'exécution du script après la redirection
            exit(); 

        };

        // $insertDisc->execute([
        // 'title' => $title,
        // 'disc_year' => $year,
        // 'genre' => $genre,
        // 'label' => $label
        // ]);

    }
// }
?>