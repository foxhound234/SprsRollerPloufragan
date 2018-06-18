<?php
class Admin extends CI_Controller {

    public function __construct()
    {
        // Notre modification est ICI !

        // DEUXIEME modification est ICI !

            parent::__construct();
            if(!($this->session->profil=='A'))
            {
             redirect('Visiteur/Connexion','Refresh');
            }
    } // __construct
   public function AjouterUnProduit()
   {
          $Data['LesPartenaires']= $this->modeleSponsor->RetournerLesSponsors();
       $Donnesinjectees['TitreDeLaPage']='Ajouter Un Produit';
       $Donnesinjectees['LesCategorie']=$this->modeleCategorie->RetournerCategories();
       if($this->input->post('BtnAjouter'))
       {
        $DonnesAinserer=array(
         'LIBELLE'=>$this->input->post('txtLibelle'),
         'DETAIL'=>$this->input->post('txtDetail'),
         'PRIXHT'=>$this->input->post('txtPrixHT'),
         'TAUXTVA'=>20,
         'NOMIMAGE'=>$this->input->post('txtImage'),
         'QUANTITEENSTOCK'=>$this->input->post('txtQuantiteenstock'),
         'DATEAJOUT'=>$this->input->post('txtDateAjout'),
         'DISPONIBLE'=>$this->input->post('txtDispo'),
         'NOCATEGORIE'=>$this->input->post('txtNoCategorie')
        );
        $this->modeleProduit->InsererUnProduit($DonnesAinserer);
        redirect('Admin/AfficherLesProduits');
       }
       else
       {
        $this->load->view('templates/Entete');
        $this->load->view('admin/AjouterUnProduit',$Donnesinjectees);
       $this->load->view('templates/PiedDePage',$Data);
       }
   }
   public function AfficherLesProduit()
   {
       $Data['LesPartenaires']= $this->modeleSponsor->RetournerLesSponsors();
    $config=array();
    $config["base_url"] = site_url('Admin/AfficherLesProduits');
    $config["total_rows"] =$this->modeleProduit->NombreDeProduit();
    $config["per_page"] = 5;
    $config["uri_segment"] = 3; 
    $config['first_link'] = 'Premier';

    $config['last_link'] = 'Dernier';
  
    $config['next_link'] = 'Suivant';
  
    $config['prev_link'] = 'Précédent';
    
    $this->pagination->initialize($config);

    $noPage = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 $DonneesInjectees['TitreDeLaPage'] = 'Les produits';
  $DonneesInjectees["LesProduits"]=$this->modeleProduit->retournerProduitLimite($config["per_page"],$noPage);
  $DonneesInjectees["LiensPagination"]=$this->pagination->create_links();

  $this->load->view('templates/Entete');

  $this->load->view('admin/ListeDesProduits',$DonneesInjectees);

 $this->load->view('templates/PiedDePage',$Data);
   }
public function AjouterUneCategorie()
{
 $Donnesinjectees['TitreDeLaPage']='Ajouter Un Produit';
 $Data['LesPartenaires']= $this->modeleSponsor->RetournerLesSponsors();
if ($this->input->post('BtnAjouter'))
{
    $DonnesAinserer=array('Libelle'=>$this->input->post('txtLibelle'));
    var_dump($DonnesAinserer);
$this->modeleCategorie->insererUneCategorie($DonnesAinserer);
redirect('Admin/AjouterUnProduit');
}
else
{
    $this->load->view('templates/Entete');

    $this->load->view('admin/AjouterUneCategorie',$Donnesinjectees);
  
   $this->load->view('templates/PiedDePage',$Data);

}
}
public function ModifierUnProduit($NoProduit=false)
{
$Data['LesPartenaires']= $this->modeleSponsor->RetournerLesSponsors();
$DonneesInjectees['LeProduit']=$this->modeleProduit->retournerLeProduit($NoProduit);
$DonneesInjectees['LesCategorie']=$this->modeleCategorie->RetournerCategories();
$DonneesInjectees['TitreDeLaPage']='Modifier un produit';

if($this->input->post('BtnModifier'))
{
    $DonnesAinserer=array(
        'LIBELLE'=>$this->input->post('txtLibelle'),
        'DETAIL'=>$this->input->post('txtDetail'),
        'PRIXHT'=>$this->input->post('txtPrixHT'),
        'TAUXTVA'=>20,
        'NOMIMAGE'=>$this->input->post('txtImage'),
        'QUANTITEENSTOCK'=>$this->input->post('txtQuantiteenstock'),
        'DATEAJOUT'=>$this->input->post('txtDateAjout'),
        'DISPONIBLE'=>$this->input->post('txtDispo'),
        'NOCATEGORIE'=>$this->input->post('txtNoCategorie')
       );
 $this->modeleProduit->ModifierunProduit($DonnesAinserer,$NoProduit);
 redirect('Admin/AfficherLesProduit');
}
else
{
    $this->load->view('templates/Entete');

    $this->load->view('admin/ModifierLeProduit',$DonneesInjectees);
    
    $this->load->view('templates/PiedDePage',$Data);   
}
}

public function AjouterUnjoueur()
{
       $Data['LesPartenaires']= $this->modeleSponsor->RetournerLesSponsors();
    $DonneesInjectees['TitreDeLaPage']='ajouter un joueur';
    if($this->input->post('BtnAjouter'))
    {
        $DonnesAinserer=array(
         'NOM'=>$this->input->post('txtNom'),
         'PRENOM'=>$this->input->post('txtPrenom'),
         'VILLE'=>$this->input->post('txtVille'),
         'ADRESSE'=>$this->input->post('txtAdresse'),     
          'CODEPOSTAL'=>$this->input->post('txtCodepostal'),
          'EMAIL'=>$this->input->post('txtEmail'),
          'MOTDEPASSE'=>$this->input->post('txtMdp'),
          'PROFIL'=>'J'
        );
     $NoJoueur=$this->modeleAdherent->insererUnAdherent($DonnesAinserer);
     $Donnesdujoueur=array(
        'NOADHERENT'=>$NoJoueur,
        'IMAGEJOUEUR'=>$this->input->post('txtPhoto'),
        'BIOGRAPHIE'=>$this->input->post('txtBio')
     );
     $this->modeleAdherent->insererUnJoueur($Donnesdujoueur);
     $this->load->view('templates/Entete');
    $this->load->view('admin/InsertionReussie');
   $this->load->view('templates/PiedDePage',$Data);
    }
    else
    {
        $this->load->view('templates/Entete');

        $this->load->view('admin/AjouterUnjoueur',$DonneesInjectees);
        
       $this->load->view('templates/PiedDePage',$Data);

    }
}
public function AjouterUneLigue()
{
       $Data['LesPartenaires']= $this->modeleSponsor->RetournerLesSponsors();
    $DonneesInjectees['TitreDeLaPage']='AjouterUneLigue';
    if($this->input->post('BtnAjouter'))
    {
     $DonnesAinserer=array(
         'Nomligue'=>$this->input->post('txtNomLigue')
     );
     $this->modeleLigue->insererUneLigue($DonnesAinserer);
     redirect('Admin/AjouterUneEquipe');
    }
    else
    {
        $this->load->view('templates/Entete');

        $this->load->view('admin/AjouterUneLigue',$DonneesInjectees);
        
       $this->load->view('templates/PiedDePage',$Data);
    }
}
public function AjouterUnUtilisateur()
{
       $Data['LesPartenaires']= $this->modeleSponsor->RetournerLesSponsors();
    $DonneesInjectees['TitreDeLaPage']='Ajouter Un Admin ou Un Entraineur';
    if($this->input->post('BtnAjouter'))
    {
     $DonnesAinserer=array(
     'NOM'=>$this->input->post('txtNom'),
     'PRENOM'=>$this->input->post('txtPrenom'),
     'VILLE'=>$this->input->post('txtVille'),
     'ADRESSE'=>$this->input->post('txtAdresse'),
     'CODEPOSTAL'=>$this->input->post('txtCodepostal'),
     'EMAIL'=>$this->input->post('txtEmail'),
     'MOTDEPASSE'=>$this->input->post('txtMdp'),
     'PROFIL'=>$this->input->post('txtType')
     );
     $this->modeleAdherent->insererUnAdherent($DonnesAinserer);
     $this->load->view('templates/Entete');
     $this->load->view('admin/InsertionReussie');
    $this->load->view('templates/PiedDePage',$Data);
    }
    else
    {
        $this->load->view('templates/Entete');

        $this->load->view('admin/AjouterUnUtilisateur',$DonneesInjectees);
        
        $this->load->view('templates/PiedDePage',$Data);
    }

}
public function AjouterUneEquipe()
{
       $Data['LesPartenaires']= $this->modeleSponsor->RetournerLesSponsors();
    $DonneesInjectees['TitreDeLaPage']='Ajouter une equipe';
    $DonneesInjectees['LesEntraineur']=$this->modeleAdherent->RetournerlesEntraineur();
    $DonneesInjectees['LesLigues']=$this->modeleLigue->RetournerLesLigue();

    if ($this->input->post('BtnAjouter'))
    {
        $DonnesAinserer=array(
           'NOMEQUIPE'=>$this->input->post('txtNom'),
            'IMAGE'=>$this->input->post('txtImage'),
            'NOADHERENT'=>$this->input->post('txtNoEntraineur'),
            'NOLIGUE'=>$this->input->post('txtNoLigue')
        );
        $this->modeleEquipe->insererUneEquipe($DonnesAinserer);
        $this->load->view('templates/Entete');
        $this->load->view('admin/InsertionReussie');
       $this->load->view('templates/PiedDePage',$Data);
    }
    else    
    {
        $this->load->view('templates/Entete');

        $this->load->view('admin/AjouterUneEquipe',$DonneesInjectees);
        
        $this->load->view('templates/PiedDePage',$Data);
    }
}

public function AjouterUnSponsor()
{
    $DonneesInjectees['TitreDeLaPage']='Ajouter une equipe';
       $Data['LesPartenaires']= $this->modeleSponsor->RetournerLesSponsors();

    if($this->input->post('BtnAjouter'))
     {
        $DonnesAinserer=array(
        'NOMSPONSOR'=>$this->input->post('txtNomSponso'),
        'IMAGE'=>$this->input->post('txtLogo'),
        'EMAIL'=>$this->input->post('txtEmail'),
        'SITEWEB'=>$this->input->post('txtSite')
         );
         $this->modeleSponsor->insererUnSponsor($DonnesAinserer);
         $this->load->view('templates/Entete');
         $this->load->view('admin/InsertionReussie');
        $this->load->view('templates/PiedDePage',$Data);

     }
    else
    {

        $this->load->view('templates/Entete');

        $this->load->view('admin/AjouterUnSponsor',$DonneesInjectees);
        
        $this->load->view('templates/PiedDePage',$Data);

    }




}
public function ListerLesEquipes()
{
       $Data['LesPartenaires']= $this->modeleSponsor->RetournerLesSponsors();
$DonneesInjectees['LesEquipes']=$this->modeleEquipe->RetournerLesEquipes();
$DonneesInjectees['TitreDeLaPage']='Les Equipes';

$this->load->view('templates/Entete');

$this->load->view('admin/AjouterUnSponsor',$DonneesInjectees);

$this->load->view('templates/PiedDePage',$Data);

}
public function ModifierUneEquipe($NoEquipe=FALSE)
{
       $Data['LesPartenaires']= $this->modeleSponsor->RetournerLesSponsors();
$DonneesInjectees['Equipe']=$this->modeleEquipe->RetournerUneEquipe($NoEquipe);
$DonneesInjectees['TitreDeLaPage']='Modifier Equipe';
$this->load->view('templates/Entete');

$this->load->view('admin/AjouterUnSponsor',$DonneesInjectees);

$this->load->view('templates/PiedDePage',$Data);
}
public function AjouterUneTaille()
{
       $Data['LesPartenaires']= $this->modeleSponsor->RetournerLesSponsors();
 if($this->input->post('BtnAjouter'))
 {
 $DonnesAinserer=array('NOMTAILLE'=>$this->input->post('txtTaille'));
 $this->modeleTaille->InsererUneTaille($DonnesAinserer);
 $this->load->view('templates/Entete');
 $this->load->view('admin/InsertionReussie'); 
$this->load->view('templates/PiedDePage',$Data);
 }
 else
 {
    $this->load->view('templates/Entete');
    $this->load->view('admin/AjouterUneTaille'); 
   $this->load->view('templates/PiedDePage',$Data);
 }
}
public function ListedesCommandes()
{
       $Data['LesPartenaires']= $this->modeleSponsor->RetournerLesSponsors();
 $DonneesInjectees['LesCommandes']=$this->modeleCommande->AfficherLesCommandes();
 $DonneesInjectees['Titredelapage']='Les Commandes';
 $this->load->view('templates/Entete');
 $this->load->view('admin/ListerLesCommandes',$DonneesInjectees); 
$this->load->view('templates/PiedDePage',$Data);
}
public function DetaildeLaCommande($Nocommande=null)
{
    $Data['LesPartenaires']= $this->modeleSponsor->RetournerLesSponsors();
$DonneesInjectees['LaCommande']=$this->modeleCommande->AfficheUneCommande($Nocommande);
$DonneesInjectees['Titredelapage']='La Commande';
$DonneesInjectees['PRIXTOTAL']=$this->modeleCommande->CalculPrixTotal($Nocommande);
if($this->input->post('btnTraitement'))
{
$DateTraitement=date("Y-m-d H:i:s");
$this->modeleCommande->TraitementDeLaCommande($Nocommande,$DateTraitement);
redirect('Admin/ListedesCommandes');
}
else
{
$this->load->view('templates/Entete');
$this->load->view('admin/DetailCommande',$DonneesInjectees); 
$this->load->view('templates/PiedDePage',$Data); 
}
}
}

/* End of file Controllername.php */
