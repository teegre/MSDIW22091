<?php
$id = (isset($_POST["id"]) && $_POST["id"] != Null ? $_POST["id"] : Null);
$name = (isset($_POST["name"]) && $_POST["name"] != Null ? $_POST["name"] : Null);
$url = (isset($_POST["url"]) && $_POST["url"] != Null ? $_POST["url"] : Null);

if ($id == Null) {
  header("Location: artists.php");
}
elseif ($name == Null || $url == Null) {
  header("Location: artist_form.php?id=" . $id);
}

require "db.php";
$db = connectDB();

try {
  $query = $db->prepare("UPDATE artist SET artist_name = :name, artist_url = :url WHERE artist_id = :id;");
  $query->bindValue(":id", $id, PDO::PARAM_INT);
  $query->bindValue(":name", $name, PDO::PARAM_STR);
  $query->bindValue(":url", $url, PDO::PARAM_STR);
  $query->execute();
  $query->closeCursor();
}

catch (Exception $e) {
  echo "error: " . $query->errorInfo()[2] . "<br>";
  die("end (edit_artist.php)");
}

header("Location: artist_detail.php?id=" . $id);
exit;
?>
