<?php

class ModeleSponsor extends CI_Model {

    public function insererUnSponsor($pDonnesAInseres)
{
  return $this->db->insert('sponsor',$pDonnesAInseres);
}


}

/* End of file ModelName.php */
