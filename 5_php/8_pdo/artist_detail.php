<?php
require "db.php";
$db = connectDB();

$id = $_GET["id"];

$query = $db->prepare("SELECT * FROM artist WHERE artist_id = ?");
$query->execute(array($id));
$artist = $query->fetch(PDO::FETCH_OBJ);
$query->closeCursor();
?>


<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PDO - Artist Detail</title>
  </head>
  <body>
    <?php if ($artist != Null): ?>
      Artist ID: <?= $artist->artist_id ?><br>
      Artist Name: <?= $artist->artist_name ?><br>
      Website: <?php echo '<a href="https://' . $artist->artist_url . '">' . $artist->artist_url . '</a><br>' ?>
    <?php else: ?>
      <?php echo "<b>error: artist not found.</b><br>"; ?>
    <?php endif ?>
    <a href="http://localhost:8080/artist_form.php?id=<?= $id ?>"><button>Edit</button></a>
    <a href="http://localhost:8080/artist_delete.php?id=<?= $id ?>"><button>Delete</button></a>
    <a href="http://localhost:8080/artists.php"><button>Back</button></a>
  </body>
</html>
