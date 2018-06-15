<?php
class modeleTaille extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }
    
    public function RetournerLesTailles()
    {
     $requete = $this->db->get('taille');
     return $requete->result_array(); // retour d'un tableau associatif ici
    }  
    public function InsererUneTaille($pDonnesAInseres)
    {
    return $this->db->insert('taille',$pDonnesAInseres);
    }
}

/* End of file ModelName.php */
