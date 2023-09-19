<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>exercices php</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> -->
</head>

<body>
    <?php
    // echo 'Email : ' . $_POST["mail"] . '<br>';
    // echo 'Mot de passe : ' . $_POST["password"] . '<br>';
    // $userMail = $_POST["admin"];
    // $passwowrd = $_POST["heidi"];

    // Récupérer les données du formulaire
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //vérifier si le form a été envoyé
    // if (!empty($_POST)) {
        // var_dump($_POST);

        //vérifier si les champs sont bien rempli
        if (
            isset($_POST["mail"], $_POST["password"])
            && !empty($_POST["mail"]) && !empty($_POST["password"])
        ){     
        //vérifier si les données sont correctes
            $userMail = $_POST["mail"];
            $passwowrd = $_POST["password"];
            $password_hash = password_hash("heidi", PASSWORD_DEFAULT);

        if ($userMail === "heidi" && password_verify($passwowrd, $password_hash)){
            // var_dump($userMail, $passwowrd);
            echo "Bienvenue" . $userMail;
        } else {
            // Les données fournies ne sont pas correctes
            die("Données incorrectes !");
        }

        } else {
            die ("formulaire imcomplet!");
        }
    }
        // Récupérer les données du formulaire
    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //     $userMail = $_POST["mail"];
    //     $passwowrd = $_POST["password"];
    //     var_dump($userMail, $passwowrd);
    // } else {
    //     die ("mot de passe et identifiant incorecte!");
    // }



    //vérifier si les identifiants sont true
    ?>
</body>

</html>
