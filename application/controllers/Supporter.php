<?php
class Supporter extends CI_Controller {
 public function __construct()
 {
     parent::__construct();
 }
 public function Deconnexion()
 {
    $this->session->sess_destroy();
    redirect('Visiteur/Connexion');
    
 }
 public function PasserCommande()
 {
    $DonneesInjectees['LesPartenaires']= $this->modeleSponsor->RetournerLesSponsors();
   if($this->input->post('btnAchat'))
   {
    $datetime=date("Y-m-d H:i:s");
    $DonnesDeCommande=array(
        'DATECOMMANDE'=>$datetime,
        'NOADHERENT'=>$this->session->Noadherent
    );
   $commande=$this->modeleCommande->insererUneCommande($DonnesDeCommande);
    foreach($this->cart->contents() as $Unproduit)
    {
     $DonnesDuproduit=array(
     'NOCOMMANDE'=>$commande,
     'QUANTITECOMMANDEE'=>$Unproduit['qty'],
     'NOPRODUIT'=>$Unproduit['id']
     );
     $this->modeleCommande->AjouterUneligne($DonnesDuproduit);
    }
    $this->cart->destroy();
    $this->load->view('templates/Entete');
    $this->load->view('visiteur/InsertionReussie'); 
    $this->load->view('templates/listeSponsor',$DonneesInjectees);
    $this->load->view('templates/PiedDePage');
   }
   else
   {
    $this->load->view('templates/Entete');
    $this->load->view('visiteur/AffichageduPanier'); 
    $this->load->view('templates/listeSponsor',$DonneesInjectees);
    $this->load->view('templates/PiedDePage');
   }  
 }
}

/* End of file Controllername.php */
