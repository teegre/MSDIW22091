<?php
require "assets/php/utils.php";
$disc = getDisc($_GET['disc_id']);
 ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Velvet Records - Details</title>
  </head>
  <body>
    <div class="container">
      <h1><b>Details</b></h1>
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
          <button class="btn btn-primary btn-sm">Edit</button>
          <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="confirm">Delete</button>
          <a href="http://localhost:8080"><button class="btn btn-primary btn-sm">Back</button></a>
        </div>
      </div>
    </div>
    <!-- modal confirm box -->
    <div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="modal-label" aria-hidden="true">
      <div class="modal-dialog" role="document">
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
            <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
            <button type="button" class="btn btn-danger">delete</button>
          </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>

