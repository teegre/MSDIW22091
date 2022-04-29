<?php

function connect() {
  // connect to record database.
  try {
    $c = new PDO("mysql:host=localhost;charset=utf8;dbname=record", "admin", "alcfmapjtlsbqjmsb");
    $c->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $c;
  }
  catch (Exception $e) {
    displayError($e->getMessage(), true);
    die();
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

function getDiscCount($artist_id) {
  // get disc count for a given artist_id.
  $db = connect();
  if (isset($db)) {
    $q = $db->prepare("
      SELECT COUNT(*) FROM disc
      JOIN artist ON disc.artist_id = artist_id
      WHERE artist_id = ?
    ");
    $q->execute(array($artist_id));
    $r = $q->fetch(PDO::FETCH_OBJ);
    $q->closeCursor();
    return $r;
  }
}

function deleteDisc($disc_id) {
  // delete given disc from the database.
  $db = connect();
  if (isset($db)) {
    $q = $db->prepare("
      DELETE FROM disc
      WHERE disc_id = ?
    ");
    $q->execute(array($disc_id));
    $q->closeCursor();
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
  echo '<a href="http://localhost:8080/disc_detail.php?disc_id=' . $disc->disc_id . '">';
  echo '<button class="btn btn-primary btn-sm">Detail</button></a>';
  echo '</div>';
  echo '</div>';
}

function getArtists() {
  // get all artists.
  $db = connect();
  if (isset($db)) {
    $q = $db->query("SELECT artist_id, artist_name FROM artist ORDER BY artist_name;");
    $r = $q->fetchAll(PDO::FETCH_OBJ);
    $q->closeCursor();
    return $r;
  }
}

function artistInputSelect($selected = Null) {
  // display options for artists. 
  $artists = getArtists();
  foreach ($artists as $artist) {
    if ($artist->artist_id == $selected)
      echo '<option value="' . $artist->artist_id . '" selected>' . $artist->artist_name . '</option>';
    else
      echo '<option value="' . $artist->artist_id . '">' . $artist->artist_name . '</option>';
  }
}

function fileInputSelect ($required = true, $label = true) {
  // add a file input.
  if ($label)
    echo '<label class="form-label form-label-sm" for="picture">Choose file...</label><br>';
  if ($required)
    echo '<input class="form-control form-control-sm" type="file" name="picture" id="picture" required>';
  else
    echo '<input class="form-control form-control-sm" type="file" name="picture" id="picture">';
}

function displayError($msg, $fatal=false) {
  // display an error message.
  echo '<div class="jumbotron mt-2">';
  echo '  <h1 class="text-danger display-5">error</h1>';
  echo '  <hr class="my-4">';
  echo '  <p class="lead">' . $msg . '</p>';
  if (! $fatal) {
    echo '  <p class="lead">';
    echo '    <button class="btn btn-sm btn-primary" onclick="window.history.back()">Back</button>';
    echo '    <a href="http://localhost:8080/index.php">';
    echo '    <button class="btn btn-sm btn-danger">Home</button></a>';
    echo '  </p>';
  }
  echo '</div>';
}

?>
