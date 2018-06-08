<?php
class ModeleEvenement extends CI_Model {
  public function __construct()
  {
      $this->load->database();
  }
  
    public function insererUnEvenement($pDonnesAInseres)
{
  $this->db->insert('evenement',$pDonnesAInseres);
  return $this->db->insert_id();
}









}

/* End of file ModelName.php */
