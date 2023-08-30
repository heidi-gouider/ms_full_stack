<html>

<body>


    <?php

    echo $_SERVER["REMOTE_ADDR"] . "<br />";
    // echo $_SERVER["SERVER_ADDR"]. "<br />";

    ////// Afficher tous les nombres impairs entre 0 et 150, par ordre croissant : 1 3 5 7.../////

    for ($i = 0; $i <= 150; $i++) {
        if ($i % 2 != 0) {
            echo $i;
        }
    }


    //// Écrire un programme qui écrit 500 fois la phrase Je dois faire des sauvegardes régulières de mes fichiers

    $phr = "Je dois faire des sauvegardes régulières de mes fichiers";
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


    ////// Afficher la table de multiplication pour les nombres de 1 à 9 dans un tableau HTML////

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
    echo "EXERCICES TABLEAUX \n";


    //// Créez un tableau associant ('associatif') à chaque mois de l’année le nombre de jours du mois.//// 
    // le nom des mois sont les clés du tableau.
    echo"<table>";

    $yearsTab = ["Janvier" => 31, "Février" => 28, "Mars" => 31, "Avril" => 30, "Mai" => 31, "Juin" => 30, "Juillet" => 31, "Août" => 31, "Septembre" => 30, "Octobre" => 31, "Novembre" => 30, "Décembre" => 31];
    // $nbMois = count($yearsTab);

    // echo"Le tableau contient ".$nbMois." éléments."; 
    

// je parcour le tableau "pour chaque clés du tableau j'assigne une valeur

    foreach ($yearsTab as $mois=>$valeur) {
            // j'affiche le tableau
        echo "<tr><td>$mois</td><th>$valeur</th>
         </tr>";
    };
echo"</table>";
//  je supprime un élément 
    // $lala= array("kk","ll","ee");
    // unset($lala["l"]);
    
    // print_r($lala) ;


    ?>
</body>

</html>