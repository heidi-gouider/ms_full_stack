<!-- je récupère les données saisies par l'utilisateur
j'enregistre les données dans la bdd-->
<?php
//je démare la session
// session_start();

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
    //require_once('db_conect.php');


    //pour vérifier la validité du format d'entrée je peux :
    // 1. utiliser des regex
    // 2. des fonctions php comme => filter_var (voir doc php : types de filtres => filtres de validation)

    //vérifier si des données sont postées dans le formulaire
    //si isset le disc n'est modifier Pourquoi?
    // if (
    //     isset($_POST["disc_id"], $_POST["title"], $_POST["artist"], $_POST["annee"], $_POST["genre"], $_POST["disc_label"], $_POST["price"])

    // ) {
    //je nettoie les données envoyée avec strip_tags = à voir!!!!
    // $disc_id = strip_tags($_POST["disc_id"]);
    //$title = strip_tags($_POST["title"]);
    //$artist = strip_tags($_POST["artist"]);
    //$year = strip_tags($_POST["annee"]);
    //$genre = strip_tags($_POST["genre"]);
    //$label = strip_tags($_POST["label"]);
    //$price = strip_tags($_POST["price"]);


    //requete de modification des données
    $sql = "UPDATE disc SET disc_title=:title, disc_year=:annee, disc_genre=:genre, disc_label=:disc_label, disc_price=:price, artist_id=:artist
        WHERE disc_id=:disc_id";

    // $insertDisc = $db->prepare('INSERT INTO disc (disc_title,disc_year, disc_genre, disc_label)
    // VALUES (:title, :disc_year, :genre, :label)' );

    //je prépare la requete
    $modifDisc = $db->prepare($sql);

    // Je relie les valeurs individuellement aux paramètres de la requête
    //inclure l'ID du disque à mettre à jour
    //verif si bindValue ou bindParam
    $modifDisc->bindParam(":disc_id", $_POST["disc_id"], PDO::PARAM_INT);
    $modifDisc->bindParam(":title", $title, PDO::PARAM_STR);
    $modifDisc->bindParam(":annee", $year, PDO::PARAM_INT);
    $modifDisc->bindParam(":genre", $genre, PDO::PARAM_STR);
    $modifDisc->bindParam(":disc_label", $label, PDO::PARAM_STR);
    $modifDisc->bindParam(":price", $price, PDO::PARAM_STR);
    $modifDisc->bindParam(":artist", $artist, PDO::PARAM_INT);


    //je récupère les données saisies
    $disc_id = $_POST["disc_id"];
    $title = $_POST["title"];
    $year = $_POST["annee"];
    $genre = $_POST["genre"];
    $label = $_POST["disc_label"];
    $price = $_POST["price"];
    $artist = $_POST["artist"]; // probleme id artist


    //$modifDisc->execute();
    // try {
    //     $modifDisc->execute([
    //         'disc_id' => $disc_id,
    //         'title' => $title,
    //         'artist' => $artist,
    //         'annee' => $year,
    //         'genre' => $genre,
    //         'disc_label' => $label,
    //         'price' => $price
    //     ]);
    //     header("Location: index.php?disc_id=" . $disc_id);
    //     exit();
    // } catch (PDOException $e) {
    //     echo "Erreur SQL : " . $e->getMessage();
    // }

    $modifDisc->execute();
    //je définie un tableau associatif , les clés sont les paramètres et je leur assigne des valeurs
    //     'disc_id' => $disc_id,
    //     'title' => $title,
    //     'artist' => $artist,
    //     'annee' => $year,
    //     'genre' => $genre,
    //     'disc_label' => $label,
    //     'price' => $price
    // ]);

    //!!!ça supprime le disc de l'index lien avec artist_id null

    //j'execute la requete
    //if ($verifquery) {
    //Redirigez ici après l'insertion réussie
    // header("Location:index.php");
    // }
    header("Location: index.php?disc_id=" . $disc_id);
    exit();
    // if (!$modifDisc->execute()){
    //     die("Erreur lors de la mise à jour dans la base de données.");           
} else {
    //     // $_SESSION['error'] = "erreur";
    echo "echec";
}
// }
?>