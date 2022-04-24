<?php
function makeLink($link, $title) {
  echo '<a href="' . $link . '" target=_blank">' . $title . '</a>';
}

function sum($tab) {
  $n = 0;
  foreach ($tab as $value) {
    $n += $value;
  }
  return $n;
}

$t = array(2, 4, 6, 8, 9);
$r = sum($t);
makeLink("https://tigerfunk.tk", "Somme de 2+4+6+8+9=<b>" . $r . "</b>");

?>
