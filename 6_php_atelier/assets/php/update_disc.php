<?php
require 'utils.php';
// dynamic variables creation.

foreach ($_POST as $key => $value) {
  $$key = $value;
}

$db = connect();

try {
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
}

catch (Exception $e) {
  displayError($e->getMessage());
  die();
}

header("Location: ../../index.php")

//TODO: handle new cover picture...
?>
