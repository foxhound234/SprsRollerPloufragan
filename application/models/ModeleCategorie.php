<?php
class modeleCategorie extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }
    
public function insererUneCategorie($pDonnesAInserer)
{
    return $this->db->insert('categorie',$pDonnesAInseres);
}
public function RetournerCategories()
{
    $requete = $this->db->get('categorie');
    return $requete->result_array(); // retour d'un tableau associatif ici
}
public function NombreDeProduitCategorie($NoCategorie)
{
 $this->db->from('produit');
 $this->db->where('NOCATEGORIE',$NoCategorie);
 $requete=$this->db->count_all_results();
 return $requete;
}
public function ProduitCategorielimite($nombreDeLignesARetourner, $noPremiereLigneARetourner,$NoCategorie)
{
$this->db->limit($nombreDeLignesARetourner,$noPremiereLigneARetourner);
$this->db->select('*');
$this->db->from('produit');
$this->db->where('NOCATEGORIE',$NoCategorie);
$query=$this->db->get();
if ($query->num_rows() > 0) { // si nombre de lignes > 0
    foreach ($query->result() as $ligne) {
        $jeuDEnregsitrements[] = $ligne;
    }
    return $jeuDEnregsitrements;
}
return false;
}
}

/* End of file ModelName.php */
