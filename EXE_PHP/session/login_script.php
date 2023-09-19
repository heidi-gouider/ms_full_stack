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

        //vérifier si les champs sont bien rempli
        if (
            isset($_POST["mail"], $_POST["password"])
            && !empty($_POST["mail"]) && !empty($_POST["password"])
        ){     
            //je récupère les données saisies
            $userMail = $_POST["mail"];
            $passwowrd = $_POST["password"];

            // je crypte le mot de passe
            $password_hash = password_hash("heidi", PASSWORD_DEFAULT);
        
        // Vérifier si les données sont correctes en utilisant password_verify
        if ($userMail === "heidi" && password_verify($passwowrd, $password_hash)){
            // var_dump($userMail, $passwowrd_hash);
            // echo "Bienvenue " . $userMail . "!";

            $_SESSION["mail"] = $userMail;
            $_SESSION["password"] = $password_hash;

            // Si les données sont correctes, initialiser la session
            // $_SESSION["auth"] = "ok";
        
            //je redirige vers une autre page 
                header("Location:connexion.php");
            exit();

        } else {
            // si les données fournies ne sont pas correctes, je détruit les variables de session
            unset($_SESSION["mail"]);
            unset($_SESSION["password"]);  
            
            // Si les cookies de session sont utilisés, les invalider
            if (ini_get("session.use_cookies")){
                setcookie(session_name(), '', time()-42000);
            }
            //je détruit la session
            session_destroy();

            // Définir un message d'erreur dans une variable de session
            $_SESSION['error_message'] = 'Données incorrectes !';

             // Rediriger vers le formulaire de connexion
            header("Location: login_form.php");
            exit();
            // j'utilise la fonction die() pour arreter le script en cas d'erreur et j'affiche un message
            // echo "Données incorrectes !";

            }

        // } else {
        //     // j'utilise la fonction die() pour arreter le script en cas d'erreur et j'affiche un message
        //     die("Données incorrectes !");
        

        } else {
            die ("formulaire imcomplet!");
        }
    }


    ?>
</body>

</html>
