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
    ?>
    </body>

    </html>
