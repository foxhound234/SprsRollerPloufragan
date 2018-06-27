<?php
class modeleEquipe extends CI_Model {
  public function __construct()
{
    $this->load->database();
}


    public function insererUneEquipe($pDonnesAInseres)
    {
      return $this->db->insert('equipe',$pDonnesAInseres);
    }

   public function RetournerLesEquipes()
   {
    $requete = $this->db->get('equipe');
    return $requete->result(); // retour d'un tableau associatif ici
   }
   public function RetournerUneEquipe($Noequipe=false)
   {
    $requete=$this->db->get_where('equipe',array('NOEQUIPE'=>$Noequipe));
    return $requete->row();
   }
   public function ModifierUneEquipe($Noequipe,$DonnesaModifier)
   {
    $this->db->where('NOEQUIPE', $pNoproduit);
    $this->db->update('equipe',$DonnesaModifier);
   }
   public function ListerLesJoueursAjouter($Noequipe)
   {
     $requete="select NOJOUEUR,IMAGEJOUEUR,NOM,PRENOM 
              FROM joueur,adherent 
          WHERE joueur.NOADHERENT=adherent.NOADHERENT 
              AND NOJOUEUR NOT IN(
          select joueur.NOJOUEUR
        FROM joueur,adherent,jouer
    WHERE joueur.NOADHERENT=adherent.NOADHERENT 
    AND joueur.NOJOUEUR=jouer.NOJOUEUR
    AND NOEQUIPE=".$Noequipe."
          )";
          $query = $this->db->query($requete);
          return $query->result();
   }
   public function ListerLesJoueurs()
   {
    $requete="select NOJOUEUR,IMAGEJOUEUR,NOM,PRENOM 
    FROM joueur,adherent 
WHERE joueur.NOADHERENT=adherent.NOADHERENT";
  $query=$this->db->query($requete);
  return $query->result(); 
   }
   public function AfficherJoueur($NoJoueur)
   {
    $requete="select NOJOUEUR,joueur.NOADHERENT,IMAGEJOUEUR,BIOGRAPHIE,NOM,PRENOM 
    FROM joueur,adherent 
WHERE joueur.NOADHERENT=adherent.NOADHERENT
  AND NOJOUEUR=".$NoJoueur."";
  $query = $this->db->query($requete);
return $query->row();
   }
  public function ListerLesJoueurEquipe($Noequipe)
  {
    $requete="select joueur.NOJOUEUR,IMAGEJOUEUR,NOM,PRENOM 
    FROM joueur,adherent,jouer 
WHERE joueur.NOADHERENT=adherent.NOADHERENT 
AND joueur.NOJOUEUR=jouer.NOJOUEUR
AND NOEQUIPE=".$Noequipe."";
$query = $this->db->query($requete);
return $query->result();
  }
  public function AjouterJoueurUneEquipe($pDonnesAInseres)
  {
   return $this->db->insert('jouer',$pDonnesAInseres);
  }
  public function SupprimerJoueurUneEquipe($NoJoueur,$NoEquipe)
  {
   $this->db->where('NOJOUEUR',$NoJoueur);
   $this->db->where('NOEQUIPE',$NoEquipe);
   $this->db->delete('jouer');
  }
}

/* End of file ModelName.php */
