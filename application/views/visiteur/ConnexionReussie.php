<h2>Connexion réussie !</h2>
<?php echo '<p>Bienvenue '.$identifiant.'!</p>';?>
<?php
if(!($this->session->profil==='A'))
{

 echo "<p> <a href='". site_url('Visiteur/afficherlesproduits')."'>Retour à la liste des articles</a><p>"; 
}
else
{
echo "<p> <a href='". site_url('Admin/AfficherLesProduit')."'>Retour à la liste des produit </a><p>"; 
}
?>
<!-- ou echo anchor('visiteur/listerTousLesArticles','Retour à la liste des articles'); -->
