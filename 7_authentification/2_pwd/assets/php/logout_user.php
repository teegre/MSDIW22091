<?php
require 'utils.php';
session_start();
if (isset($_SESSION['user'])) {
  logout();
  header('Location: ../../user_login.php');
}
?>
