<?php
//je démare la session
// session_start();

// Active l'affichage des erreurs dans le navigateur
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//inclusion de la page de connexion à la base de donnée
require_once('db_conect.php');

// if (isset($_GET["added"]) && $_GET["added"] === "true") {
// echo "Les données ajoutées devraient être affichées ici.";

//j'utilise la méthode query de l'objet pdo pour exécuter la requete sql
// $requete = $db->query("SELECT * FROM disc");
$requete = $db->query("SELECT disc.*, artist.artist_name FROM artist INNER JOIN disc ON artist.artist_id = disc.artist_id;");

// récupération les données
// la méthode fetchall récupère toute les lignes de résultat sous forme de tableau
// PDO::FETCH_OBJ indique que chaque ligne sera représentée comme un objet avec des propriétés correspondant aux colonnes de la table.
$tableau = $requete->fetchAll(PDO::FETCH_OBJ);

//Cette ligne ferme le curseur de la requête. Cela libère les ressources associées à la requête et permet de faire d'autres requêtes avec la même connexion PDO.
$requete->closeCursor();
// Ajoutez un message de débogage pour vérifier les données
// echo "Données récupérées : " . print_r($tableau, true);
// }
// $compte = $db->query("SELECT COUNT (*) FROM disc ");
// $result = $compte->fetchColumn();
// $compte->closeCursor();
// echo "Liste des disques : " . $result;


// Afficher le nombre de disques
$count = 0; // Utilisez une variable pour suivre le nombre de disques affichés
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Test PDO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <h1><?php echo "Liste des disques : "  . $count ?></h1>
    <a href="add_form.php" class="btn btn-primary float-end">Ajouter</a>

    <main class="container">
        <div class="row">
            <?php
            $count = 0; // Utilisez une variable pour suivre le nombre de disques affichés
            foreach ($tableau as $disc) : ?>
                <div class="col-md-6 mb-4">
                    <div class="card" style="width: 18rem;">
                        <img src="ASSETS/<?= $disc->disc_picture ?>" alt="<?= $disc->disc_title ?>">
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
                </div>
            <?php
                $count++; // Incrémentez le compteur
                // Si vous avez affiché 2 disques, fermez la rangée actuelle et commencez une nouvelle rangée
                if ($count % 2 == 0) {
                    echo '</div><div class="row">';
                }

            endforeach; ?>
        </div>
    </main>

</body>

</html>