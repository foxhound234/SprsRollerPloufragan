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
       'MOTDEPASSE'=>$this->input->post('txtMDP')
       );
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
        $this->session->Prenom=$UtilisateurRetourner->PRENOM;
        $this->session->Profil=$Utilisateurretourner->PROFIL;
        $this->load->view('templates/Entete');
        $this->load->view('client/connexionReussie', $DonneesInjectees);
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
}

/* End of file Controllername.php */
