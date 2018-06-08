<?php
class ModeleLigue extends CI_Model {
  public function __construct()
{
    $this->load->database();
}

    public function insererUneLigue($pDonnesAInseres)
{
  return $this->db->insert('Ligue',$pDonnesAInseres);
}
public function RetournerLesLigue()
{
 $requete = $this->db->get('Ligue');
 return $requete->result_array(); // retour d'un tableau associatif ici
}

}

/* End of file ModelName.php */
