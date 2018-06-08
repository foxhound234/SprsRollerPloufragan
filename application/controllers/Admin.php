<?php
class Admin extends CI_Controller {

    public function __construct()
    {
        // Notre modification est ICI !

        // DEUXIEME modification est ICI !

            parent::__construct();
         
    } // __construct
   public function AjouterUnProduit()
   {
       $Donnesinjectees['TitreDeLaPage']='Ajouter Un Produit';
       $Donnesinjectees['LesCategorie']=$this->ModeleCategorie->RetournerCategories();
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
        $this->ModeleProduit->InsererUnProduit($DonnesAinserer);
        redirect('Admin/AfficherLesProduits');
       }
       else
       {
        $this->load->view('templates/Entete');
        $this->load->view('admin/AjouterUnProduit',$Donnesinjectees);
        $this->load->view('templates/PiedDePage');
       }
   }
   public function AfficherLesProduit()
   {
    $config=array();
    $config["base_url"] = site_url('Admin/AfficherLesProduits');
    $config["total_rows"] =$this->ModeleProduit->NombreDeProduit();
    $config["per_page"] = 5;
    $config["uri_segment"] = 3; 
    $config['first_link'] = 'Premier';

    $config['last_link'] = 'Dernier';
  
    $config['next_link'] = 'Suivant';
  
    $config['prev_link'] = 'Précédent';
    
    $this->pagination->initialize($config);

    $noPage = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 $DonneesInjectees['TitreDeLaPage'] = 'Les produits';
  $DonneesInjectees["LesProduits"]=$this->ModeleProduit->retournerProduitLimite($config["per_page"],$noPage);
  $DonneesInjectees["LiensPagination"]=$this->pagination->create_links();

  $this->load->view('templates/Entete');

  $this->load->view('admin/ListeDesProduits',$DonneesInjectees);

  $this->load->view('templates/PiedDePage');
   }
public function AjouterUneCategorie()
{
 $Donnesinjectees['TitreDeLaPage']='Ajouter Un Produit';

if ($this->input->post('BtnAjouter'))
{
    $DonnesAinserer=array('LIBELLE'=>$this->input->post('txtLibelle'));
$this->ModeleCategorie->insererUneCategorie($DonnesAinserer);
redirect('Admin/AjouterUnProduit');
}
else
{
    $this->load->view('templates/Entete');

    $this->load->view('admin/AjouterUneCategorie',$Donnesinjectees);
  
    $this->load->view('templates/PiedDePage');

}
}
public function ModifierUnProduit($NoProduit=false)
{
$DonneesInjectees['LeProduit']=$this->ModeleProduit->retournerLeProduit($NoProduit);
$DonneesInjectees['LesCategorie']=$this->ModeleCategorie->RetournerCategories();
$DonneesInjectees['TitreDeLaPage']='Modifier un produit';
$this->load->view('templates/Entete');

$this->load->view('admin/ModifierLeProduit',$DonneesInjectees);

$this->load->view('templates/PiedDePage');
}

public function AjouterUnjoueur()
{
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
          'MOTDEPASSE'=>$this->input->post('txtMdp')
        );
     $this->ModeleAdherent->insererUnAdherent($DonnesAinserer);
    }
    else
    {



    }
}
}

/* End of file Controllername.php */
