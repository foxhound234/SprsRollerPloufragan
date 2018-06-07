<?php

class ModeleSponsor extends CI_Model {

    public function insererUnSponsor($pDonnesAInseres)
{
  return $this->db->insert('sponsor',$pDonnesAInseres);
}
public function retournerUnProduit($pNoProduit)
		{
			// ici on va chercher l'article dont l'id est $pNoProduit
			$requete = $this->db->get_where('produit', array('noproduit' =>$pNoProduit));
			return $requete->row_array(); // retour d'un tableau associatif, idem
		} // retournerArticles

		

}

/* End of file ModelName.php */
