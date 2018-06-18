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
      FROM client,commande,ligne,produit 
      WHERE client.noclient=commande.NOCLIENT
      AND ligne.NOCOMMANDE=commande.NOCOMMANDE
      AND ligne.NOPRODUIT=produit.NOPRODUIT
      AND DATETRAITEMENT IS NULL
      group by ligne.NOCOMMANDE,ligne.NOPRODUIT";
      $query = $this->db->query($requete);
      return $query->result();
    }
    public function AfficheUneCommande($NOCOMMANDE)
    {
      $requete="select distinct commande.NOCOMMANDE,ligne.NOPRODUIT,NOM,PRENOM,ADRESSE,EMAIL,DATECOMMANDE,QUANTITECOMMANDEE,LIBELLE,ROUND(SUM(produit.PRIXHT*((produit.TAUXTVA/100)+1)*ligne.QUANTITECOMMANDEE))AS PRIXTTC
      FROM client,commande,ligne,produit 
      WHERE client.noclient=commande.NOCLIENT
      AND ligne.NOCOMMANDE=commande.NOCOMMANDE
      AND ligne.NOPRODUIT=produit.NOPRODUIT
      AND ligne.NOCOMMANDE=".$NOCOMMANDE."
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
}

/* End of file ModelName.php */
