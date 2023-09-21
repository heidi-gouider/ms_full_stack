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
                <label for="exampleInputNom1" class="form-label">Nom</label>
                <input type="text" class="form-control" id="exampleInputNom1" name="nom" aria-describedby="nomHelp">
            </div>
            <div class="col-md-6 mb-4">
                <label for="exampleInputPrenom1" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="exampleInputPrenom1" name="prenom" aria-describedby="prenomHelp">
            </div>
            <div class="col-md-6 mb-4">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="mail" aria-describedby="emailHelp">
            </div>
            <div class="col-md-6 mb-4">
                <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <div class="col-md-6 mb-4">
                <label for="exampleInputPassword1" class="form-label">Confirmer votre mot de passe</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>

            <!-- <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Se souvenir de moi</label>
  </div> -->
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>