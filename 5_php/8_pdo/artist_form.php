<?php
  require "db.php";
  $db = connectDB();
  $query = $db->prepare("SELECT * FROM artist WHERE artist_id=?");
  $query->execute(array($_GET["id"]));
  $artist = $query->fetch(PDO::FETCH_OBJ);
  $query->closeCursor();
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PDO - Edit Artist</title>
  </head>
  <body>
    <h1>Artist ID <?= $artist->artist_id ?></h1>
    <form action="http://localhost:8080/edit_artist.php" method="POST">
      <fieldset>
        <input type="hidden" name="id" value="<?= $artist->artist_id ?>">
        <label for="name">Artist Name:</label><br>
        <input type="text" name="name" id="name" value="<?= $artist->artist_name ?>"><br>
        <label for="url">Website</label><br>
        <input type="text" name="url" id="url" value="<?= $artist->artist_url ?>"><br>
      </fieldset>
      <fieldset>
        <input type="submit" value="Ok">
        <input type="reset" value="Cancel">
        <a href="http://localhost:8080/artists.php"><button>Back</button></a>
      </fieldset>
    </form>
  </body>
</html>
