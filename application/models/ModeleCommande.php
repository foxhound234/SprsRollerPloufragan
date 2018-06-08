<?php
class ModeleCommande extends CI_Model {
  public function __construct()
{
    $this->load->database();
}

    public function insererUneCommande($pDonnesAInseres)
    {
      $this->db->insert('commande',$pDonnesAInseres);
      return $this->db->insert_id();
    }
    
}

/* End of file ModelName.php */
