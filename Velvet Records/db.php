<?php

    try 
    {        
        // Établir une connexion à la base de données MySQL en utilisant PDO
        $db = new PDO('mysql:host=localhost;dbname=record;charset=utf8', 'heidi', 'ra#tro');

        // Configurer le mode de gestion des erreurs de PDO pour générer des exceptions en cas d'erreurs
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // la ligne ci-dessus permet d'indiquer à PDO de générer une exception à chaque fois qu'un problème est rencontré.
        //Très pratique en mode développement, mais déconseillé en mode production.

    } catch (Exception $e) {
        // En cas d'erreur, afficher un message d'erreur et le numéro d'erreur, puis arrêter le script
        echo "Erreur : " . $e->getMessage() . "<br>";
        echo "N° : " . $e->getCode();
        die("Fin du script");
    }       

$requete = $db->query("SELECT * FROM artist");
$tableau = $requete->fetchAll(PDO::FETCH_OBJ);
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
    
</body>
</html>
