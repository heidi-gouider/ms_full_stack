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
    if (
        isset($_POST["title"], $_POST["name"], $_POST["year"], $_POST["genre"], $_POST["label"])
        
    ) {
        //je récupère les données saisies
        $title = $_POST["title"];
        $name = $_POST["name"];
        $year = $_POST["year"];
        $genre = $_POST["genre"];
        $label = $_POST["label"];

        $insertDisc = $db->prepare('INSERT INTO disc (disc_title,disc_year, disc_genre, disc_label)
        VALUES (:title, :disc_year, :genre, :label)' );
        $insertDisc->execute([
        'title' => $title,
        'disc_year' => $year,
        'genre' => $genre,
        'label' => $label
        ]);

    }
      // Je redirige vers le formulaire de connexion
      header("Location: index.php");
}
?>