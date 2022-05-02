<?php
require 'utils.php';
foreach ($_POST as $key => $value)
  $$key = $value;

$db = connect();
try {
  $q = $db->prepare("
    INSERT INTO user 
    (user_firstname, user_lastname, user_email, user_password)
    VALUES (?, ?, ?, ?);
  ");
  $q->execute(array($firstname, $lastname, $email, password_hash($password, PASSWORD_BCRYPT)));
  $q->closeCursor();
  header('Location: ../../user_login.html');
}
catch (Exception $e) {
  echo $e->getMessage();
  die();
}
?>
