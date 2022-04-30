<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/custom.css">
    <title>Velvet Records - Add record</title>
  </head>
  <body>
    <?php
    require 'utils.php';

    // dynamic variables creation.
    foreach ($_POST as $key => $value) {
      $$key = $value;
    }

    $db = connect();

    $q = $db->prepare("
      UPDATE disc
      SET
        disc_title = :title,
        disc_year = :year,
        disc_label = :label,
        disc_genre = :genre,
        disc_price = :price,
        artist_id = :artist
      WHERE disc_id = :id;
    ");

    $q->bindValue(':title', $title, PDO::PARAM_STR);
    $q->bindValue(':year', $year, PDO::PARAM_INT);
    $q->bindValue(':label', $label, PDO::PARAM_STR);
    $q->bindValue(':genre', $genre, PDO::PARAM_STR);
    $q->bindValue(':price', $price, PDO::PARAM_INT);
    $q->bindValue(':artist', $artist, PDO::PARAM_INT);
    $q->bindValue(':id', $disc_id, PDO::PARAM_INT);
    $q->execute();
    $q->closeCursor();

    if (is_uploaded_file($_FILES['picture']['tmp_name'])) {
      if ($_FILES['picture']['error'] != 0) {
        displayError('file upload failed!');
        die();
      }

      $tmpfile = $_FILES['picture']['tmp_name'];
      $filename = movePictureFile($tmpfile, $title . '-' . $artist);

      if ($filename == '') {
        displayError('could not move image file!');
        die();
      }

      $q = $db->prepare('UPDATE disc SET disc_picture = :picture WHERE disc_id = :id;');
      $q->bindValue(':picture', $filename, PDO::PARAM_STR);
      $q->bindValue(':id', $disc_id, PDO::PARAM_INT);
      $q->execute();
      $q->closeCursor();
    }

    header("Location: ../../index.php")

    ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
