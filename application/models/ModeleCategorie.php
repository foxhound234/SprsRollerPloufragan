<?php
class ModeleCategorie extends CI_Model {

public function insererUneCategorie($pDonnesAInserer)
{
    $this->db->insert('categorie',$pDonnesAInseres);
}

}

/* End of file ModelName.php */
