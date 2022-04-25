<?php
function makeLilink($href) {
  echo '<li><a href="' . $href . '">' . $href . '</a></li>';
}
echo "<!DOCTYPE html>";
echo "<html>";
echo "<body>";
echo "<h1>Liste de sites indispensables</h1>";
echo "Pour comprendre le monde moderne...<br>";
echo "<ul>";

$fp = fopen("res/liens.txt", "r");
while (!feof($fp)) {
  $line = fgets($fp, 4096);
  if ($line != "") {
    makeLilink($line);
  }
}

echo "</ul></body></html>";
?>

