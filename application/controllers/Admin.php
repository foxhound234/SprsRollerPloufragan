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
         'LIBELLE'=>'txtLibelle',
         'DETAIL'=>'txtDetail',
         'PRIXHT'=>'txtPrixHT',
         'TAUXTVA'=>20,
         'NOMIMAGE'=>'txtImage',
         'QUANTITEENSTOCK'=>'txtQuantiteenstock',
         'DATEAJOUT'=>'txtDateAjout',
         'DISPONIBLE'=>'txtDispo',
         'NOCATEGORIE'=>'txtCategorie'
        );
        $this->modeleProduit->InsererUnProduit($DonnesAinserer);

       }
       else
       {
        $this->load->view('templates/Entete');
        $this->load->view('admin/AjouterUnProduit');
        $this->load->view('templates/PiedDePage');
       }
   }
   public function AfficherLesProduit()
   {
    $config=array();
    $config["base_url"] = site_url('Admin/AfficherLesProduits');
    $config["total_rows"] =$this->modeleproduit->NombreDeProduit();
    $config["per_page"] = 5;
    $config["uri_segment"] = 3; 
    $config['first_link'] = 'Premier';

    $config['last_link'] = 'Dernier';
  
    $config['next_link'] = 'Suivant';
  
    $config['prev_link'] = 'Précédent';
    
    $this->pagination->initialize($config);

    $noPage = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 $DonneesInjectees['TitreDeLaPage'] = 'Les produits';
  $DonneesInjectees["LesProduits"]=$this->modeleproduit->retournerProduitLimite($config["per_page"],$noPage);
  $DonneesInjectees["LiensPagination"]=$this->pagination->create_links();

  $this->load->view('templates/Entete');

  $this->load->view('admin/ListeDesProduits',$DonneesInjectees);

  $this->load->view('templates/PiedDePage');
   }
}

/* End of file Controllername.php */
