<?php
class ModeleCommande extends CI_Model {
    public function insererUneCommande($pDonnesAInseres)
    {
      $this->db->insert('commande',$pDonnesAInseres);
      return $this->db->insert_id();
    }
    
}

/* End of file ModelName.php */
