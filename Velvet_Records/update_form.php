<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Formulaire de modification</title>
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

  <div class="container mx-auto" id="formulaire">
    <form action="add_script.php" method="post" id="valid" novalidate>
      <fieldset>
        <legend>Ajouter un vinyle</legend>
        <div class="col-md-6 mb-4">
          <label for="title" class="form-label">Title</label>
          <input type="text" name="title" class="form-control" placeholder="Enter title">
        </div>
        <div class="col-md-6 mb-4">

          <label for="Artist" class="form-label">Disabled select menu</label>
          <select id="disabledSelect" name="artist_id" class="form-select">
          <?php  
                    // Parcourez le tableau des artistes pour générer les options

    foreach ($tableau as $artist) {
        echo '<option value="' . $artist->artist_id . '">' . $artist->artist_name . '</option>';
    }
    ?>

          </select>

        </div>
        <div class="col-md-6 mb-4">
          <label for="year" class="form-label">year</label>
          <input type="text" name="year" class="form-control" placeholder="Enter year">
        </div>
        <div class="col-md-6 mb-4">
          <label for="genre" class="form-label">genre</label>
          <input type="text" name="genre" class="form-control" placeholder="Enter genre(Rock,Prog...)">
        </div>
        <div class="col-md-6 mb-4">
          <label for="label" class="form-label">label</label>
          <input type="text" name="label" class="form-control" placeholder="Enter label(EMI,WARNER...)">
        </div>
        <div class="col-md-6 mb-4">
          <label for="price" class="form-label"></label>
          <input type="int" name="price" class="form-control" placeholder="Enter price">
        </div>
        <!-- choisir un fichier -->
        <input class="btn btn-primary" type="submit" value="Ajouter">
        <a class="btn btn-primary" href="index.php" role="button">Retour</a>
      </fieldset>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>