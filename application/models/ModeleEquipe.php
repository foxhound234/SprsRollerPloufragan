<?php
class modeleEquipe extends CI_Model {
  public function __construct()
{
    $this->load->database();
}


    public function insererUneEquipe($pDonnesAInseres)
    {
      return $this->db->insert('equipe',$pDonnesAInseres);
    }

   public function RetournerLesEquipes()
   {
    $requete = $this->db->get('equipe');
    return $requete->result_array(); // retour d'un tableau associatif ici
   }
}

/* End of file ModelName.php */
