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
       $Donnesinjectees['LesCategorie']=$this->modeleCategorie->RetournerCategories();
       if($this->input->post('BtnAjouter'))
       {
        
       }
       else
       {
        $this->load->view('templates/Entete');
        $this->load->view('admin/AjouterUnProduit');
        $this->load->view('templates/PiedDePage');
       }
   }
}

/* End of file Controllername.php */
