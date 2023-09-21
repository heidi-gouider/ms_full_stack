
<?php

// Configuration de l'attribut SameSite pour les cookies de session
    session_set_cookie_params([
        // Ou 'Lax' ou 'Strict' selon vos besoins
        'samesite' => 'None',
        // Utilisez 'secure' uniquement si vous utilisez HTTPS
        'secure' => true,
        'httponly' => true,
    ]);
    //j'active la session
    session_start();

    
        if ($_SERVER['REQUEST_METHOD'] === "POST") {

            $passwowrd = $_POST["password"];

            $password_hash = password_hash($passwowrd, PASSWORD_DEFAULT);


            // elements à afficher
            $datas = $_POST;
        
            // Ajout de la date (heure d'envoi) aux données
            $datas['timestamp'] = date('Y-m-d H:i:s');
        
            // Je stocke le chemin du fichier vers lequel les données récupérés vont être affiché dans une variables
            $cheminTarget = "data_user.txt";
        
            // La fonction fopen() = file open > permet d'ouvrir un fichier
            // les paramètres de cette fonction sont (nom du fichier à ouvrir, mode d'ouverture du dit fichier)"a"=append
            $fp = fopen($cheminTarget, "a");
        
            // Parcours des données et écriture dans le fichier txt
            // foreach ($REQUEST as $data=>$valeur){
            foreach ($datas as $champ => $valeur) {
                fwrite($fp, $champ . ":" . $valeur . "\n");
                // fputs($fp, $datas . ":" . $valeur . "\n");
            }
        
            fclose($fp);
            // var_dump($_POST);
          // Redirige l'utilisateur vers une page de confirmation après la soumission réussie
          header("Location: connexion.php");
          exit(); //  terminer le script ici pour éviter toute exécution supplémentaire
        }
        ?>
