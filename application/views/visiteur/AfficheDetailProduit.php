<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="<?php echo css_url('Table')?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class='container'>
<?php
   echo form_open('Visiteur\AfficheLeProduit/'.$LeProduit['NOPRODUIT']);
echo '<h2>'.$LeProduit['LIBELLE'].'</h2>';
echo '<p>'.img($LeProduit['NOMIMAGE']).'</p>';
 echo '<p>'.$LeProduit['DETAIL'].'</p>';
 echo "<select name='txtNoTaille' class='form-control' id='id' required>";
 foreach ($LesTailles as $Taille) {
     echo "<option value='". $Taille['NOMTAILLE'] . "'>" . $Taille['NOMTAILLE'] . "</option>";
 }
echo "</select><br/>";

 if($LeProduit['QUANTITEENSTOCK']<=0 or $LeProduit['DISPONIBLE']==0)
 {
  echo '<h2> le produit est indisponible </h2>';
 }
 else
 {
   echo form_submit('btnajouter', 'ajouter',array('class'=>'btn btn-primary')).'<BR>';
   echo form_close();

 }
  ?>
</div>
</body>
</html>