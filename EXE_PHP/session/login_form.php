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

//les sessions en PHP sont souvent utilisées en lien avec l'authentification, mais elles ne se limitent pas uniquement à cela.
//Les sessions sont un mécanisme de gestion de l'état côté serveur qui peut être utilisé pour stocker des informations spécifiques à un utilisateur pendant sa visite sur un site web.     
//Elles peuvent également être utilisées pour d'autres tâches de gestion de l'état,
//telles que le suivi d'articles dans un panier d'achat, le stockage de préférences de l'utilisateur, la gestion de formulaires multi-pages, etc.
//Les sessions sont un outil polyvalent pour gérer les données côté serveur tout au long de la visite de l'utilisateur sur un site web.
?>
 <div class="container mx-auto" id="formulaire">
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" onsubmit="return valider(event)" id="valid"  novalidate>
    <!-- class="validation row col-8 m-5 " -->
<div class="col-md-6 mb-4">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="mail" aria-describedby="emailHelp">
    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
  </div>
  <div class="col-md-6 mb-4">
    <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
  <!-- <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Se souvenir de moi</label>
  </div> -->
  <button type="submit" class="btn btn-primary">Envoyer</button>
</form>
 </div>


<?php
// $cheminScript = __DIR__ . "/login_script.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    // elements à afficher
    $datas = $_POST;

    // Ajout de la date (heure d'envoi) aux données
    $datas['timestamp'] = date('Y-m-d H:i:s');

    // Je stocke le chemin du fichier vers lequel les données récupérés vont être affiché dans une variables
    $cheminScript = "login_script.php";

    // La fonction fopen() = file open > permet d'ouvrir un fichier
    // les paramètres de cette fonction sont (nom du fichier à ouvrir, mode d'ouverture du dit fichier)"a"=append
    $fp = fopen($cheminScript, "a");

    // Parcours des données et écriture dans le fichier txt
    // foreach ($REQUEST as $data=>$valeur){
    foreach ($datas as $champ => $valeur) {
        fwrite($fp, $champ . ":" . $valeur . "\n");
        // fputs($fp, $datas . ":" . $valeur . "\n");
    }

    fclose($fp);
    // var_dump($_POST);
  // Redirige l'utilisateur vers une page de confirmation après la soumission réussie
  // header("Location: confirmation.php");
  exit(); //  terminer le script ici pour éviter toute exécution supplémentaire
}

$realm = 'Restricted area';

//utilisateur => mot de passe
$users = array('admin' => 'admin');

if (empty($_SERVER['PHP_AUTH_DIGEST'])) {
  header('HTTP/1.1 401 Unauthorized');
  header('WWW-Authenticate: Digest realm="'.$realm.
         '",qop="auth",nonce="'.uniqid().'",opaque="'.md5($realm).'"');

  die('Texte utilisé si le visiteur utilise le bouton d\'annulation');
}

// analyse la variable PHP_AUTH_DIGEST
if (!($data = http_digest_parse($_SERVER['PHP_AUTH_DIGEST'])) ||
  !isset($users[$data['username']]))
  die('Mauvaise Pièce d\'identité!');


// Génération de réponse valide
$A1 = md5($data['username'] . ':' . $realm . ':' . $users[$data['username']]);
$A2 = md5($_SERVER['REQUEST_METHOD'].':'.$data['uri']);
$valid_response = md5($A1.':'.$data['nonce'].':'.$data['nc'].':'.$data['cnonce'].':'.$data['qop'].':'.$A2);

if ($data['response'] != $valid_response)
  die('Mauvaise Pièce d\'identitée!');

// ok, utilisateur & mot de passe valide
echo 'Vous êtes identifié en tant que : ' . $data['username'];


// fonction pour analyser l'en-tête http auth
function http_digest_parse($txt)
{
  // protection contre les données manquantes
  $needed_parts = array('nonce'=>1, 'nc'=>1, 'cnonce'=>1, 'qop'=>1, 'username'=>1, 'uri'=>1, 'response'=>1);
  $data = array();
  $keys = implode('|', array_keys($needed_parts));

  preg_match_all('@(' . $keys . ')=(?:([\'"])([^\2]+?)\2|([^\s,]+))@', $txt, $matches, PREG_SET_ORDER);

  foreach ($matches as $m) {
      $data[$m[1]] = $m[3] ? $m[3] : $m[4];
      unset($needed_parts[$m[1]]);
  }

  return $needed_parts ? false : $data;
}
// Lire le contenu du fichier login_script.php et afficher les données
// if (file_exists($cheminScript)) {
// Lire le contenu du fichier dans une variable
// $contenu = file_get_contents($cheminScript);

// Diviser le contenu en lignes en utilisant le saut de ligne comme délimiteur
// $lignes = explode("\n", $contenu);

// Parcourir chaque ligne et afficher les données
// foreach ($lignes as $ligne) {
// Diviser la ligne en deux parties : le nom du champ et sa valeur
// $donnees = explode(":", $ligne);

// Vérifier si le champ et sa valeur existent
// if (count($donnees) === 2) {
//     $champ = trim($donnees[0]);
//     $valeur = trim($donnees[1]);

// Afficher le champ et sa valeur
//             echo "$champ : $valeur<br>";
//         }
//     }
// } else {
//     echo "Aucune donnée n'a été enregistrée pour le moment.";
// }
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>