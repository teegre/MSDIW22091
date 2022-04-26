<?php
include "db.php";
$db = connectDB();
if ( isset($db) ) {
$query = $db->query("SELECT * FROM artist");
$artists = $query->fetchAll(PDO::FETCH_OBJ);
$query->closeCursor();
}
else echo "there was a problem...";
?>


<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PDO - Artists List</title>
  </head>
  <body>
    <table style="text-align: center;">
      <thead>
        <tr>
          <th>ID</th>
          <th>Artist</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($artists as $artist): ?>
        <tr>
          <td><?= $artist->artist_id ?></td>
          <td><?= $artist->artist_name ?></td>
          <td>
            <a href="http://localhost:8080/artist_detail.php?id=<?= $artist->artist_id ?>">
              Detail
            </a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <a href="./artist_new.html"><button>Add artist</button></a>
  </body>
  </html>
