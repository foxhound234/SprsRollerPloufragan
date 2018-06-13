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
    <script src="main.js"></script>
</head>
<body>
<div class='form-group'>
<?php
echo  form_open('Admin/AjouterUneCategorie');

echo form_input(array('name'=>'txtLibelle','value'=>'','pattern'=>'[a-zA-Z]*','required'=>'required','class'=>'form-control'));

echo form_submit(array('name'=>'BtnAjouter','value'=>'Ajouter la categorie','class'=>"btn btn-primary"));

echo form_close();
?>
</div>
</body>
</html>