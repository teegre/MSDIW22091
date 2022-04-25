<?php
$date = new DateTime("14-07-2019");
echo "14/07/2019, semaine n° : " . $date->format("W") . "<br>";

$now = new DateTime("now");
$end = new DateTime("16-06-2022");
$dur = date_diff($now, $end);
echo "aujourd'hui nous sommes le " . $now->format("d/m/Y");
echo " (semaine n° " . $now->format("W") . ") ";
echo "et il est " . $now->format("H\hi") . "<br>";
echo "il reste " . $dur->format("%a") . " jour(s) avant la fin de cette formation.<br>";

$d = new DateTime("01-01-2022");
$y = (int) $d->format("Y");
$b = (($y % 4 == 0) && !($y % 100 == 0) || ($y % 400 == 0));

if ($b)
  echo $y . " est une année bissextile.<br>";
else
  echo $y . " n'est pas une année bissextile.<br>";

$date = date_create("32-17-2019");
$errors = date_get_last_errors();
if ($errors["error_count"] > 0)
  echo "32/17/2019 n'est pas une date valide.<br>";
echo "tout va bien, faisez comme si que de rien n'était<br>";
$date = $now;
date_add($date, date_interval_create_from_date_string("1 month"));
echo "dans un mois nous serons le ". $date->format("d/m/Y") . "<br>";

echo "que s'est-il passé le 151282800 ? ";
$date->setTimeStamp("151282800");
echo "je veux dire, le " . $date->format("d/m/Y") . " ?<br>";
echo "c'est le jour où je suis né !"
?>
