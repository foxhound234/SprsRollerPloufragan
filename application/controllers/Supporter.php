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
}

/* End of file Controllername.php */
