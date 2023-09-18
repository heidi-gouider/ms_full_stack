<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>exercices php</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>


    <?php
    echo "php -S localhost:8000";
    echo "<br/><br/>";

    echo "Development Server (http://localhost:8000) started";
    echo "<br/><br/>";

    echo $_SERVER["REMOTE_ADDR"] . "<br/>";
    // echo $_SERVER["SERVER_ADDR"]. "<br />";


    echo "Les fichiers <br/><br/>";
    echo "Lecture d'un fichier";
    echo "<br/><br/>";
    echo "Un compteur texte en PHP";
    echo "<br/><br/>";
    echo " avoir un compteur différent pour toutes les pages de votre site  ";
    echo "<br/><br/>";

    // On ouvre le fichier moncompteur.txt
    $fichier = fopen("compteur.txt", "r+");

    // on lit la première ligne du fichier, le résultat est stocké dans la variable $visiteurs
    $visiteurs = fgets($fichier);

    // on ajoute 1 au nombre de visiteurs
    $visiteurs++;

    // on se positionne au début du fichier
    fseek($fichier, 0);

    // on écrit le nouveau nombre dans le fichier
    fputs($fichier, $visiteurs);

    // on referme le fichier moncompteur.txt
    fclose($fichier);

    // on indique sur la page le nombre de visiteurs
    echo "$visiteurs personnes sont passées par ici";
    //par contre à chaque rafraichissement le compteur ajoute 1 ...
    echo "<br/><br/>";
    // session_start();

    // if (!isset($_SESSION['visited'])) {
    // Première visite de l'utilisateur
    // $_SESSION['visited'] = true;

    // Ouvrir le fichier moncompteur.txt
    // $fichier = fopen("compteur.txt", "r+");

    // Lire le compteur actuel
    // $visiteurs = fgets($fichier);

    // Incrémenter le compteur
    // $visiteurs++;

    // Réinitialiser le pointeur du fichier au début
    // fseek($fichier, 0);

    // Écrire le nouveau compteur dans le fichier
    // fputs($fichier, $visiteurs);

    // Fermer le fichier
    //     fclose($fichier);
    // } else {
    // L'utilisateur a déjà visité la page, ne pas incrémenter le compteur
    // }

    // Afficher le nombre de visiteurs
    // echo "$visiteurs personnes sont passées par ici";

    //Écrire un programme qui lit ce fichier et qui construit une page web contenant une liste de liens hypertextes.
    //Utilisez la fonction file() qui permet de lire directement un fichier et renvoie son contenu sous forme de tableau.

    // $lines = file('https://ncode.amorce.org/ressources/Pool/NEW_MS_FULL_STACK/WEB_PHP/liens.txt');
    // $fichier = fopen($nomFichier, 'r');
    // $ligne = fgets($fichier);
    // echo '<li><a href="' . htmlspecialchars($ligne) . '">' . htmlspecialchars($ligne) . '</a></li>';
    // fclose($fichier);

    // URL du fichier à lire en ligne
    $urlFichier = 'https://ncode.amorce.org/ressources/Pool/NEW_MS_FULL_STACK/WEB_PHP/liens.txt';

    // Utilise la fonction file() pour lire le contenu du fichier depuis l'URL en tant que tableau
    //    $contenu = file($urlFichier, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $contenu = file($urlFichier);

    // Vérifie si le contenu a été récupéré avec succès
    if ($contenu !== false) {
        // Parcourt le tableau et affiche chaque ligne comme un lien hypertexte
        foreach ($contenu as $ligne) {
            $ligne = trim($ligne); // Supprime les espaces blancs inutiles

            // Assurez-vous que la ligne n'est pas vide
            if (!empty($ligne)) {
                echo '<li><a href="' . htmlspecialchars($ligne) . '">' . htmlspecialchars($ligne) . '</a></li>';
            }
        }
    } else {
        echo "Le contenu du fichier en ligne n'a pas pu être récupéré.";
    }

    echo "<br/><br/>";
    echo "Récupération d'un fichier distant";
    echo "<br/><br/>";
    ?>

    <div class="container">
        <h1>Liste des Nouveaux Utilisateurs</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Surname</th>
                    <th>Firstname</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>City</th>
                    <th>State</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // $champs = "Surname, Firstname, Email, Phone, City, State";
            //     $content = file('EXE_PHP/customers.csv');
            //     foreach ($content as $field) {
            //         $userData = explode(',', $field);{
            //     }
            //     echo '<tr>';
            //     foreach ($userData as $field) {
            //         echo '<td>' . htmlspecialchars($field) . '</td>';
            //     }
            
            //     echo "</tr>";
            // }
            ?>
        </tbody>
    </table>
</div>  
<!-- echo "<br/><br/>"; -->

<form action="page.php" method="post">
    Votre e-mail : <input type="text" name="email" />
    <input type="hidden" name="secret" value="texte à passer discrètement" />
    <input type="submit" value="OK" />
</form>               
       
</body>

</html>