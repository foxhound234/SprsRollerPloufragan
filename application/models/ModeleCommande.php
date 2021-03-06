<?php
class modeleCommande extends CI_Model {
  public function __construct()
{
    $this->load->database();
}

    public function insererUneCommande($pDonnesAInseres)
    {
      $this->db->insert('commande',$pDonnesAInseres);
      return $this->db->insert_id();
    }

      public function AjouterUneligne($pDonnesAInseres)
    {
      $this->db->insert('ligne',$pDonnesAInseres);
      return $this->db->insert_id();
    }
    public function AfficherLesCommandes()
    {
      $requete="select distinct commande.NOCOMMANDE,DATECOMMANDE
      FROM adherent,commande,ligne,produit 
      WHERE adherent.NOADHERENT=commande.NOADHERENT
      AND ligne.NOCOMMANDE=commande.NOCOMMANDE
      AND ligne.NOPRODUIT=produit.NOPRODUIT
      AND DATETRAITEMENT IS NULL
      group by ligne.NOCOMMANDE,ligne.NOPRODUIT";
      $query = $this->db->query($requete);
      return $query->result();
    }
    public function AfficheUneCommande($NOCOMMANDE)
    {
      $requete="select distinct commande.NOCOMMANDE,ligne.NOPRODUIT,NOM,PRENOM,ADRESSE,EMAIL,DATECOMMANDE,QUANTITECOMMANDEE,NOMTAILLE,LIBELLE,ROUND(SUM(produit.PRIXHT*((produit.TAUXTVA/100)+1)*ligne.QUANTITECOMMANDEE))AS PRIXTTC
      FROM adherent,commande,ligne,produit,taille,disponible_taille
      WHERE adherent.NOADHERENT=commande.NOADHERENT
      AND ligne.NOCOMMANDE=commande.NOCOMMANDE
      AND ligne.NOPRODUIT=produit.NOPRODUIT
      AND ligne.NOCOMMANDE=".$NOCOMMANDE."
      AND produit.NOPRODUIT=disponible_taille.NOPRODUIT
      AND taille.NOTAILLE=disponible_taille.NOTAILLE
      group by ligne.NOCOMMANDE,ligne.NOPRODUIT";
      $query = $this->db->query($requete);
      return $query->result();
    }
    public function CalculPrixTotal($NOCOMMANDE)
    {
      $requete="select ROUND(SUM(produit.PRIXHT*((produit.TAUXTVA/100)+1)*ligne.QUANTITECOMMANDEE))AS PRIXTTC
      FROM commande,ligne,produit 
      WHERE  ligne.NOCOMMANDE=commande.NOCOMMANDE
      AND ligne.NOPRODUIT=produit.NOPRODUIT
      and ligne.NOCOMMANDE=".$NOCOMMANDE."
      GROUP by ligne.NOCOMMANDE";
      $query = $this->db->query($requete);
      return $query->row();
    }
    public function TraitementDeLaCommande($NOCOMMANDE,$dateTraitement)
    {
      $this->db->set('DATETRAITEMENT',$dateTraitement); 
      $this->db->where('NOCOMMANDE', $NOCOMMANDE);
      $this->db->update('commande');
    }
}

/* End of file ModelName.php */
