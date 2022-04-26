<?php
$name = (isset($_POST["name"]) && $_POST["name"] != "") ? $_POST["name"] : Null;
$url = (isset($_POST["url"]) && $_POST["url"] != "") ? $_POST["url"] : Null;

if ($name == Null || $url == Null) {
  header("Location: artist_new.html");
  exit;
}

require "db.php";
$db = connectDB();

try {
  $query = $db->prepare("INSERT INTO artist (artist_name, artist_url) VALUES (:name, :url);");
  $query->bindValue(":name", $name, PDO::PARAM_STR);
  $query->bindValue(":url", $url, PDO::PARAM_STR);

  $query->execute();
  $query->closeCursor();
}

catch (Exception $e) {
  var_dump($query->queryString);
  var_dump($query->errorInfo());
  echo "error: " . $requete->errorInfo[2] . "<br>";
  die("end (add_artist.php)"); 
}

header("Location: artists.php");
exit;
?>
