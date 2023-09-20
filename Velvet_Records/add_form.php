<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Titre de la page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <?php
// Active l'affichage des erreurs dans le navigateur
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//connexion à la base de donnée
require_once('db_conect.php');

$requete = $db->query("SELECT artist.* FROM artist");
$tableau = $requete->fetchAll(PDO::FETCH_OBJ);
$requete->closeCursor();

?>

<form>
  <fieldset>
    <legend>Ajouter un vinyle</legend>
    <div class="mb-3">
      <label for="Title" class="form-label">Title</label>
      <input type="text" id="disabledTextInput" class="form-control" placeholder="Enter title">
    </div>
    <div class="mb-3">

      <label for="Artist" class="form-label">Disabled select menu</label>
      <select id="disabledSelect" name="artist_id" class="form-select">
  <!--
        // echo '<option value="' .$artist->arrtist_name'"> .'</option>';
        // echo '<select name="nom_artiste">';

// Parcourez le tableau d'artistes pour créer des options
// foreach ($tableau as $artist) {
    // Utilisez la valeur de chaque élément du tableau pour remplir la balise <option>
    // echo '<option value="' . .$artist->arrtist_name' .$artist->arrtist_name' '">' . .$artist->arrtist_name' . '</option>';
// }

// Fermez la balise de sélection
// echo '</select>';
-->  
      </select>

    </div>
    <div class="mb-3">
      <label for="Year" class="form-label">year</label>
      <input type="text" id="disabledTextInput" class="form-control" placeholder="Enter year">
    </div>
    <div class="mb-3">
      <label for="Genre" class="form-label">genre</label>
      <input type="text" id="disabledTextInput" class="form-control" placeholder="Enter genre(Rock,Prog...)">
    </div>
    <div class="mb-3">
      <label for="Label" class="form-label">label</label>
      <input type="text" id="disabledTextInput" class="form-control" placeholder="Enter label(EMI,WARNER...)">
    </div>
    <div class="mb-3">
      <label for="Price" class="form-label"></label>
      <input type="text" id="disabledTextInput" class="form-control" placeholder=>
    </div>
<!-- choisir un fichier -->
    <input class="btn btn-primary" type="button" value="Ajouter">
    <a class="btn btn-primary" href="index.php" role="button">Retour</a>
  </fieldset>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
