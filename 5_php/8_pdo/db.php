<?php
function connectDB() {
  try
  {
    $connection = new PDO("mysql:host=localhost;charset=utf8;dbname=record", "admin", "alcfmapjtlsbqjmsb");
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $connection;
  }
  catch (Exception $e)
  {
    echo "Erreur : " . $e->getMessage() . "<br>";
    echo "N° : " . $e->getCode();
    die('Fin du script');
  }
}
?>
