<?php
class modeleTaille extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }
    
    public function RetournerLesTailles()
    {
     $requete = $this->db->get('taille');
     return $requete->result(); // retour d'un tableau associatif ici
    }  
    public function AssignerUnetaille($pDonnesAInseres)
    {
        return $this->db->insert('disponible_taille',$pDonnesAInseres);
    }
    public function InsererUneTaille($pDonnesAInseres)
    {
    return $this->db->insert('taille',$pDonnesAInseres);
    }
}

/* End of file ModelName.php */
