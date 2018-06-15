<?php
class Visiteur extends CI_Controller {
     public function __construct()
     {
         parent::__construct();
     }


     public function CreerUnCompte()
     {
      $Data['LesPartenaires']= $this->modeleSponsor->RetournerLesSponsors();
  
      if($this->input->post('BtnCreer'))
      {
        $DonnesAinserer=array(
        'NOM'=>$this->input->post('txtNom'),
        'PRENOM'=>$this->input->post('txtPrenom'),
        'VILLE'=>$this->input->post('txtVille'),
        'ADRESSE'=>$this->input->post('txtAdresse'),
        'CODEPOSTAL'=>$this->input->post('txtCodepostal'),
        'EMAIL'=>$this->input->post('txtEmail'),
        'MOTDEPASSE'=>$this->input->post('txtMDP'),
        'PROFIL'=>'S'
        );
        $this->modeleAdherent->insererUnAdherent($DonnesAinserer);
      }
      else
      {
        $this->load->view('templates/Entete');
        $this->load->view('visiteur/CreerUnCompte');
        $this->load->view('templates/listeSponsor',$Data);
        $this->load->view('templates/PiedDePage');
      }
     }
     public function Connexion()
     {
      $Data['LesPartenaires']= $this->modeleSponsor->RetournerLesSponsors();
  
      if ($this->input->post('BtnConnexion'))
      {
       $DonnesDeConnexion=array(
       'EMAIL'=>$this->input->post('txtEmail'),
       'MOTDEPASSE'=>$this->input->post('txtMdp')
       );
       $UtilisateurRetourner=$this->modeleAdherent->RetournerAdherent($DonnesDeConnexion);
       if($UtilisateurRetourner===null)
       {       
         $this->load->view('templates/Entete');
        $this->load->view('visiteur/Connexion');
        $this->load->view('templates/listeSponsor',$Data);
        $this->load->view('templates/PiedDePage');
       }
       else
       {
        $this->session->Email=$UtilisateurRetourner->EMAIL;
        $this->session->Noadherent=$UtilisateurRetourner->NOADHERENT;
        $this->session->identifiant=$UtilisateurRetourner->PRENOM;
        $this->session->profil=$UtilisateurRetourner->PROFIL;
        $this->load->view('templates/Entete');
        $this->load->view('Visiteur/ConnexionReussie');
        $this->load->view('templates/PiedDePage');
       }
      }
      else
      {
        $this->load->view('templates/Entete');
        $this->load->view('visiteur/Connexion');
        $this->load->view('templates/listeSponsor',$Data);
        $this->load->view('templates/PiedDePage');
      }
     }
     public function AfficherLesProduit()
     {
      $Data['LesPartenaires']= $this->modeleSponsor->RetournerLesSponsors();
  
      $config=array();
      $config["base_url"] = site_url('Visiteur/AfficherLesProduits');
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
    $this->load->view('visiteur/ListeDesProduits',$DonneesInjectees);
    $this->load->view('templates/listeSponsor',$Data);
    $this->load->view('templates/PiedDePage');
     }
  public function AfficheLeProduit($NoProduit=null)
  {
    $Data['LesPartenaires']= $this->modeleSponsor->RetournerLesSponsors();

  $DonneesInjectees['LeProduit']=$this->modeleProduit->RetournerLeproduit($NoProduit);
  $LeProduitRetournée=$this->modeleProduit->RetournerLeproduit($NoProduit);
  $Libelle=$LeProduitRetournée['LIBELLE'];
  $prixproduit=$LeProduitRetournée['PRIXHT']*(($LeProduitRetournée['TAUXTVA']/100)+1);
  if($DonneesInjectees['LeProduit']== null)
  {
  show_404(); 
  }
  if($this->input->post('btnajouter'))
  {
    $insertion=array(
      'id'=>$NoProduit,
      'qty' => 1,
      'price'=>$prixproduit,
      'name'=>$Libelle
         );
      $this->cart->insert($insertion);
      $this->load->view('templates/Entete');
      $this->load->view('visiteur/insertionReussie');
      $this->load->view('templates/listeSponsor',$Data);
      $this->load->view('templates/PiedDePage');
  }
  else
  {
    $this->load->view('templates/Entete');
  
    $this->load->view('Visiteur/AfficheDetailProduit',$DonneesInjectees);
    $this->load->view('templates/listeSponsor',$Data);
    $this->load->view('templates/PiedDePage'); 
  }
}

public function AfficherLePanier()
{
  $Data['LesPartenaires']= $this->modeleSponsor->RetournerLesSponsors();
  $this->load->view('templates/Entete');
  $this->load->view('Visiteur/AffichageduPanier');
  $this->load->view('templates/listeSponsor',$Data);
  $this->load->view('templates/PiedDePage');
}
public function ModifierLePanier()
{
  $Data['LesPartenaires']= $this->modeleSponsor->RetournerLesSponsors();
  if($this->input->post('BtnModifier'))
  {
    $total=$this->cart->total_items();
    for($i=1;$i<=$total;$i++)
    {
      $DonnesaModifier=array(
        'rowid'=>$this->input->post($i.'[rowid]'),
         'qty'=>$this->input->post($i.'[qty]')
      );
      $this->cart->update($DonnesaModifier);
    }
    $this->load->view('templates/Entete');
  
    $this->load->view('Visiteur/AffichageduPanier');
    $this->load->view('templates/listeSponsor',$Data);
    $this->load->view('templates/PiedDePage');
  }
  else
  {
  $this->load->view('templates/Entete');
  
  $this->load->view('Visiteur/AffichageduPanier');
  $this->load->view('templates/listeSponsor',$Data);
  $this->load->view('templates/PiedDePage');
  }
}
public function SupprimerUnProduitDuPanier($rowid)
{
  $Data['LesPartenaires']= $this->modeleSponsor->RetournerLesSponsors();
  $DonnesaSupprimer=array('rowid'=>$rowid);
  $this->cart->remove($DonnesaSupprimer);
  $this->load->view('templates/Entete');
  
  $this->load->view('Visiteur/AffichageduPanier');
  $this->load->view('templates/listeSponsor',$Data);
  $this->load->view('templates/PiedDePage');
}
public function RechercheProduit()
{
  if ($this->input->post('btnrecherche'))
      {
        $Recherche=$this->input->post('txtlibelle');
        
        redirect('Visiteur/AffichagedeLaRecherche/'.$Recherche);
        
      }
}
public function AffichagedeLaRecherche($Recherche=null)
{
  $Data['LesPartenaires']= $this->modeleSponsor->RetournerLesSponsors();
  if (!($Recherche==null)&& !($Recherche==""))
  {
      $config=array();
      $config["base_url"] = site_url('Visiteur/Recherchedeproduit/'.$Recherche);
      $config["total_rows"] =$this->modeleProduit->NombreDeProduit($Recherche);
      $config["per_page"] = 5;
      $config["uri_segment"] = 4; 
      $config['first_link'] = 'Premier';
  
      $config['last_link'] = 'Dernier';
    
      $config['next_link'] = 'Suivant';
    
      $config['prev_link'] = 'Précédent';

     
      $this->pagination->initialize($config);

      $noPage = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
      $DonneesInjectees['LesProduits']= $this->modeleProduit->RetournerRecherchelimite($config["per_page"],$noPage,$Recherche);
      $DonneesInjectees['Titredelapage']='résultat de la recherche';
      $DonneesInjectees['LiensPagination']=$this->pagination->create_links();
      
      $this->load->view('templates/Entete');
  
      $this->load->view('visiteur/AffichageRecherche',$DonneesInjectees);
      $this->load->view('templates/listeSponsor',$Data);
      $this->load->view('templates/PiedDePage'); 
      
  }
}
public function AfficherLesCategories()
{
$Data['LesPartenaires']= $this->modeleSponsor->RetournerLesSponsors();
$DonneesInjectees['LesCategories']=$this->modeleCategorie->RetournerCategories();
$DonneesInjectees['TitreDelapage']='Les Categorie';
$this->load->view('templates/Entete');
  
$this->load->view('visiteur/AffichageDesCategorie',$DonneesInjectees);
$this->load->view('templates/listeSponsor',$Data);
$this->load->view('templates/PiedDePage');
}
public function AfficheProduitcatego($NoCategorie=null)
{
  $config=array();
  $config["base_url"] = site_url('Visiteur/AfficheProduitcatego/'.$NoCategorie);
  $config["total_rows"] =$this->modeleCategorie->NombreDeProduitCategorie($NoCategorie);
  $config["per_page"] = 5;
  $config["uri_segment"] = 4; 
  $config['first_link'] = 'Premier';

  $config['last_link'] = 'Dernier';

  $config['next_link'] = 'Suivant';

  $config['prev_link'] = 'Précédent';
  $this->pagination->initialize($config);
  $noPage = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
  $Data['LesPartenaires']= $this->modeleSponsor->RetournerLesSponsors();
     $DonneesInjectees['LesProduits']= $this->modeleCategorie->ProduitCategorielimite($config["per_page"],$noPage,$NoCategorie);
      $DonneesInjectees['Titredelapage']='résultat de la recherche';
      $DonneesInjectees['LiensPagination']=$this->pagination->create_links();
      $this->load->view('templates/Entete');
  
      $this->load->view('visiteur/ListeDesProduitCatego',$DonneesInjectees);
      $this->load->view('templates/listeSponsor',$Data);
      $this->load->view('templates/PiedDePage'); 

}
public function Accueil()
{
  $DonneesInjectees['Titredelapage']='Accueil';
  $DonneesInjectees['LesPartenaires']= $this->modeleSponsor->RetournerLesSponsors();
  $this->load->view('templates/Entete');
  $this->load->view('visiteur/Accueil'); 
  $this->load->view('templates/listeSponsor',$DonneesInjectees);
  $this->load->view('templates/PiedDePage'); 
}
public function Contact()
{
if ($this->input->post('BtnContact'))
{
$Email=$this->input->post('txtEmail');
$Contenu=$this->input->post('txtContenu');
$this->email->to('morganlb@protonmail.com');
$this->email->subject('test');
$this->email->message($Contenu);
if (!$this->email->send()){
  var_dump($this->email->send());
  $this->email->print_debugger();
}
}
else
{
  $DonneesInjectees['LesPartenaires']= $this->modeleSponsor->RetournerLesSponsors();
  $this->load->view('templates/Entete');
  $this->load->view('visiteur/Contact'); 
  $this->load->view('templates/listeSponsor',$DonneesInjectees);
  $this->load->view('templates/PiedDePage'); 
}

}
}
/* End of file Controllername.php */