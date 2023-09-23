<!-- je récupère les données saisies par l'utilisateur
j'enregistre les données dans la bdd-->
<?php
//je démare la session
// session_start();

// Active l'affichage des erreurs dans le navigateur
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //vérifier si le form a été envoyé
    // if (!empty($_POST)) {
    // var_dump($_POST);

    //connexion à la base de donnée
    require_once('db_conect.php');

    //pour vérifier la validité du format d'entrée je peux :
    // 1. utiliser des regex
    // 2. des fonctions php comme => filter_var (voir doc php : types de filtres => filtres de validation)

    //vérifier si des données sont postées dans le formulaire
    if (
        isset($_POST["title"], $_POST["artist_id"], $_POST["year"], $_POST["genre"], $_POST["label"], $_POST["price"], $_POST["disc_id"])

    ) {
        //je nettoie les données envoyée avec strip_tags = à voir!!!!
        //$title = strip_tags($_POST["title"]);
        //$artist = strip_tags($_POST["artist"]);
        //$year = strip_tags($_POST["annee"]);
        //$genre = strip_tags($_POST["genre"]);
        //$label = strip_tags($_POST["label"]);
        //$price = strip_tags($_POST["price"]);
        //$disc_id = strip_tags($_POST["disc_id"]);


        //je récupère les données saisies
        $title = $_POST["title"];
        $artist = $_POST["artist"];
        $year = $_POST["annee"];
        $genre = $_POST["genre"];
        $label = $_POST["label"];
        $price = $_POST["price"];
        $disc_id = $_POST["disc_id"];

        //requete de modification des données
        $sql = "UPDATE disc SET disc_title = :title, artist_id = :artist, disc_year = :annee, disc_genre = :genre, disc_label = :label, disc_price = :price
        WHERE disc_id = :disc_id";

        // $insertDisc = $db->prepare('INSERT INTO disc (disc_title,disc_year, disc_genre, disc_label)
        // VALUES (:title, :disc_year, :genre, :label)' );

        //je prépare la requete
        $modifDisc = $db->prepare($sql);

        // Je relie les valeurs individuellement aux paramètres de la requête
        $modifDisc->bindValue(":title", $title, PDO::PARAM_STR);
        $modifDisc->bindValue(":artist", $artist, PDO::PARAM_INT);
        $modifDisc->bindValue(":annee", $year, PDO::PARAM_INT);
        $modifDisc->bindValue(":genre", $genre, PDO::PARAM_STR);
        $modifDisc->bindValue(":label", $label, PDO::PARAM_STR);
        $modifDisc->bindValue(":price", $price, PDO::PARAM_INT);
        //inclure l'ID du disque à mettre à jour
        $modifDisc->bindValue(":disc_id", $_POST["disc_id"], PDO::PARAM_INT);

        $verifquery = $modifDisc->execute();

        // $modifDisc->execute([
        //je définie un tableau associatif , les clés sont les paramètres et je leur assigne des valeurs
        // 'title' => $title,
        // 'artist' => $artist,
        // 'annee' => $year,
        // 'genre' => $genre,
        // 'label' => $label,
        // 'price' => $price
        // ]);

        //j'execute la requete
        if ($verifquery) {
            //Redirigez ici après l'insertion réussie
            header("Location:index.php");
        }

        // if (!$modifDisc->execute()){
        //     die("Erreur lors de la mise à jour dans la base de données.");           
    } else {
        // $_SESSION['error'] = "erreur";
        echo "echec";
    }
}
?>