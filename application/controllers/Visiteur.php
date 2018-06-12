<?php
class Visiteur extends CI_Controller {
     public function __construct()
     {
         parent::__construct();
         //Do your magic here
     }


     public function CreerUnCompte()
     {
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
        $this->load->view('templates/PiedDePage');
      }
     }
     public function Connexion()
     {
      if ($this->input->post('BtnConnexion'))
      {
       $DonnesDeConnexion=array(
       'EMAIL'=>$this->input->post('txtEmail'),
       'MOTDEPASSE'=>$this->input->post('txtMdp')
       );
       var_dump($DonnesDeConnexion);
       $UtilisateurRetourner=$this->modeleAdherent->RetournerAdherent($DonnesDeConnexion);
       if($UtilisateurRetourner===null)
       {       
         $this->load->view('templates/Entete');
        $this->load->view('visiteur/Connexion');
        $this->load->view('templates/PiedDePage');
       }
       else
       {
        $this->session->Email=$UtilisateurRetourner->EMAIL;
        $this->session->Noadherent=$UtilisateurRetourner->NOADHERENT;
        $this->session->identifiant=$UtilisateurRetourner->PRENOM;
        $this->session->profil=$UtilisateurRetourner->PROFIL;
        $this->load->view('templates/Entete');
        $this->load->view('client/connexionReussie');
        $this->load->view('templates/PiedDePage');
       }
      }
      else
      {
        $this->load->view('templates/Entete');
        $this->load->view('visiteur/Connexion');
        $this->load->view('templates/PiedDePage');
      }
     }
     public function AfficherLesProduit()
     {
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
  
    $this->load->view('templates/PiedDePage');
     }
  public function AfficheLeProduit($NoProduit=null)
  {
  $DonneesInjectees['LeProduit']=$this->modeleProduit->RetournerLeproduit($NoProduit);
  if($DonneesInjectees['LeProduit']== null)
  {
  show_404(); 
  }
  $this->load->view('templates/Entete');
  
  $this->load->view('Visiteur/AfficheDetailProduit',$DonneesInjectees);

  $this->load->view('templates/PiedDePage');
}
}
/* End of file Controllername.php */