<?php

class Employe {
  public String $_nom;
  public String $_prenom;
  public DateTime $_date;
  public String $_fonction;
  public Float $_salaire;
  public String $_service;
  public Magasin $_mag;
  public array $_enfants;

  public function __construct($nom, $prenom, $date, $fonction, $salaire, $service, $mag, $enfants = []) {
    $this->_nom = $nom;
    $this->_prenom = $prenom;
    $this->_date = $date;
    $this->_fonction = $fonction;
    $this->_salaire = $salaire;
    $this->_service = $service;
    $this->_mag = $mag;
    $this->_enfants = $enfants;
  }

  public function anciennete() {
    $now = new DateTime('now');
    $anc = date_diff($now, $this->_date);
    return $anc->y;
  }

  public function prime() {
    $anc = $this->anciennete();
    $prime = (($this->_salaire * 0.05) + (($this->_salaire * 0.02) * $anc)) * 1000;
    return $prime;
  }

  public function ordre() {
    $now = new DateTime('now');
    if ($now->format('d/m') == '30/11') {
      $prime = $this->prime();
      $msg = 'Un ordre de virement d\'un montant de ' . $prime . '€ a été envoyé à la banque';
      $sub = 'Ordre de virement pour ' . $this->_prenom . ' ' . $this->_nom;
      return mail('banquier@banque.com', $sub, $msg);
    } else
      echo $now->format('d/m/Y') . ' : L\'ordre de virement n\'a pas été envoyé.<br>';
  }

  public function has_restaurant() {
    return $this->_mag->restaurant;
  }

  public function cheques_vacances() {
    if ($this->anciennete() > 0)
      return true;
    else
      return false;
  }

  public function cheques_noel() {
    if (count($this->_enfants) > 0) {
      foreach ($this->_enfants as $age) {
        if ($age < 11) echo ' 20€ ';
        elseif ($age < 16) echo ' 30€ ';
        elseif ($age < 19) echo ' 50€ ';
      }
    }
  }
}

class Magasin {
  public String $nom;
  public String $adresse;
  public String $cp;
  public String $ville;
  public Bool   $restaurant;

  public function __construct($nom, $adresse, $cp, $ville, $restaurant = false) {
    $this->nom = $nom;
    $this->adresse = $adresse;
    $this->cp = $cp;
    $this->ville = $ville;
    $this->restaurant = $restaurant;
  }
}
?>
