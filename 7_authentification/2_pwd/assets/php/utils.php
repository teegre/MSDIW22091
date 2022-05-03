<?php
function connect() {
  // connect to record database.
  try {
    $conf = parse_ini_file(dirname(__FILE__) . '/db.ini');
    $user = $conf['user'];
    $pass = $conf['pass'];
    $c = new PDO("mysql:host=localhost;charset=utf8;dbname=users", $user, $pass);
    $c->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $c;
  }
  catch (Exception $e) {
    echo $e->getMessage();
    die();
  }
}

function getUser($email) {
  $db = connect();
  try {
    $q = $db->prepare("
      SELECT * FROM user
      WHERE user_email = ?;
    ");
    $q->execute(array($email));
    $r = $q->fetch(PDO::FETCH_OBJ);
    $q->closeCursor();
    return $r;
  }
  catch (Exception $e) {
    echo $e->getMessage();
    die();
  }
}

function displayError($msg, $fatal=false) {
  // display an error message.
  echo '<div class="jumbotron mt-2">';
  echo '  <h1 class="text-danger display-5">error</h1>';
  echo '  <hr class="my-4">';
  echo '  <p class="lead">' . $msg . '</p>';
  if (! $fatal) {
    echo '  <p class="lead">';
    echo '    <button class="btn btn-sm btn-secondary" onclick="window.history.back()">Back</button>';
    echo '    <a href="http://localhost:1234/user_signup.html">';
    echo '    <button class="btn btn-sm btn-danger">Sign Up</button></a>';
    echo '  </p>';
  } else {
    echo '<p class="lead">';
    echo '  <a href="http://localhost:1234/user_logged.php">';
    echo '  <button class="btn btn-sm btn-success">Continue</button></a>';
    echo '  <a href="http://localhost:1234/assets/php/logout_user.php">';
    echo '  <button class="btn btn-sm btn-danger">Log out</button></a>';
    echo '</p>';
  }
  echo '</div>';
}

function logout() {
  unset($_SESSION['user']);
  if (ini_get('session.use_cookies'))
    setcookie(session_name(), '', time()-1);
  session_destroy();
}

function userExists($email) {
  $db = connect();
  try {
    $q = $db->prepare('
      SELECT COUNT(*) FROM user WHERE user_email = ?
    ');
    $q->execute(array($email));
    $r = $q->fetch(PDO::FETCH_NUM);
    if ($r == 0) return false;
    else return true;
  }
  catch (Exception $e) {
    displayError($e->getMessage());
    die();
  }
}
?>
