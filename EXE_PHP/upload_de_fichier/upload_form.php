<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Formulaire de télécharchement</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
<div class="container mx-auto" id="formulaire">
    <form action="upload_script.php" method="post" id="upload" novalidate enctype="multipart/form-data">
      <fieldset>
        <legend>Téléchargement</legend>
        <div class="col-md-6 mb-4">
          <label for="title" class="form-label">Title</label>
          <input type="text" name="title" class="form-control" placeholder="Enter title">
        </div>
        <!-- choisir un fichier pour le télécharcher-->
        <label for="piscture">Choississez votre fichier</label>
        <div class="col-md-6 mb-4 mt-4">
          <!-- la validation du type de fichier(l'extention) se fera dans le script php côté back end
        car côté front c'est désactivable -->
          <input type="file" name="fichier"/>
        </div>
        <input class="btn btn-primary" type="submit" value="Enregistrer">
      </fieldset>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>