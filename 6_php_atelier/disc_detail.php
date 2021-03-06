<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="assets/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/custom.css">
    <title>Velvet Records - Record Details</title>
  </head>
  <body>
    <div class="container">
      <?php
      require "assets/php/utils.php";
      $disc = getDisc($_GET['disc_id']);
      if ($disc == Null) {
        displayError('no such record in the database...');
        die();
      }
      ?>
      <div class="row align-items-center">
        <div class="col">
          <h1><b>Details</b></h1>
        </div>
        <div class="col text-right">
          <a href="http://localhost:8080/index.php"><button class="btn btn-outline-secondary btn-sm">Back to list</button></a>
        </div>
      </div>
      <div class="row mb-2">
        <div class="col">
          <label for="title">Title</label>
          <input class="form-control form-control-sm" type="text" id="title" value="<?= $disc->disc_title ?>" readonly>
        </div>
        <div class="col">
          <label for="artist">Artist</label>
          <input class="form-control form-control-sm" type="text" id="artist" value="<?= $disc->artist_name ?>" readonly>
        </div>
      </div>
      <div class="row mb-2">
        <div class="col">
          <label for="year">Year</label>
          <input class="form-control form-control-sm" type="text" id="year" value="<?= $disc->disc_year ?>" readonly>
        </div>
        <div class="col">
          <label for="genre">Genre</label>
          <input class="form-control form-control-sm" type="text" id="genre" value="<?= $disc->disc_genre ?>" readonly>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col">
          <label for="label">Label</label>
          <input class="form-control form-control-sm" type="text" id="label" value="<?= $disc->disc_label ?>" readonly>
        </div>
        <div class="col">
          <label for="price">Price</label>
          <input class="form-control form-control-sm" type="text" id="price" value="<?= $disc->disc_price ?>" readonly>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <label for="picture">Picture</label><br>
          <div class="img-fluid">
            <img src="assets/img/<?= $disc->disc_picture ?>" alt="<?= $disc->artist_name . " - " . $disc->disc_title ?>" width="400">
          </div>
        <div>
      </div>
      <div class="row mt-2">
        <div class="col">
        <a href="http://localhost:8080/disc_edit.php?disc_id=<?= $disc->disc_id ?>"><button class="btn btn-outline-success btn-sm">Edit</button></a>
          <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#confirm">Delete</button>
          <button class="btn btn-outline-secondary btn-sm" onclick="history.back()">Back</button>
        </div>
      </div>
      <?php displayRelatedDiscs($disc->artist_id, $disc->disc_id) ?>
    </div>
    <!-- modal confirm box -->
    <div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="modal-label" aria-hidden="true">
      <div class="modal-dialog modal-small" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modal-label">warning</h5>
            <button type="button" class="close" data-dismiss="modal" arial-label="close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>are you sure you want to delete this album?</p>
            <p>there's no turning back...</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">cancel</button>
            <a href="http://localhost:8080/assets/php/delete_disc.php?disc_id=<?= $disc->disc_id ?>"><button class="btn btn-danger btn-sm">delete</button></a>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
  </body>
</html>
