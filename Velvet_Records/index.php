<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Test PDO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
<?php

// Active l'affichage des erreurs dans le navigateur
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//connexion à la base de donnée
require_once('db.php');

//j'utilise la méthode query de l'objet pdo pour exécuter la requete sql
// $requete = $db->query("SELECT * FROM disc");
$requete = $db->query("SELECT disc.*, artist.artist_name FROM artist INNER JOIN disc ON artist.artist_id = disc.artist_id;");


// la méthode fetchall récupère toute les lignes de résultat sous forme de tableau
// PDO::FETCH_OBJ indique que chaque ligne sera représentée comme un objet avec des propriétés correspondant aux colonnes de la table.
$tableau = $requete->fetchAll(PDO::FETCH_OBJ);

//Cette ligne ferme le curseur de la requête. Cela libère les ressources associées à la requête et permet de faire d'autres requêtes avec la même connexion PDO.
$requete->closeCursor();

$compte = $db->query("SELECT COUNT (*) FROM disc ");
$result = $compte->fetchColumn();
$compte->closeCursor();
echo "Liste des disques : " . $result;


// $requete = $db->prepare("select * from disc where disc_id=?");
// $requete = $db->prepare("SELECT artist_name FROM artist INNER JOIN disc ON artist.artist_id = disc.artist_id;");
// je définie la valeur du paramètre en utilisant son nom
// $requete = bindValue()
// $requete->execute();
// $artist = $requete->fetch(PDO::FETCH_OBJ);
//$requete->closeCursor();


 // Afficher le nombre de disques

?>

<a href="add_form.php" class="btn btn-primary">Ajouter</a>

    <?php foreach ($tableau as $disc) : ?>
        <div class="card" style="width: 18rem;">
            <img src="<?= $disc->disc_picture ?>" alt="<?= $disc->disc_title ?>">
            <div class="card-body">
                <h5 class="card-title"><?= $disc->disc_title ?></h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?= $disc->artist_name ?></li>
                    <li class="list-group-item">Label : <?= $disc->disc_label ?></li>
                    <li class="list-group-item">Year : <?= $disc->disc_year ?>/li>
                    <li class="list-group-item">Genre : <?= $disc->disc_genre ?>/li>
                </ul>
                <div class="card-body">
                <a href="details.php?disc_id=<?= $disc->disc_id ?>" class="btn btn-primary">Détails</a>
                </div>
            </div>
        </div>

    <?php endforeach; ?>


</body>

</html>