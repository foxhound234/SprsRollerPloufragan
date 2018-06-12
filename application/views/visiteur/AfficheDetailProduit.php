<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class='container'>
<?php
echo '<h2>'.$LeProduit['LIBELLE'].'</h2>';

echo '<p>'.img($LeProduit['NOMIMAGE']).'</p>';

 echo '<p>'.$LeProduit['DETAIL'].'</p>';

 if($LeProduit['QUANTITEENSTOCK']<=0 or $LeProduit['DISPONIBLE']==0)
 {
  echo '<h2> le produit est indisponible </h2>';
 }
 else
 {
   echo form_open('Visiteur\AjouterLePanier/'.$LeProduit['NOPRODUIT']);

   echo form_submit('btnajouter', 'ajouter').'<BR>';
   echo form_close();

 }
  ?>
</div>
</body>
</html>