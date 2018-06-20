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
    $Nom=$this->session->identifiant;
    $Prixtotal=$this->cart->total();
    $Email=$this->session->Email;
    $msg = "Boujour Votre Commande sera traités:";
    $this->email->from('Morganlb347@gmail.com');
    $this->email->to($Email);
    $this->email->subject('Merci pour la commande:');
    foreach ($this->cart->contents() as $Unproduit)
{
    $Prix=$Unproduit['price'];
    $Nom=$Unproduit['name'];
    $msg .='Nom du produit:';
    $msg .=$Nom;
    $msg .='</BR>';
    $msg .='prix:';
    $msg .=$Prix;
    $msg .='€';
    $msg .='</BR>';
};
$msg .='prix total:';
$msg .=$Prixtotal;
$msg .='€';
    $this->email->message($msg);
    if($this->email->send()){
        $this->cart->destroy();
        $this->load->view('templates/Entete');
        $this->load->view('visiteur/InsertionReussie'); 
        $this->load->view('templates/PiedDePage',$DonneesInjectees);
      }
      else{
         $this->email->print_debugger();
      }       
   }
   else
   {
    $this->load->view('templates/Entete');
    $this->load->view('visiteur/AffichageduPanier'); 
    $this->load->view('templates/PiedDePage',$DonneesInjectees);
   }  
 }
}

/* End of file Controllername.php */
