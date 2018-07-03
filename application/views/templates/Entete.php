<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Sprs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo css_url('Menu')?>">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body class="black">
<div class="jumbotron container_fluid">
    <img src=<?php echo img_url('BanniereSPRS.jpg')?> width=100%>
</div>
<nav class="navbar navbar-custom headroom" id='nav'>
    <div class="navbar-header">
    <?php if(!is_null($this->session->identifiant)) : ?>
    <li class="active navbar-text"><?php echo'Utilisateur connecté : <B>'.$this->session->identifiant.'</B>&nbsp;&nbsp;';?></li>
    <li class="active  navbar-text"><a href="<?php echo site_url('Deconnexion') ?>">Se déconnecter</a>&nbsp;&nbsp;</li>
    <?php endif;?>
      </a>
     </div>
     <div class="collapse navbar-collapse" id="myNavbar">
     <?php if ($this->session->profil=='A'):?>
     <ul class="nav navbar-nav">
     <li><a href="<?php echo site_url('Accueil') ?>">Accueil</a></li>
        <li><a href="<?php echo site_url('ListedesCommandes') ?>">Commande</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Ajouter
          <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo site_url('AjouterUnjoueur') ?>">Un Joueur</a></li>
            <li><a href="<?php echo site_url('AjouterUneEquipe') ?>">Une Equipe</a></li>
            <li><a href="<?php echo site_url('AjouterUnUtilisateur') ?>">Un Utilisateur </a></li>
            <li><a href="<?php echo site_url('AjouterUnProduit') ?>">Un Produit </a></li>
            <li><a href="<?php echo site_url('AjouterUnSponsor') ?>">Un Sponsor </a></li>
            <li><a href="<?php echo site_url('AjouterUneLigue') ?>">Un Ligue </a></li>
            <li><a href="<?php echo site_url('AjouterUneTaille') ?>">Une Taille </a></li>
            <li><a href="<?php echo site_url('AjouterUnEvenement') ?>">Un Evenement </a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Modifier
          <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo site_url('AfficherLesProduit') ?>">Les Produits</a></li>
            <li><a href="<?php echo site_url('ListerLesEquipes') ?>">Les Equipes</a></li>
            <li><a href="<?php echo site_url('ListerLesSponsor') ?>">Les Sponsor </a></li>
            <li><a href="<?php echo site_url('listerLesjoueursAModifier') ?>">Les Joueurs </a></li>
          </ul>
        </li>
        <?php else:?>
<ul class="nav navbar-nav">
        <li><a href="<?php echo site_url('Accueil') ?>">Accueil</a></li>
        <li><a href="<?php echo site_url('Contact')?>">CONTACT</a></li>
        <li><a href="<?php echo site_url('ListeDesEquipes')?>">LES EQUIPES</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">CLUB
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="<?php echo site_url('Palmares') ?>">Palmares</a></li>
        <li><a href="<?php echo site_url('Histoire') ?>">Histoire</a></li>
        <li><a href="<?php echo pdf_url('organigramme') ?>">Organigramme</a></li>
        <li><a href="<?php echo pdf_url('CalendrierGeneralRinkHockey20172018') ?>">Plannings et calendriers </a></li>
        <li><a href="<?php echo pdf_url('FICHE_ADHESION_SPRS_2017_2018') ?>">Adhésions </a></li>
        <li><a href="<?php echo pdf_url('Presentation-SPRS-PLOUFRAGAN-saison-2016-2017') ?>">Présentation </a></li>
        <li><a href="<?php echo site_url('feed') ?>">Flux rss</a></li>
        <li><a href="https://www.facebook.com/SprsPloufragan/?ref=br_rs">Facebook</a></li>
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
            <li> <a href="<?php echo site_url('AfficherLesProduitVisiteur') ?>">LISTE DES PRODUITS</a></li>
            <li><a href="<?php echo site_url('AfficherLesCategories')?>">Liste Des Categorie </a></li>
          </ul>
        </li>
          <li> <a href="<?php echo site_url('AfficherLePanier') ?>"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
          <LI><?php echo form_open('RechercheEvenement');?></li>
        <li> <?php  echo form_input(array('name'=>'txtRecherche', 'value'=>'','placeholder'=>'Evenement','pattern'=>'[a-zA-Z\s]+','class'=>'navbar form'));?>
             <li> <?php echo form_submit(array('name'=>'BtnRecherche','value'=>'Recherché','class'=>'navbar form btn btn-primary ','data-icon'=>'search'));?></li>
            <?php echo form_close();?></li>
     <?php endif;?>
     <?php if($this->session->profil==null):?>
   <li><a href="<?php echo site_url('Connexion') ?>">Connexion</a></li>
    <li><a href="<?php echo site_url('CreerUnCompte') ?>">Enregistrement</a></li>
    <?php else:?>
    <li><a href="<?php echo site_url('ModifierProfil') ?>">Modifier le Profil</a></li>
    <?php endif;?>
    </ul>
    </div>
</nav>
</body>
</html>