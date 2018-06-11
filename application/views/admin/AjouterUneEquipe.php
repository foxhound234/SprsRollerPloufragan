<<!DOCTYPE html>
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
echo form_open('Admin/AjouterUneEquipe');

echo form_label('NomEquipe', 'lblequipe');

echo form_input(array('name'=>'txtNom', 'value'=>'','required'=>'required','pattern'=>'[a-zA-Z0-9]+','class'=>'form-control')).'<BR>';

echo form_label('Image de l equipe', 'LblImage').'<BR>';

echo form_input(array('name'=>'txtImage', 'value'=>'','required'=>'required','type'=>'file'));

echo form_label('Les entraineur', 'LblEntraineur');

echo "<select name='txtNoEntraineur' class='form-control' id='id' required>";
foreach ($LesEntraineur as $unEntraineur) {
    echo "<option value='". $unEntraineur['NOADHERENT'] . "'>" .$unEntraineur['NOM'] , $unEntraineur['PRENOM']."</option>";
}
echo "</select><br/>";

echo form_label('Les ligues', 'LblEntraineur');

echo "<select name='txtNoLigue' class='form-control' id='id' required>";
foreach ($LesLigues as $uneligue) {
    echo "<option value='". $uneligue['NOLIGUE'] . "'>" .$uneligue['NOMLIGUE']."</option>";
}
echo "</select><br/>";

echo form_submit('BtnAjouter','Ajouter');

echo form_close();
?>
 </div>
 </div>
</body>
</html>