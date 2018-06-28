<?php
class modeleProduit extends CI_Model {
    public function __construct()
{
    $this->load->database();
}


public function InsererUnProduit($pDonnesAInseres)
{
$this->db->insert('produit',$pDonnesAInseres);
$Lastid=$this->db->insert_id();
  return $Lastid;
}
public function ModifierStockunProduit($pNoproduit,$quantitecommandée)
{
$this->db->where('NOPRODUIT', $pNoproduit);
$this->db->set('QUANTITEENSTOCK', '`QUANTITEENSTOCK`-'.$quantitecommandée.'', FALSE); 
$this->db->update('produit');
}
public function RetournerLeProduit($NoProduit)
{
$requete="SELECT LIBELLE,DETAIL,PRIXHT,TAUXTVA,DATEAJOUT,QUANTITEENSTOCK,NOMIMAGE,produit.NOPRODUIT,DISPONIBLE,NOMTAILLE
FROM produit,taille,disponible_taille
WHERE produit.NOPRODUIT=disponible_taille.NOPRODUIT
AND taille.NOTAILLE=disponible_taille.NOTAILLE
And produit.NOPRODUIT=".$NoProduit."";
 $query=$this->db->query($requete);
return $query->row_array();
}
public function RetournerLesTaillesproduit($NoProduit)
{
 $requete="select NOMTAILLE
FROM produit,taille,disponible_taille
WHERE produit.NOPRODUIT=disponible_taille.NOPRODUIT
AND disponible_taille.NOTAILLE=taille.NOTAILLE
And produit.NOPRODUIT=".$NoProduit."";
$query=$this->db->query($requete);
return $query->result_array();
}
public function NombreDeProduit($Nomproduit=FALSE)
{
    if($Nomproduit===false)
    {
    return $this->db->count_all("produit"); 
    }
   $this->db->from('produit');
   $this->db->like('LIBELLE ',$Nomproduit);
   $requete=$this->db->count_all_results();
   return $requete;
}

public function RetournerRecherchelimite($nombreDeLignesARetourner, $noPremiereLigneARetourner,$Recherche)
{
$this->db->limit($nombreDeLignesARetourner,$noPremiereLigneARetourner);
$this->db->select('*');
$this->db->from('produit');
$this->db->like('LIBELLE',$Recherche);
$query=$this->db->get();
if ($query->num_rows() > 0) { // si nombre de lignes > 0
    foreach ($query->result() as $ligne) {
        $jeuDEnregsitrements[] = $ligne;
    }
    return $jeuDEnregsitrements;
}
return false;
}
public function retournerProduitLimite($nombreDeLignesARetourner, $noPremiereLigneARetourner)
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

public function ModifierunProduit($DonnesaModifier,$pNoproduit)
{
$this->db->where('NOPRODUIT', $pNoproduit);
$this->db->update('produit',$DonnesaModifier);
}

}
/* End of file ModelName.php */
