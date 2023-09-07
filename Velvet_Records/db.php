<?php
//le bloc try-catch permet de gérer les erreurs
// je definie les constantes
$servername = "localhost";
$dbname = "record";
$username = "heidi";
$password = "ra#tro"; // serait il préférable de cacher le mot de passe ici ?
    try 
    {        
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
        $sql = "ALTER TABLE disc MODIFY COLUMN disc_picture VARCHAR(255)";
        $db->exec($sql);
        echo 'Colonne mise à jour';

    } catch (Exception $e) {
        // En cas d'erreur, afficher un message d'erreur et le numéro d'erreur, puis arrêter le script
        echo "Erreur : " . $e->getMessage() . "<br>";
        echo "N° : " . $e->getCode();
        die("Fin du script");
    }       
//j'utilise la méthode query de l'objet pdo pour exécuter la requete sql
$requete = $db->query("SELECT * FROM artist");
// la méthode fetchall récupère toute les lignes de résultat sous forme de tableau
// PDO::FETCH_OBJ indique que chaque ligne sera représentée comme un objet avec des propriétés correspondant aux colonnes de la table.
$tableau = $requete->fetchAll(PDO::FETCH_OBJ);
//Cette ligne ferme le curseur de la requête. Cela libère les ressources associées à la requête et permet de faire d'autres requêtes avec la même connexion PDO.
$requete->closeCursor();

$requete = $db->prepare("select * from disc where disc_id=?");
// $requete->execute(array($_GET["disc_id"]));
$disc = $requete->fetch(PDO::FETCH_OBJ);
$requete->closeCursor();


?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Test PDO</title>
</head>
<html>
<body>

<?php 
foreach ($tableau as $artist): ?>
        <div>
            <?= $artist->artist_name ?>
        </div>
    <?php endforeach; ?>
</br>
    Disc N° <?= $disc->disc_id ?>
    Disc name <?= $disc->disc_name ?>
    Disc year <?= $disc->disc_year ?>
     


</body>
</html>
