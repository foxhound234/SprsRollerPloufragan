<?php
class ModeleLigue extends CI_Model {

    public function insererUneLigue($pDonnesAInseres)
{
  return $this->db->insert('Ligue',$pDonnesAInseres);
}


}

/* End of file ModelName.php */
