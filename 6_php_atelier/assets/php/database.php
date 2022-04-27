<?php

function connect() {
  // connect to record database.
  try {
    $c = new PDO("mysql:host=localhost;charset=utf8;dbname=record", "admin", "alcfmapjtlsbqjmsb");
    $c->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $c;
  }
  catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "<br>";
    die("<b>could not connect!</b>");
  }
}

function getDiscs() {
  // fetch all!
  $db = connect();
  if (isset($db)) {
    $q = $db->query("
      SELECT * FROM disc
      JOIN artist ON disc.artist_id = artist.artist_id
      ORDER BY artist_name, disc_year;");
    $r = $q->fetchAll(PDO::FETCH_OBJ);
    $q->closeCursor();
    return $r;
  }
}

function getDisc($id) {
  // return disc details.
  $db = connect();
  if (isset($db)) {
    $q = $db->prepare("
      SELECT * FROM disc
      JOIN artist ON disc.artist_id = artist.artist_id
      WHERE disc_id = ?
    ");
    $q->execute(array($id));
    $r = $q->fetch(PDO::FETCH_OBJ);
    $q->closeCursor();
    return $r;
  }
}

function displayDisc($disc) {
  // display cover + disc info.
  $title = $disc->artist_name . " - " . $disc->disc_title;
  echo '<div class="col-md-2 d-flex flex-row align-self-center mr-1 mb-1 p-0">';
  echo '<div class="mb-auto">';
  echo '<img class="img-fluid img-thumbnail" ';
  echo 'alt="cover picture of ' . $title . ' "';
  echo 'title="' . $title . '" ';
  echo 'src="assets/img/' . $disc->disc_picture . '"';
  echo '>';
  echo '</div>';
  echo '</div>';
  echo '<div class="col-md-3 d-flex flex-column mr-0 p-0">';
  echo '<b>' . $disc->disc_title . '</b>';
  echo '<div class="small">';
  echo '<b>' . $disc->artist_name . '</b><br>';
  echo '<b>Label: </b>'. $disc->disc_label . '<br>';
  echo '<b>Year: </b>'. $disc->disc_year . '<br>';
  echo '<b>Genre: </b>'. $disc->disc_genre . '<br>';
  echo '</div>';
  echo '<div class="mt-auto pb-3">';
  echo '<a href="http://localhost:8080/detail.php?disc_id=' . $disc->disc_id . '">';
  echo '<button class="btn btn-primary btn-sm">Detail</button></a>';
  echo '</div>';
  echo '</div>';
}

?>
