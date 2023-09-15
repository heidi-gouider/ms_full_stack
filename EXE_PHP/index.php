<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Titre de la page</title>
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

    echo "Les instructions conditionnelles et les boucles<br/><br/>";

    // 1. Afficher tous les nombres impairs entre 0 et 150, par ordre croissant : 1 3 5 7... :

    for ($i = 0; $i <= 150; $i++) {
        if ($i % 2 != 0) {
            echo $i . " ";
        }
    }
    echo "<br/><br/>";

    // 2. Écrire un programme qui écrit 500 fois la phrase Je dois faire des sauvegardes régulières de mes fichiers

    $phr = "Je dois faire des sauvegardes régulières de mes fichiers \n";
    $i = 0;
    // la boucle while serait plus appropriée pour répéter un bloc de code tant que la condition est vrai (!attention à la boucle infinie;)
    // risque de plantage 

    // do {
    //     echo $phr;
    //     $i++;
    // } while ($i <= 500);

    // comme je connais le nombre d'itérations à effectuer, je choisie la boucle for
    for ($i = 1; $i <= 500; $i++) {
        echo $phr;
    }
    echo "<br/><br/>";


    // 3. Afficher la table de multiplication pour les nombres de 1 à 9 dans un tableau HTML

    // variables
    $taille = 10;
    $tableau = array();

    // Boucle pour générer les valeurs de la table de multiplication
    // Avec un tableau multidimensionnel
    for ($i = 1; $i <= $taille; $i++) {
        $tableau[$i] = array(); // Cré un sous-tableau pour chaque ligne 

        for ($j = 1; $j <= $taille; $j++) {
            $tableau[$i][$j] = $i * $j; // Calcul la valeur de chaque cellule 
        }
    }

    // J'affiche le tableau

    echo "<table>";
    foreach ($tableau as $ligne) {
        echo "<tr>";
        foreach ($ligne as $valeur) {
            echo "<td>$valeur</td>";
        }
        echo "</tr>";
    }


    echo "</table><br>";
    echo "Les TABLEAUX <br/><br/>";

    // A- Mois de l'année non bissextile

    // 1. Créez un tableau associant ('associatif') à chaque mois de l’année le nombre de jours du mois :
    // le nom des mois sont les clés du tableau.
    echo "<table>";

    $yearsTab = ["Janvier" => 31, "Février" => 28, "Mars" => 31, "Avril" => 30, "Mai" => 31, "Juin" => 30, "Juillet" => 31, "Août" => 31, "Septembre" => 30, "Octobre" => 31, "Novembre" => 30, "Décembre" => 31];
    // $nbMois = count($yearsTab);

    // echo"Le tableau contient ".$nbMois." éléments."; 


    // je parcour le tableau "pour chaque clés du tableau j'assigne une valeur

    foreach ($yearsTab as $mois => $valeur) {
        // j'affiche le tableau
        echo "<tr><td>$mois</td><th>$valeur</th>
         </tr>";
    };
    echo "</table>";
    //  je supprime un élément 
    // $lala= array("kk","ll","ee");
    // unset($lala["l"]);

    // print_r($lala) ;

    echo "<br/><br/>";
    // B- Capitales

    $capitales = array(
        "Bucarest" => "Roumanie",
        "Bruxelles" => "Belgique",
        "Oslo" => "Norvège",
        "Ottawa" => "Canada",
        "Paris" => "France",
        "Port-au-Prince" => "Haïti",
        "Port-d'Espagne" => "Trinité-et-Tobago",
        "Prague" => "République tchèque",
        "Rabat" => "Maroc",
        "Riga" => "Lettonie",
        "Rome" => "Italie",
        "San José" => "Costa Rica",
        "Santiago" => "Chili",
        "Sofia" => "Bulgarie",
        "Alger" => "Algérie",
        "Amsterdam" => "Pays-Bas",
        "Andorre-la-Vieille" => "Andorre",
        "Asuncion" => "Paraguay",
        "Athènes" => "Grèce",
        "Bagdad" => "Irak",
        "Bamako" => "Mali",
        "Berlin" => "Allemagne",
        "Bogota" => "Colombie",
        "Brasilia" => "Brésil",
        "Bratislava" => "Slovaquie",
        "Varsovie" => "Pologne",
        "Budapest" => "Hongrie",
        "Le Caire" => "Egypte",
        "Canberra" => "Australie",
        "Caracas" => "Venezuela",
        "Jakarta" => "Indonésie",
        "Kiev" => "Ukraine",
        "Kigali" => "Rwanda",
        "Kingston" => "Jamaïque",
        "Lima" => "Pérou",
        "Londres" => "Royaume-Uni",
        "Madrid" => "Espagne",
        "Malé" => "Maldives",
        "Mexico" => "Mexique",
        "Minsk" => "Biélorussie",
        "Moscou" => "Russie",
        "Nairobi" => "Kenya",
        "New Delhi" => "Inde",
        "Stockholm" => "Suède",
        "Téhéran" => "Iran",
        "Tokyo" => "Japon",
        "Tunis" => "Tunisie",
        "Copenhague" => "Danemark",
        "Dakar" => "Sénégal",
        "Damas" => "Syrie",
        "Dublin" => "Irlande",
        "Erevan" => "Arménie",
        "La Havane" => "Cuba",
        "Helsinki" => "Finlande",
        "Islamabad" => "Pakistan",
        "Vienne" => "Autriche",
        "Vilnius" => "Lituanie",
        "Zagreb" => "Croatie"
    );

    // 1. Affichez la liste des capitales (par ordre alphabétique) suivie du nom du pays :
    // echo "<tr>";
    ksort($capitales);

    foreach ($capitales as $key => $valeur) {
        echo "$key = $valeur" . "<br/>";
    };
    echo "<br/><br/>";

    // 2. Affichez la liste des pays (par ordre alphabétique) suivie du nom de la capitale :

    // ici avec sort() le nom des capitales ne s'affiche pas, cela tranforme le tableau en tableau indexé !
    // j'utilise donc asort
    asort($capitales);

    foreach ($capitales as $key => $valeur) {
        echo "$valeur = $key" . "<br/>";
    };

    // 3. Affichez le nombre de pays dans le tableau
    $nb = count($capitales);
    echo "$nb";

    echo "<br/><br/>";

    // 4. Supprimer du tableau toutes les capitales ne commençant par la lettre 'B', puis affichez le contenu du tableau : avec strpos
    //je définie la lettre de référence
    foreach ($capitales as $capitale => $pays) {
        $letterRef = strtolower(substr($capitale, 0, 1));

        if ($letterRef === 'b') {
            unset($capitales[$capitale]);
        }
    }
    echo "lal";
    print_r($capitales);


    echo "<br/><br/>";
    echo "Les FONCTIONS <br/><br/>";

    //Ecrivez une fonction qui permette de générer un lien.

    function createLink($target, $linkText)
    {
        // $target = 'https://www.reddit.com/';
        // $linkText = 'Reddit Hug';

        $htmlLink = '<a href="' . $target . '">' . $linkText . '</a>';

        return $htmlLink;
    }
    // Appel de la fonction et affichage du lien généré
    $target = 'https://www.reddit.com/';
    $linkText = 'Reddit Hug';

    $lienReddit = createLink($target, $linkText);

    echo $lienReddit;
    echo "<br/><br/>";

    //Ecrivez une fonction qui calcul la somme des valeurs d'un tableau
    $tab = array(4, 3, 8, 2);
    // $resultat = sum($tab);

    function somme($tab)
    {
        $resultat = array_sum($tab);
        // return $resultat;
        //le return permet de retourner le résultat que je peux stocker dans une varible si je le souhaite par la suite
        //la réutiliser
        echo "$resultat";
    }

    // echo somme($tab);
    somme($tab);
    echo "<br/><br/>";


    //Créer une fonction qui vérifie le niveau de complexité d'un mot de passe :

    //je vais utiliser la fonction preg_match pour voir si la chaine de caractere correspond à l'expression réguliere
    function complex_password($password)
    {
        if (preg_match("/^(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z]).{8,}$/", $password)) {
            return true;
            // echo "mot de passe valide";
        } else {
            return false;
            // echo "mot de passe invalide";
        }
    }

    // Exemple d'utilisation
    $resultat = complex_password("TopSecret42");
    var_dump($resultat); // Affichera bool(true ou false)
    // echo complex_password()
    // echo complex_password($password);
    echo "<br/><br/>";

    echo "Les dates et les heures <br/><br/>";

    //!!! il est possible de configurer la time zone dans le fichier php.ini, attention toute fois en fonction
    //des projet et de l'environnement de dev des éventuelle conflits ( comme avec symfony)
    //je vais donc utiliser ici la ligne de code suivante dans mon script :
    // date_default_timezone_set("Europe/Paris");

    //Trouvez le numéro de semaine de la date suivante : 14/07/2019. 
    $date1 = '14/07/2019';
    $date2 = strtotime($date1);
    echo date('W');
    echo "<br/><br/>";
    //ou
    // $Date = new DateTime("14/07/2019");
    // echo date("W");

    //Combien reste-t-il de jours avant la fin de votre formation.
    $dateStart = new DateTime();
    $dateEnd = new DateTime('13-10-2023');
    $interval = $dateStart->diff($dateEnd);
    $nbDays = $interval->days;
    echo $nbDays;
    echo "<br/><br/>";

    // echo $interval->format('%a jours');
    echo "Jours restant: ", $interval->format("%a");
    echo "<br/><br/>";

    //Comment déterminer si une année est bissextile ?
    $date = new DateTime('Y');
    // $nbDays = 
    // if ($date === 0);
    //Montrez que la date du 32/17/2019 est erronée.

    //Affichez l'heure courante sous cette forme : 11h25.

    //Ajoutez 1 mois à la date courante.

    //Que s'est-il passé le 1000200000

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
                $customers = file('EXE_PHP/compteur.txt');

                ?>
</body>

</html>