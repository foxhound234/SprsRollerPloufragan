<?php
class ModeleProduit extends CI_Model {

public function insererUnProduit($pDonnesAInseres)
{
return $this->db->insert('produit',$pDonnesAInseres);
}

public function nombreDArticles() { // méthode utilisée pour la pagination
    return $this->db->count_all("produit");
} // nombreDArticles


public function retournerArticlesLimite($nombreDeLignesARetourner, $noPremiereLigneARetourner)
{ 	// Nota Bene : surcharge non supportée par PHP 
    $this->db->limit($nombreDeLignesARetourner, $noPremiereLigneARetourner);
    $requete = $this->db->get("produit");

    if ($requete->num_rows() > 0) { // si nombre de lignes > 0
        foreach ($requete->result() as $ligne) {
            $jeuDEnregsitrements[] = $ligne;
        }
        return $jeuDEnregsitrements;
    }
    return false;
} // retournerArticlesLimite










}
/* End of file ModelName.php */
