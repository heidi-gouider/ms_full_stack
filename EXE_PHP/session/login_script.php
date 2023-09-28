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


    /*j'initialise une session*/
    session_start();

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

            // je vais hasher le mot de passe pour qu'il n'apparaisse pas en clair avec la fonction password_hash()
            // ici j'utilise la constante PASSWORD_DEFAULT avec la valeur password_bcrypte
            $password_hash = password_hash("password", PASSWORD_DEFAULT);
            // $password_hash = password_hash($_POST["password"], PASSWORD_ARGON2ID);

    $sql = "SELECT email, mot_de_passe FROM user WHERE email = :email";
        // Préparation de la requête SQL
        $stmt = $db->prepare($sql);

        // liaison des valeurs
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        // $stmt->bindParam(':mot_de_passe', $password_hash, PDO::PARAM_STR);

           // Exécution de la requête SQL
           if ($stmt->execute()) {
            // Récupération du résultat de la requête
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // Vérification si l'e-mail existe dans la base de données
            if ($result) {
                // Récupération du mot de passe haché de la base de données
                $password_hash_from_db = $result['mot_de_passe'];

                // Vérification si le mot de passe saisi correspond au mot de passe haché de la base de données
                if (password_verify($password, $password_hash_from_db)) {
                    // Authentification réussie
            $_SESSION["auth"] = "ok";
                $_SESSION["email"] = $email;
                // $_SESSION["password"] = $password_hash;

                //je redirige vers une autre page 
                header("Location:connexion.php");
                exit();

            } else {
                // si les données fournies ne sont pas correctes, je détruit les variables de session
                // unset($_SESSION["email"]);
                // unset($_SESSION["password"]);
      // Mot de passe incorrect
      unset($_SESSION["email"]);
      session_destroy();
      $_SESSION['error_message'] = 'Mot de passe incorrect !';
      header("Location: login_form.php");
      exit();
  }
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
        }

        // } else {
        //     die("formulaire imcomplet!");
            // header("Location: login_form.php");
            // exit();

        }
    }


    ?>
</body>

</html>