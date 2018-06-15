<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Sprs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
    <?php if(!is_null($this->session->identifiant)) : ?>
    <li class="active"><?php echo'Utilisateur connecté : <B>'.$this->session->identifiant.'</B>&nbsp;&nbsp;';?></li>
    <li class="active"><a href="<?php echo site_url('Supporter/Deconnexion') ?>">Se déconnecter</a>&nbsp;&nbsp;</li>
    <?php endif;?>
    <a href="">
    <img border="0" class="img-rounded" alt="" src="<?php echo img_url('Sprs.jpg')?>" width="100" height="100">
      </a>
     </div>
     <div class="collapse navbar-collapse" id="myNavbar">
     <?php if ($this->session->profil=='A'):?>
     <ul class="nav navbar-nav navbar-right">
        <li><a href="#myPage">HOME</a></li>
        <li><a href="#band">BAND</a></li>
        <li><a href="#tour">TOUR</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Ajouter
          <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo site_url('Admin/AjouterUnProduit') ?>">Un Joueur</a></li>
            <li><a href="<?php echo site_url('Admin/AjouterUneEquipe') ?>">Une Equipe</a></li>
            <li><a href="<?php echo site_url('Admin/AjouterUnUtilisateur') ?>">Un Utilisateur </a></li>
            <li><a href="<?php echo site_url('Admin/AjouterUnProduit') ?>">Un Produit </a></li>
            <li><a href="<?php echo site_url('Admin/AjouterUnSponsor') ?>">Un Sponsor </a></li>
            <li><a href="<?php echo site_url('Admin/AjouterUneLigue') ?>">Un Ligue </a></li>
            <li><a href="<?php echo site_url('Admin/AjouterUneTaille') ?>">Une Taille </a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Lister
          <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo site_url('Admin/AfficherLesProduit') ?>">Les Produits</a></li>
            <li><a href="<?php echo site_url('Admin/ListerLesEquipes') ?>">Les Equipes</a></li>
            <li><a href="<?php echo site_url('') ?>">Les Sponsor </a></li>
          </ul>
        </li>
    </ul> 
<?php else:?>
<ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo site_url('Visiteur/Accueil') ?>">HOME</a></li>
        <li><a href="#band">BAND</a></li>
        <li><a href="#tour">TOUR</a></li>
        <li><a href="#contact">CONTACT</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Classement
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="http://stat.ffrs.asso.fr/stats/match/classement/3635">N1 élite</a></li>
            <li><a href="http://stat.ffrs.asso.fr/stats/match/classement/3692">N3 </a></li>
            <li><a href="http://stat.ffrs.asso.fr/stats/match/classement/3723">Pré National </a></li>
            <li><a href="http://bretagne.ffroller.fr/index.php?option=com_joomleague&func=showResultsRank&p=303&Itemid=1183">moins 20 ans </a></li>
            <li><a href="http://bretagne.ffroller.fr/index.php?option=com_joomleague&func=showResultsRank&p=278&Itemid=1123">moins 18 ans </a></li>
            <li><a href="http://bretagne.ffroller.fr/index.php?option=com_joomleague&func=showResultsRank&p=298&Itemid=1172">moins 16 ans </a></li>
            <li><a href="http://bretagne.ffroller.fr/index.php?option=com_joomleague&func=showResultsRank&p=296&Itemid=1168">moins 14 ans </a></li>
          </ul>
        </li>
      <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Boutique
          <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li> <a href="<?php echo site_url('Visiteur/AfficherLesProduit') ?>">Liste Des produits</a></li>
            <li><a href="<?php echo site_url('Visiteur/AfficherLesCategories')?>">Liste Des Categorie </a></li>
          </ul>
        </li>
        <li> <a href="<?php echo site_url('Visiteur/AfficherLePanier') ?>"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
     <?php endif;?>
     <?php if($this->session->profil==null):?>
   <ul class="nav navbar-nav">
   <li><a href="<?php echo site_url('Visiteur/Connexion') ?>">Connexion</a></li>
    <li><a href="<?php echo site_url('Visiteur/CreerUnCompte') ?>">Enregistrement</a></li>
    </ul>
    <?php endif;?>
    </div>
  </div>
</nav>

</body>
</html>