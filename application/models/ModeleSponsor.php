<?php

class modeleSponsor extends CI_Model {
  public function __construct()
{
    $this->load->database();
}


    public function insererUnSponsor($pDonnesAInseres)
{
  return $this->db->insert('sponsor',$pDonnesAInseres);
}

 public function RetournerLesSponsors($NOSPONSOR=null)
        {
          if($NOSPONSOR===null)
          {
            $requete = $this->db->get('sponsor');
         return $requete->result(); // retour d'un tableau associatif ici
          }
         $requete = $this->db->get_where('sponsor',array('NOSPONSOR'=>$NOSPONSOR));
         return $requete->result(); // retour d'un tableau associatif ici
        }
public function NombreDeSponsor()
{
  return $this->db->count_all("sponsor");
}
}

/* End of file ModelName.php */
