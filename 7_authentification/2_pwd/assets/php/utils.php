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
?>
