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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class='container'>
 <div class='form-group'>
<?php
echo form_open('Admin/AjouterUneLigue');

echo form_input(array('name'=>'txtNomLigue', 'value'=>'','class'=>'form-control','required'=>'required','pattern'=>'[a-zA-Z0-9]+'));

echo form_submit('BtnAjouter', 'ajouter',array('class'=>"btn btn-primary"));

echo form_close();
?>
</div>
</div>
</body>
</html>