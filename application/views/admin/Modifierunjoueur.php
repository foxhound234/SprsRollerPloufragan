<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class='container'>
 <div class='form-group'>
<?php
  echo form_open('Admin/Modifierunjoueur/'.$LeJoueur->NOJOUEUR);

echo form_label('NOM', 'LblNom');

echo form_input(array('name'=>'txtNom', 'value'=>"".$LeJoueur->NOM."",'required'=>'required','pattern'=>'[a-zA-Z\s]+','class'=>'form-control'));

echo form_label('prenom', 'Lblprenom');

echo form_input(array('name'=>'txtPrenom', 'value'=>"".$LeJoueur->PRENOM."",'class'=>'form-control','pattern'=>'[a-zA-Z\s]+'));

echo form_label('biographie', 'LblBio');

echo form_textarea(array('name'=>'txtBio', 'value'=>"".$LeJoueur->BIOGRAPHIE."",'class'=>'form-control','pattern'=>'[a-zA-Z0-9]+'));

echo form_label('PhotoduJoueur','LblPhoto');

echo form_input(array('name'=>'txtPhoto', 'value'=>"".$LeJoueur->IMAGEJOUEUR."",'type'=>'file'));
echo '<BR>';
echo form_submit('BtnModifier', 'Modifier',array('class'=>'btn-primary'));

echo form_close();
?>
 </div>
 </div>
</body>
</html>