<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>exercices php</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> -->
</head>

<body>
    <?php

    /*j'initialise une session*/
    session_start();

    // je vérifie si le form a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //vérifier si le form a été envoyé
        // if (!empty($_POST)) {
        // var_dump($_POST);
        //pour vérifier la validité du format d'entrée je peux :
        // 1. utiliser des regex
        // 2. des fonctions php comme => filter_var (voir doc php : types de filtres => filtres de validation)

        //vérifier si les champs sont bien rempli
        if (
            isset($_POST["mail"], $_POST["password"])
            && !empty($_POST["mail"]) && !empty($_POST["password"])
        ) {
            //je récupère les données saisies
            $userMail = $_POST["mail"];
            $passwowrd = $_POST["password"];

            // je vais hasher le mot de passe pour qu'il n'apparaisse pas en clair avec la fonction password_hash()
            // ici j'utilise la constante PASSWORD_DEFAULT avec la valeur password_bcrypte
            $password_hash = password_hash("heidi", PASSWORD_DEFAULT);
            // $password_hash = password_hash($_POST["password"], PASSWORD_ARGON2ID);

            // Vérifier si les données sont correctes en utilisant password_verify
            if ($userMail === "heidi" && password_verify($passwowrd, $password_hash)) {
                // var_dump($userMail, $passwowrd_hash);
                // echo "Bienvenue " . $userMail . "!";

                //voir comment utiliser la fonction strip_tags()
                $_SESSION["mail"] = $userMail;
                $_SESSION["password"] = $password_hash;

                // Si les données sont correctes, initialiser la session
                // $_SESSION["auth"] = "ok";
                // var_dump($passwowrd)

                //je redirige vers une autre page 
                header("Location:connexion.php");
                exit();
            } else {
                // si les données fournies ne sont pas correctes, je détruit les variables de session
                unset($_SESSION["mail"]);
                unset($_SESSION["password"]);

                // Si les cookies de session sont utilisés, les invalider
                if (ini_get("session.use_cookies")) {
                    setcookie(session_name(), '', time() - 42000);
                }
                //je détruit la session
                session_destroy();

                // Je défini un message d'erreur dans une variable de session
                $_SESSION['error_message'] = 'Données incorrectes !';

                // Je redirige vers le formulaire de connexion
                header("Location: login_form.php");
                exit();
                // echo "Données incorrectes !";

            }

            // } else {
            //     // j'utilise la fonction die() pour arreter le script en cas d'erreur et j'affiche un message
            //     die("Données incorrectes !");


        } else {
            die("formulaire imcomplet!");
            // header("Location: login_form.php");
            // exit();

        }
    }


    ?>
</body>

</html>