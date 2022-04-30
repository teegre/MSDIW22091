<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/custom.css">
    <title>Velvet Records - Add record</title>
  </head>
  <body>
    <?php
    require "utils.php";

    // check if there's an error.
    if ($_FILES['picture']['error'] != 0) {
      displayError('file upload failed!');
      die();
    }

    $tmpfile = $_FILES['picture']['tmp_name'];

    $filename = movePictureFile($tmpfile, $_POST['title'] . '-' . $_POST['artist']);

    if ($filename == '') {
      displayError('could not move image file!');
      die();
    }

    // add record to the database.
    try {
      $db = connect();
      $q = $db->prepare('
        INSERT INTO disc
        (disc_title, disc_year, disc_picture, disc_label, disc_genre, disc_price, artist_id)
        VALUES (:title, :year, :picture, :label, :genre, :price, :artist);
      ');
      $q->bindValue(':title', $_POST['title'], PDO::PARAM_STR);
      $q->bindValue(':year', $_POST['year'], PDO::PARAM_INT);
      $q->bindValue(':label', $_POST['label'], PDO::PARAM_STR);
      $q->bindValue(':picture', $filename, PDO::PARAM_STR);
      $q->bindValue(':label', $_POST['label'], PDO::PARAM_STR);
      $q->bindValue(':genre', $_POST['genre'], PDO::PARAM_STR);
      $q->bindValue(':price', $_POST['price'], PDO::PARAM_INT);
      $q->bindValue(':artist', $_POST['artist'], PDO::PARAM_INT);

      $q->execute();
      $q->closeCursor();
    }
    catch (Exception $e) {
      displayError($q->errorInfo[2]);
      die();
    }

    header('Location: ../../index.php');
    ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
