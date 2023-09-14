<html>

<body>


    <?php

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

function somme($tab){
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
    function complex_password($password) {
        if (preg_match("/^(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z]).{8,}$/", $password)){
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
date_default_timezone_set("Europe/Paris");

//Trouvez le numéro de semaine de la date suivante : 14/07/2019. 
$date1 = '14/07/2019';
$date2 = strtotime($date1);
echo date('W');
echo "<br/><br/>";
//ou
// $Date = new DateTime("14/07/2019");
// echo date("W");

echo "<br/><br/>";

//Combien reste-t-il de jours avant la fin de votre formation.
$Date = new DateTime();
$dateEnd = new DateTime('13/10/2023');
$interval = $date->diff($dateEnd);
$nbDays = $interval-> days;
echo $nbDays;
    ?>
</body>

</html>