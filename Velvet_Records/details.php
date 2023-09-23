  <?php
  //je démare la session
  // session_start();

  // Active l'affichage des erreurs dans le navigateur
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  //connexion à la base de donnée
  require_once('db_conect.php');

  //je nettoie le disc_id envoyé avec strip_tags = à voir!!!!


  $requete = $db->prepare("select * from disc where disc_id=?");
  //$requete = $db->prepare("select disc.*, artist.artist_name FROM disc INNER JOIN artist ON disc.artist_id = artist.artist_id WHERE disc_id=?");
  $requete->execute(array($_GET["disc_id"]));
  $disc = $requete->fetch(PDO::FETCH_OBJ);


  if (isset($_POST['retour'])) {
    header("Location: index.php");
    exit;
  }
  ?>

  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="UTF-8">
    <title>Titre de la page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>

  <body>

    <div class="container mx-auto" id="formulaire">

      <form method="post">
        <!-- <fieldset disabled> -->
        <legend>Details</legend>
        <!-- <div class="col"></div> -->

        <div class="col-md-6 mb-4">
          <label for="Title" class="form-label">Title</label>
          <input type="text" id="disabledTextInput" class="form-control" value="<?= $disc->disc_title ?>" disabled>
        </div>
        <div class="col-md-6 mb-4">
          <label for="Year" class="form-label">year</label>
          <input type="text" id="disabledTextInput" class="form-control" value="<?= $disc->disc_year ?>" disabled>
        </div>
        <div class="col-md-6 mb-4">
          <label for="Label" class="form-label">label</label>
          <input type="text" id="disabledTextInput" class="form-control" value="<?= $disc->disc_label ?>" disabled>
        </div>

        <div class="col-md-6 mb-4">
          <label for="Artist" class="form-label">artist</label>
          <input type="text" id="disabledTextInput" class="form-control" value="<?= $disc->artist_name ?>" disabled>

          <div class="col-md-6 mb-4">
            <label for="Genre" class="form-label">genre</label>
            <input type="text" id="disabledTextInput" class="form-control" value="<?= $disc->disc_genre ?>" disabled>
          </div>

          <div class="col-md-6 mb-4">
            <label for="Price" class="form-label">price</label>
            <input type="text" id="disabledTextInput" class="form-control" value="<?= $disc->disc_price ?>" disabled>
            <img src="ASSETS/<?= $disc->disc_picture ?>" alt="<?= $disc->disc_title ?>">
          </div>
          <a href="update_form.php?disc_id=<?= $disc->disc_id ?>" class="btn btn-primary">Modifier</a>
          <a class="btn btn-primary" href="#">Supprimer</a>
          <input type="submit" class="btn btn-primary" name="retour" value="Retour">
          <!-- </fieldset> -->
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>

  </html>