<?php
require 'classes/Employe.class.php';

$date_embauche = new DateTime('07-03-2020');
$mag1 = new Magasin('A', 'B', '12345', 'C', true);
$e1 = new Employe('B', 'A', $date_embauche, 'C', 678.89, 'D', $mag1);
$date_embauche = new DateTime('01-01-1998');
$mag = new Magasin('D', 'E', '23456', 'F');
$enf = array(5, 12, 17);
$e2 = new Employe('E', 'D', $date_embauche, 'F', 345.67, 'G', $mag, $enf);
$date_embauche = new DateTime('20-03-2019');
$mag = new Magasin('G', 'H', '75000', 'I');
$e3 = new Employe('H', 'G', $date_embauche, 'I', 123.45, 'J', $mag);
$date_embauche = new DateTime('07-05-2017');
$e4 = new Employe('K', 'J', $date_embauche, 'L', 789.01, 'M', $mag1);
$date_embauche = new DateTime('18-04-1991');
$mag = new Magasin('N', 'O', '75000', 'P');
$e5 = new Employe('R', 'Q', $date_embauche, 'S', 65.43, 'T', $mag);

$employes = array($e1, $e2, $e3, $e4, $e5);

echo 'Et maintenant, voici le montant des primes de chaque employé :<br><br>';
foreach ($employes as $employe) {
  echo "<b>$employe->_prenom $employe->_nom</b><br>";
  echo 'exerçant la profession de <b>' . $employe->_fonction . '</b>';
  echo ' depuis ' . $employe->anciennete() . ' ans au sein de notre société,<br>';
  echo 'touchera au 30/11 de cette année, une prime d\'un montant égal à <em>' . $employe->prime();
  echo ' €</em><br>';
  if ($employe->has_restaurant())
    echo ' - Bénéficie du restaurant d\'entreprise.<br>';
  else
    echo ' - Bénéficie de tickets restaurant.<br>';
  if ($employe->cheques_vacances())
    echo " - Chèques vacances<br>";
  if (count($employe->_enfants) >  0) {
    echo ' - Bénéficie de chèques Noël d\'un montant de :';
    echo $employe->cheques_noel() . '<br>';
  }
  echo '<br>';
}
?>
