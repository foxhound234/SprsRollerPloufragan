<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Sprs</title>
    <script src="<?php echo js_url('navbar')?>"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo css_url('Menu')?>">
    <link rel="stylesheet" href="<?php echo css_url('Accueil')?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class="black">
<nav class="navbar navbar-custom" id="navbar" >
    <div class="navbar-header">
    <?php if(!is_null($this->session->identifiant)) : ?>
    <li class="active navbar-text"><?php echo'Utilisateur connecté : <B>'.$this->session->identifiant.'</B>&nbsp;&nbsp;';?></li>
    <li class="active  navbar-text"><a href="<?php echo site_url('Supporter/Deconnexion') ?>">Se déconnecter</a>&nbsp;&nbsp;</li>
    <?php endif;?>
      </a>
     </div>
     <div class="collapse navbar-collapse" id="myNavbar">
     <?php if ($this->session->profil=='A'):?>
     <ul class="nav navbar-nav">
     <li><a href="<?php echo site_url('Visiteur/Accueil') ?>">Accueil</a></li>
        <li><a href="<?php echo site_url('Admin/ListedesCommandes') ?>">Commande</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Ajouter
          <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo site_url('Admin/AjouterUnjoueur') ?>">Un Joueur</a></li>
            <li><a href="<?php echo site_url('Admin/AjouterUneEquipe') ?>">Une Equipe</a></li>
            <li><a href="<?php echo site_url('Admin/AjouterUnUtilisateur') ?>">Un Utilisateur </a></li>
            <li><a href="<?php echo site_url('Admin/AjouterUnProduit') ?>">Un Produit </a></li>
            <li><a href="<?php echo site_url('Admin/AjouterUnSponsor') ?>">Un Sponsor </a></li>
            <li><a href="<?php echo site_url('Admin/AjouterUneLigue') ?>">Un Ligue </a></li>
            <li><a href="<?php echo site_url('Admin/AjouterUneTaille') ?>">Une Taille </a></li>
            <li><a href="<?php echo site_url('Admin/AjouterUnEvenement') ?>">Un Evenement </a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Lister
          <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo site_url('Admin/AfficherLesProduit') ?>">Les Produits</a></li>
            <li><a href="<?php echo site_url('Admin/ListerLesEquipes') ?>">Les Equipes</a></li>
            <li><a href="<?php echo site_url('Admin/ListerLesSponsor') ?>">Les Sponsor </a></li>
          </ul>
        </li>
        <?php else:?>
<ul class="nav navbar-nav">
        <li><a href="<?php echo site_url('Visiteur/Accueil') ?>">Accueil</a></li>
        <li><a href="<?php echo site_url('Visiteur/Contact')?>">CONTACT</a></li>
        <li><a href="<?php echo site_url('Visiteur/ListeDesEquipes')?>">LES EQUIPES</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">CLUB
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="<?php echo site_url('Visiteur/Palmares') ?>">Palmares</a></li>
        <li><a href="<?php echo site_url('Visiteur/Histoire') ?>">Histoire</a></li>
        <li><a href="<?php echo pdf_url('organigramme') ?>">Organigramme</a></li>
        <li><a href="<?php echo pdf_url('CalendrierGeneralRinkHockey20172018') ?>">Plannings et calendriers </a></li>
        <li><a href="<?php echo pdf_url('FICHE_ADHESION_SPRS_2017_2018') ?>">Adhésions </a></li>
        <li><a href="<?php echo pdf_url('Presentation-SPRS-PLOUFRAGAN-saison-2016-2017') ?>">Présentation </a></li>
          </ul>
        </li>
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
            <li> <a href="<?php echo site_url('Visiteur/AfficherLesProduit') ?>">LISTE DES PRODUITS</a></li>
            <li><a href="<?php echo site_url('Visiteur/AfficherLesCategories')?>">Liste Des Categorie </a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Recherche
          <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <?php echo form_open('Visiteur/RechercheEvenement'); ?>
            <li> <?php  echo form_input(array('name'=>'txtRecherche', 'value'=>'','placeholder'=>'Evenement','pattern'=>'[a-zA-Z\s]+','class'=>'form-control'))?>;
             <li> <?php echo form_submit(array('name'=>'BtnRecherche', 'value'=>'Recherché','class'=>'btn btn-primary'));?></li>
            <LI> <?php echo 
            form_close();?></LI>
          </ul>
          <li> <a href="<?php echo site_url('Visiteur/AfficherLePanier') ?>"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
     <?php endif;?>
     <?php if($this->session->profil==null):?>
   <li><a href="<?php echo site_url('Visiteur/Connexion') ?>">Connexion</a></li>
    <li><a href="<?php echo site_url('Visiteur/CreerUnCompte') ?>">Enregistrement</a></li>
    <?php else:?>
    <li><a href="<?php echo site_url('Supporter/ModifierProfil') ?>">Modifier le Profil</a></li>
    <?php endif;?>
    </ul>
    </div>
</nav>

</body>
</html>