<?php

function connect() {
  // connect to record database.
  try {
    $conf = parse_ini_file(dirname(__FILE__) . '/db.ini');
    $user = $conf['user'];
    $pass = $conf['pass'];
    $c = new PDO("mysql:host=localhost;charset=utf8;dbname=record", $user, $pass);
    $c->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $c;
  }
  catch (Exception $e) {
    displayError($e->getMessage(), true);
    die();
  }
}

function getDiscs() {
  // fetch all discs!
  $db = connect();
  try {
    $q = $db->query("
      SELECT * FROM disc
      JOIN artist ON disc.artist_id = artist.artist_id
      ORDER BY artist_name, disc_year;");
    $r = $q->fetchAll(PDO::FETCH_OBJ);
    $q->closeCursor();
    return $r;
  }
  catch (Exception $e) {
    displayError($e->getMessage(), true);
    die();
  }
}

function getDisc($id) {
  // return disc details.
  $db = connect();
  try {
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
  catch (Exception $e) {
    displayError($e->getMessage());
    die();
  }
}

function getDiscCount($artist_id) {
  // get disc count for a given artist_id.
  $db = connect();
  try {
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
  catch (Exception $e) {
    displayError($e->getMessage());
    die();
  }
}

function deleteDisc($disc_id) {
  // delete given disc from the database.
  $db = connect();
  $q = $db->prepare("
    DELETE FROM disc
    WHERE disc_id = ?
  ");
  $q->execute(array($disc_id));
  $q->closeCursor();
}

function displayDisc($disc) {
  // display cover + disc info.
  $title = $disc->artist_name . " - " . $disc->disc_title;
  echo '<div class="col-md-2 d-flex flex-row align-self-center mr-1 mb-1 p-0">';
  echo '<div class="mb-auto">';
  echo '<a href="http://localhost:8080/disc_detail.php?disc_id=' . $disc->disc_id . '">';
  echo '<img class="img-fluid img-thumbnail" ';
  echo 'alt="cover picture of ' . $title . '" ';
  echo 'title="' . $title . '" ';
  echo 'src="assets/img/' . $disc->disc_picture . '"';
  echo '></a>';
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
  echo '<button class="btn btn-outline-secondary btn-sm">Details</button></a>';
  echo '</div>';
  echo '</div>';
}

function getArtistDiscs($artist_id, $current_disc_id) {
  // return all discs except current from given artist.
  $db = connect();
  try {
    $q = $db->prepare('
      SELECT disc_id, disc_title, disc_year, disc_picture
      FROM disc
      WHERE artist_id = :artist_id
      AND disc_id <> :disc_id
      ORDER BY disc_year;
    ');
    $q->bindValue(':disc_id', $current_disc_id, PDO::PARAM_INT);
    $q->bindValue(':artist_id', $artist_id, PDO::PARAM_INT);
    $q->execute();
    $r = $q->fetchAll(PDO::FETCH_OBJ);
    $q->closeCursor();
    return $r;
  }
  catch (Exception $e) {
    displayError($e->getMessage());
    die();
  }
}

function displayRelatedDiscs($artist_id, $current_disc_id) {
  // display other records from the same artist.
  $discs = getArtistDiscs($artist_id, $current_disc_id);
  if ($discs == Null) return;
  echo '<div class="row mt-2">';
  echo '  <div class="col">';
  echo '    <h4><b>From the same artist</b></h4>';
  echo '    <hr>';
  echo '  </div>';
  echo '</div>';
  echo '<div class="row">';
  foreach ($discs as $disc) {
    echo '<div class="col-2">';
    echo '  <a href="http://localhost:8080/disc_detail.php?disc_id=' . $disc->disc_id . '">';
    echo '   <img class="img-fluid img-thumbnail" src="assets/img/' . $disc->disc_picture . '" alt="' . $disc->disc_title . '" title="' . $disc->disc_title . ' (' . $disc->disc_year . ')">';
    echo '  </a>';
    echo '</div>';
  }
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
    echo '<input class="form-control form-control-sm" type="file" name="picture" id="picture" onchange="updatePicture()">';
}

function movePictureFile($tmpfile, $title) {
  // move cover picture to its destination.
  // return filename if success, an empty string otherwise.

  // check if file is an actual image.
  if (! @is_array(getimagesize($tmpfile))) {
    displayError('uploaded file is not an image!');
    die();
  }

  // if the file is ok, determine extension via its mimetype.
  $finfo = finfo_open(FILEINFO_MIME_TYPE);
  $mimetype = finfo_file($finfo, $tmpfile);
  finfo_close($finfo);
  $ext = substr($mimetype, strrpos($mimetype, '/') + 1);

  // give the file a name (replace whitespaces by underscores).
  $filename = str_replace(' ', '_', strtolower($title)) . '.' . $ext; 

  // then move it to its destination,
  // that is: assets/img/
  if (move_uploaded_file($tmpfile, '../img/' . $filename))
    return $filename;
  else
    return '';
}

function displayError($msg, $fatal=false) {
  // display an error message.
  echo '<div class="jumbotron mt-2">';
  echo '  <h1 class="text-danger display-5">error</h1>';
  echo '  <hr class="my-4">';
  echo '  <p class="lead">' . $msg . '</p>';
  if (! $fatal) {
    echo '  <p class="lead">';
    echo '    <button class="btn btn-sm btn-outline-secondary" onclick="window.history.back()">Back</button>';
    echo '    <a href="http://localhost:8080/index.php">';
    echo '    <button class="btn btn-sm btn-outline-danger">Home</button></a>';
    echo '  </p>';
  }
  echo '</div>';
}

?>
