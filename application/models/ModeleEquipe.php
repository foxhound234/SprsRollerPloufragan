<?php
class ModeleEquipe extends CI_Model {

    public function insererUneEquipe($pDonnesAInseres)
    {
      return $this->db->insert('equipe',$pDonnesAInseres);
    }
    

}

/* End of file ModelName.php */
