<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>exercices php</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> -->
</head>

<body>
    <?php
    //j'ajoute un code de débogage pour afficher les erreurs à l'écran.
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
        //connexion à la base de donnée
        require_once('db_connect.php');

    ////LA SESSION DÉMARRE QUAND ON VEUT STOCKÉ DES INFORMATIONS ICI APRÈS IDENTIFICATION DE L'UTILISATEUR
    /*j'initialise une session*/
    // session_start();


    // je vérifie si le form a été soumis
    // if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //vérifier si le form a été envoyé
    if (!empty($_POST)) {
        // var_dump($_POST);

        //vérifier si les champs sont bien rempli
        if (
            isset($_POST["email"], $_POST["password"])
            && !empty($_POST["email"]) && !empty($_POST["password"])
        ) {
            //je récupère les données saisies
            $email = $_POST["email"];
            $password = $_POST["password"];

            // Je vérifie que le format email est valide
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // Je stocke le message d'erreur dans une variable de session
                $_SESSION['error_message'] = "Le format de l'email est incorrect";

                // Je redirige vers le formulaire de connexion
                header("Location: login_form.php");
                exit();
            }
            //connexion à la base de donnée
            require_once('db_connect.php');

            // Je prépare la requête pour récupérer l'utilisateur par l'email
            $sql = "SELECT * FROM user WHERE email = :email";
            $query = $db->prepare($sql);

            // liaison des valeurs
            $query->bindValue(':email', $email, PDO::PARAM_STR);

            // Exécution de la requête SQL
            $query->execute();
            // $id = $db->lastInsertId();
            // Récupération du résultat de la requête
            $user = $query->fetch();


            // Vérification si l'email existe dans la base de données
            if (!$user) {
                // die("Aucun utilisateur ");
                $_SESSION['error_message'] = "Aucun utilisateur trouvé";
                header("Location: login_form.php");
                exit();
            }
            //utilisateur reconnu par l'email
            // Je vérifie le password
            // Récupération du mot de passe haché de la base de données
            $password_hash = $user["mot_de_passe"];

            // Vérification si le mot de passe saisi correspond au mot de passe haché de la base de données
            if (password_verify($password, $password_hash)) {
                // die("Aucun utilisateur: erreur mot de passe ");
                // Mot de passe incorrect
            // }
            // Authentification réussie
            //connexion

            /*j'initialise une session*/
            session_start();

            // je stocke les informations de l'utilisateur dans la session

            $_SESSION["auth"] = "ok";
            $_SESSION["user"] = [
                "id" => $user["id"],
                "nom" => $user["nom"],
                "prenom" => $user["prenom"],
                "email" => $email,

            ];

            // $_SESSION["password"] = $password_hash;

            //je redirige vers une autre page 
            header("Location:connexion.php");
            exit();
                       // die("Aucun utilisateur: erreur mot de passe ");
        // Mot de passe incorrect

        } else {
            // Formulaire incomplet
            $_SESSION['error_message'] = "Mot de passe incorrect !";
            header("Location: login_form.php");
            exit();
        }
    } else {
        // Formulaire incomplet
        $_SESSION['error_message'] = "Formulaire incomplet";
        header("Location: login_form.php");
        exit();
    }
}

// Avec ces modifications, le code devrait fonctionner correctement et gérer les erreurs de manière appropriée. N'oubliez pas de vous assurer que la structure de la base de données correspond à ce que vous attendez, notamment en ce qui concerne les noms de colonnes et les mots de passe hachés.
    // si les données fournies ne sont pas correctes, je détruit les variables de session
    // unset($_SESSION["email"]);
    // session_destroy();

    // unset($_SESSION["email"]);
    // unset($_SESSION["password"]);
    // Mot de passe incorrect
    //     unset($_SESSION["email"]);
    //     session_destroy();
    //     $_SESSION['error_message'] = 'Mot de passe incorrect !';
    //     header("Location: login_form.php");
    //     exit();
    // }
    // Si les cookies de session sont utilisés, les invalider
    // if (ini_get("session.use_cookies")) {
    //     setcookie(session_name(), '', time() - 42000);
    // }
    //je détruit la session
    // session_destroy();

    // Je défini un message d'erreur dans une variable de session
    // $_SESSION['error_message'] = 'Données incorrectes !';

    // Je redirige vers le formulaire de connexion
    // header("Location: login_form.php");
    // exit();
    // echo "Données incorrectes !";

    ///la suppression de la session se fera soir avec le bouton déconnexion soit quand le user quitera le site
    // Si les cookies de session sont utilisés, les invalider
    // if (ini_get("session.use_cookies")) {
    //     setcookie(session_name(), '', time() - 42000);
    //     $_SESSION['error_message'] = "Mot de passe incorrect";
    //     header("Location: login_form.php");
    //     exit();
    // }

    // } else {
    //     die("formulaire imcomplet!");
    // header("Location: login_form.php");
    // exit();

    // }

    ?>
</body>

</html>