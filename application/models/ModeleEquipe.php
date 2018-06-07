<?php
class ModeleEquipe extends CI_Model {

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
