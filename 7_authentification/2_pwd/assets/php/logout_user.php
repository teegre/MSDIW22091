<?php
require 'utils.php';
session_start();
if (isset($_SESSION['user'])) {
  logout();
  session_regenerate_id();
  header('Location: ../../user_login.php');
}
?>
