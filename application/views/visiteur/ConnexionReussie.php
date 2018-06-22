<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo css_url('Accueil')?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<h2>Connexion réussie !</h2>
<?php echo '<p>Bienvenue '.$this->session->identifiant.'!</p>';?>
<?php
if(!($this->session->profil==='A'))
{

 echo "<p> <a href='". site_url('Visiteur/AfficherLesProduit')."'>Retour à la liste des articles</a><p>"; 
}
else
{
echo "<p> <a href='". site_url('Admin/AfficherLesProduit')."'>Retour à la liste des produit </a><p>"; 
}
?>
<!-- ou echo anchor('visiteur/listerTousLesArticles','Retour à la liste des articles'); -->
  
</body>
</html>
