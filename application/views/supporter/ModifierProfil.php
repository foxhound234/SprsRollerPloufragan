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
  <div class='container'>
  <div class='form-group'>
<?php
echo form_open('Supporter/ModifierProfil');

echo form_label('NOM', 'LblNom');

echo form_input(array('name'=>'txtNom', 'value'=>"".$Adherent->NOM."",'required'=>'required','pattern'=>'[a-zA-Z\s]+','class'=>'form-control'));

echo form_label('prenom', 'Lblprenom');

echo form_input(array('name'=>'txtPrenom','value'=>"".$Adherent->PRENOM."",'class'=>'form-control','pattern'=>'[a-zA-Z\s]+'));

echo form_label('Ville', 'LblVille');

echo form_input(array('name'=>'txtVille', 'value'=>"".$Adherent->VILLE."",'class'=>'form-control','pattern'=>'[a-zA-Z]*'));

echo form_label('Adresse', 'LblAdresse');

echo form_input(array('name'=>'txtAdresse', 'value'=>"".$Adherent->ADRESSE."",'class'=>'form-control','pattern'=>'[a-zA-Z0-9]+'));

echo form_label('CodePostal','LblCodepostal');

echo form_input(array('name'=>'txtCodepostal', 'value'=>"".$Adherent->CODEPOSTAL."",'class'=>'form-control','pattern'=>'[0-6]+'));

echo form_label('email','LblEmail');

echo form_input(array('name'=>'txtEmail', 'type'=>'email','required'=>'required','value'=>"".$Adherent->EMAIL."",'class'=>'form-control'));

echo form_label('MotDePasse', 'LblMdp');

echo form_password(array('name'=>'txtMdp', 'value'=>'','required'=>'required','value'=>"".$Adherent->MOTDEPASSE."",'pattern'=>'.{6,}','title'=>'six caractère ou plus','class'=>'form-control'));
echo '<BR>';
echo form_submit('BtnModifier','Modifier',array('class'=>'btn btn-primary'));

echo form_close();

?>
</div>
</div>
</body>
</html>