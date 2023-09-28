<?php

// Active l'affichage des erreurs dans le navigateur
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//connexion à la base de donnée
// require_once('db_connect.php');
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>exercices php</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>


    
    <h1>Formulaire d'inscription </h1>



    <div class="container mx-auto" id="formulaire">
        <!-- <form action="<?php //echo $_SERVER["PHP_SELF"]; 
                            ?>" method="post" onsubmit="return valider(event)" id="valid"  novalidate> -->
        <form action="inscription_script.php" method="post" id="valid" novalidate>
            <!-- onsubmit="return valider(event)"  -->

            <!-- class="validation row col-8 m-5 " -->
            <div class="col-md-6 mb-4">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" aria-describedby="nomHelp">
            </div>
            <div class="col-md-6 mb-4">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" aria-describedby="prenomHelp">
            </div>
            <div class="col-md-6 mb-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            </div>
            <div class="col-md-6 mb-4">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="col-md-6 mb-4">
                <label for="password" class="form-label">Confirmer votre mot de passe</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <button type="submit" class="btn btn-primary">M'inscrire</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>