<?php
class ModeleAdherent extends CI_Model {
  public function __construct()
  {
      $this->load->database();
  }
  
public function insererUnAdherent($pDonnesAInseres)
{
  $this->db->insert('adherent',$pDonnesAInseres);
  $Lastid=$this->db->insert_id();
  return $Lastid;
}
public function insererUnJoueur($DonnesDuJoueur)
{
  $this->db->insert('joueur',$DonnesDuJoueur);
  
}
}

/* End of file ModelName.php */
