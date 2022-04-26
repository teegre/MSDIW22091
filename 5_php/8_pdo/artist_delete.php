<?php
$id = $_GET["id"];
if (!(isset($id)) || intval($id) <= 0) GOTO Redirect;

require "db.php";
$db = connectDB();

try {
  $query = $db->prepare("DELETE FROM artist WHERE artist_id = ?");
  $query->execute(array($id));
  $query->closeCursor();
}

catch (Exception $e) {
  echo "error: " . $query->errorInfo()[2] . "<br>";
  die("end (artist_delete.php)");
}

Redirect:
header("Location: http://localhost:8080/artists.php");
exit;
?>
