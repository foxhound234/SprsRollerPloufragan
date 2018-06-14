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
   public function RetournerUneEquipe($Noequipe=false)
   {
    $requete=$this->db->get_where('equipe',array('NOEQUIPE'=>$Noequipe));
    return $requete->row_array();
   }
}

/* End of file ModelName.php */
