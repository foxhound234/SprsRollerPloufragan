<?php
//email.php @ application/config
defined('BASEPATH') OR exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| EMAIL CONFIGURATION
| -------------------------------------------------------------------
| 
*/
$config['useragent']    = 'CodeIgniter';
$config['protocol']     = 'smtp';
$config['smtp_host']    = 'ssl://smtp.gmail.com';
$config['smtp_user']    = 'morganlb347@gmail.com'; 
$config['smtp_pass']    = 'sexion2424'; 
$config['smtp_port']	= '465';
$config['wordwrap']     = TRUE;    
$config['wrapchars']    = 76;
$config['mailtype']     = 'html';
$config['charset']      = 'utf-8';
$config['validate']     = FALSE;
$config['priority']     = 3;
$config['newline']      = "\r\n";
$config['crlf']         = "\r\n";
?>