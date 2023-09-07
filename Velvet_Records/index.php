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

    //nouveau chemin pour les images
    $picture = 'ASSETS/';

    // Exécuter la requête SQL pour mettre à jour le chemin d'accès
    //!!! j'ai fais une erreur dans ma modifiction de chemin et j'ai perdu tous les noms des images de ma base de donnée....!!!!
    // d'ou l'importance de faire une sauvegarde de la bdd !!!!!!

    //!!!!code erroné :
    // $sql = "UPDATE disc SET disc_picture = :picture";
    // $stmt = $db->prepare($sql);
    // $stmt->bindParam(':picture', $picture, PDO::PARAM_STR);
    // $stmt->execute();

    //nouveau code :
    // $pictureDirectory = 'ASSETS/'; 
    // Le chemin du sous-dossier où se trouvent les images

    // Exécuter la requête SQL pour mettre à jour le chemin d'accès de chaque image
    // $sql = "UPDATE disc SET disc_picture = CONCAT(:pictureDirectory, disc_picture)";
    // $stmt = $db->prepare($sql);
    // $stmt->bindParam(':pictureDirectory', $pictureDirectory, PDO::PARAM_STR);
    // $stmt->execute();

} catch (Exception $e) {
    // En cas d'erreur, afficher un message d'erreur et le numéro d'erreur, puis arrêter le script
    echo "Erreur : " . $e->getMessage() . "<br>";
    echo "N° : " . $e->getCode();
    die("Fin du script");
}
//j'utilise la méthode query de l'objet pdo pour exécuter la requete sql
// $requete = $db->query("SELECT * FROM disc");
$requete = $db->query("SELECT disc.*, artist.artist_name FROM artist INNER JOIN disc ON artist.artist_id = disc.artist_id;");

// la méthode fetchall récupère toute les lignes de résultat sous forme de tableau
// PDO::FETCH_OBJ indique que chaque ligne sera représentée comme un objet avec des propriétés correspondant aux colonnes de la table.
$tableau = $requete->fetchAll(PDO::FETCH_OBJ);
//Cette ligne ferme le curseur de la requête. Cela libère les ressources associées à la requête et permet de faire d'autres requêtes avec la même connexion PDO.
$requete->closeCursor();

// $requete = $db->prepare("select * from disc where disc_id=?");
// $requete = $db->prepare("SELECT artist_name FROM artist INNER JOIN disc ON artist.artist_id = disc.artist_id;");
// je définie la valeur du paramètre en utilisant son nom
// $requete = bindValue()
// $requete->execute();
// $artist = $requete->fetch(PDO::FETCH_OBJ);
//$requete->closeCursor();


?>

<html>

<head>
    <meta charset="UTF-8">
    <title>Test PDO</title>
</head>
<html>

<body>

    <?php foreach ($tableau as $disc) : ?>
        <table>
            <div>
                <img src="ASSETS/<?= $disc->disc_picture ?>" alt="<?= $disc->disc_title ?>">
            </div>
            <tr>
                <th><?= $disc->disc_title ?></th>

            </tr>

            <tr>
                <td><?= $disc->artist_name ?></td>
            </tr>
            <tr>
                <td>Label : <?= $disc->disc_label ?></td>
            </tr>
            <tr>
                <td>Year : <?= $disc->disc_year ?></td>
            </tr>
            <tr>
                <td>Genre : <?= $disc->disc_genre ?></td>
            </tr>
            <!-- </td> -->
        </table>

    <?php endforeach; ?>


</body>

</html>