<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="assets/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/custom.css">
    <title>Velvet Records - Edit Record</title>
  </head>
  <body>
    <div class="container">
      <?php
      require 'assets/php/utils.php';
      $disc = getDisc($_GET['disc_id']);
      if ($disc == Null) {
        displayError('no such record in the database...');
        die();
      }
      ?>
      <h1><b>Edit Record</b></h1>
    <form action="http://localhost:8080/assets/php/update_disc.php" method="POST" enctype="multipart/form-data">
      <fieldset>
        <input type=text id="disc_id" name="disc_id" value="<?= $disc->disc_id ?>" hidden>
        <label for="title">Title</label>
        <input class="form-control form-control-sm mb-1" type="text" id="title" name="title" value="<?= $disc->disc_title ?>" required>
        <label for="artist">Artist</label>
        <select class="custom-select custom-select-sm mb-1" id="artist" name="artist" required>
          <?php artistInputSelect($disc->artist_id) ?> 
        </select>
        <label for="year">Year</label>
        <input class="form-control form-control-sm mb-1" type="text" name="year" id="year" value="<?= $disc->disc_year ?>" pattern="^[0-9]{4]$}" required>
        <label for="genre">Genre</label>
        <input class="form-control form-control-sm mb-1" type="text" name="genre" id="genre" value="<?= $disc->disc_genre ?>" required>
        <label for="label">Label</label>
        <input class="form-control form-control-sm mb-1" type="text" name="label" id="label" value="<?= $disc->disc_label ?>" required>
        <label for="price">Price</label>
        <input class="form-control form-control-sm mb-1" type="text" name="price" id="price" value="<?= $disc->disc_price ?>" pattern="^[0-9]+(\.[0-9]+)?$">
      </fieldset>
      <label for="picture">Picture</label><br>
      <?php fileInputSelect(false, false) ?>
      <div class="img-fluid mb-2">
        <img src="assets/img/<?= $disc->disc_picture ?>" alt="<?= $disc->artist_name . " - " . $disc->disc_title ?>" width="300">
      </div>
      <fieldset>
        <input type="submit" class="btn btn-outline-danger btn-sm" value="Save">
        <button class="btn btn-outline-secondary btn-sm" onclick="history.back()">Back</button>
      </fieldset>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
  </body>
</html>
