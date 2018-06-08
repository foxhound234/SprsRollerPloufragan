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
public function retournerUnProduit($pNoProduit)
		{
			// ici on va chercher l'article dont l'id est $pNoProduit
			$requete = $this->db->get_where('produit', array('NOPRODUIT' =>$pNoProduit));
			return $requete->row_array(); // retour d'un tableau associatif, idem
		} // retournerArticles
 public function RetournerLesSponsors()
        {
         $requete = $this->db->get('sponsor');
         return $requete->result_array(); // retour d'un tableau associatif ici
        }

}

/* End of file ModelName.php */
