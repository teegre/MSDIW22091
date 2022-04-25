<?php
$annee = array(
  "Janvier"   => 31,
  "Février"   => 28,
  "Mars"      => 31,
  "Avril"     => 30,
  "Mai"       => 31,
  "Juin"      => 30,
  "Juillet"   => 31,
  "Août"      => 31,
  "Septembre" => 30,
  "Octobre"   => 31,
  "Novembre"  => 30,
  "Décembre"  => 31
);

echo "<table>";
foreach ($annee as $mois => $jour) {
  echo "<tr>";
  echo "<td>$mois</td>";
  echo "<td>$jour</td>";
  echo "</tr>";
}
echo "</table>";
?>
