<?php
require 'utils.php';

foreach ($_POST as $key => $value)
  $$key = $value;

$user = getUser($email);

if ($user == Null) {
  echo 'error: invalid user name (e-mail)';
  die();
}

if (password_verify($pass, $user->user_password))
  echo 'You are logged in, ' . $user->user_firstname . ' ' . $user->user_lastname . '!';
else
  echo 'Invalid password.';
?>
