<?php
class modeleEvenement extends CI_Model {
  public function __construct()
  {
      $this->load->database();
  }
  
    public function insererUnEvenement($pDonnesAInseres)
{
  $this->db->insert('evenement',$pDonnesAInseres);
  return $this->db->insert_id();
}

public function NombreEvenementEquipe($NOEQUIPE)
{
  $this->db->get_where('evenement',array('NOEQUIPE'=>$NOEQUIPE));
  $requete=$this->db->count_all_results();
  return $requete;
}
public function NombreEvenementRecherche($NomEvenement=FALSE)
{
    if($NomEvenement===false)
    {
    return $this->db->count_all("evenement"); 
    }
   $this->db->from('evenement');
   $this->db->like('NOMEVENEMENT',$NomEvenement);
   $requete=$this->db->count_all_results();
   return $requete;
}
public function retournerEvenement($NoEvenement)
{
    $requete=$this->db->get_where('evenement',array('NOEVENEMENT'=>$NoEvenement));
    return $requete->row();
}
public function retournerEvenementLimite($nombreDeLignesARetourner, $noPremiereLigneARetourner,$NOEQUIPE)
{ 	// Nota Bene : surcharge non supportée par PHP 
    $this->db->limit($nombreDeLignesARetourner, $noPremiereLigneARetourner);
    $requete = $this->db->get_where("evenement",array('NOEQUIPE'=>$NOEQUIPE));
    if ($requete->num_rows() > 0) { // si nombre de lignes > 0
        foreach ($requete->result() as $ligne) {
            $jeuDEnregsitrements[] = $ligne;
        }
        return $jeuDEnregsitrements;
    }
    return false;
} // retournerArticlesLimite


public function EvenementRecherchelimite($nombreDeLignesARetourner, $noPremiereLigneARetourner,$Recherche)
{

    $this->db->limit($nombreDeLignesARetourner,$noPremiereLigneARetourner);
    $this->db->select('*');
    $this->db->from('evenement');
    $this->db->like('NOMEVENEMENT',$Recherche);
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
