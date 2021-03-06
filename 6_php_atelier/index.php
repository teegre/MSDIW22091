<?php require "assets/php/utils.php" ?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="assets/favicon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/custom.css">
    <title>Velvet Records</title>
  </head>
  <body>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-8">
          <?php $discs = getDiscs() ?>
          <h1><b>Records (<?php echo count($discs) ?>)</b></h1>
        </div>
        <div class="col">
          <a href="http://localhost:8080/disc_add.php"><button class="btn btn-outline-secondary btn-sm">Add record</button></a>
        </div>
      </div>
      <?php 
      $col = 1;
      foreach ($discs as $disc) {
        if ($col == 1)
          echo '<div class="row">';

        displayDisc($disc);

        if ($col == 2) {
          echo '</div>';
          $col = 1;
        }
        else $col++;
      }
      ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
