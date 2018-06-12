<?php
class Supporter extends CI_Controller {
 public function __construct()
 {
     parent::__construct();
 }
 public function Deconnexion()
 {
     $this->session_destroy();
 }
}

/* End of file Controllername.php */
