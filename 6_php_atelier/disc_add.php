<?php require "assets/php/utils.php" ?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="assets/favicon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/custom.css">
    <title>Velvet Records - Add Record</title>
  </head>
  <body>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-8">
          <h1><b>Add Record</b></h1>
        </div>
        <div class="col text-right">
          <a href="http://localhost:8080/index.php"><button class="btn btn-outline-secondary btn-sm">Back to list</button></a>
        </div>
      </div>
      <form action="http://localhost:8080/assets/php/add_disc.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <fieldset>
            <label for="title">Title</label>
            <input class="form-control form-control-sm" type="text" name="title" id="title" placeholder="Enter title" required>
            <br>
            <label for="artist">Artist</label>
            <select class="custom-select custom-select-sm" id="artist" name="artist" required>
              <option value="">Choose artist</option>
              <?php artistInputSelect() ?> 
            </select>
            <br><br>
            <label for="year">Year</label>
            <input class="form-control form-control-sm" type="text" name="year" id="year" placeholder="Year" pattern="^[0-9]{4}$" required>
            <br>
            <label for="genre">Genre</label>
            <input class="form-control form-control-sm" type="text" name="genre" id="genre" placeholder="Enter genre (Rock, Pop, Prog...)" required>
            <br>
            <label for="label">Label</label>
            <input class="form-control form-control-sm" type="text" name="label" id="label" placeholder="Enter label (EMI, Warner, Polygram, Univers Sale...)" required>
            <br>
            <label for="price">Price</label>
            <input class="form-control form-control-sm" type="text" name="price" id="price" pattern="^[0-9]+(\.[0-9]+)$">
            <br>
            <?php fileInputSelect() ?>
            <br>
          </fieldset>
          <fieldset>
            <button type="submit" class="btn btn-outline-success btn-sm">Add</button>
            <button type="reset"  class="btn btn-outline-secondary btn-sm">Reset</button>
          </fieldset>
        </div>
      </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
