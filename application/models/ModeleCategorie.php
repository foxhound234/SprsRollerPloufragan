<?php
class ModeleCategorie extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }
    
public function insererUneCategorie($pDonnesAInserer)
{
    $this->db->insert('categorie',$pDonnesAInseres);
}
public function RetournerCategories()
{
    $requete = $this->db->get('categorie');
    return $requete->result_array(); // retour d'un tableau associatif ici
}
}

/* End of file ModelName.php */
