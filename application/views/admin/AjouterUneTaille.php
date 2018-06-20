<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <link rel="stylesheet" href="<?php echo css_url('Accueil')?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <div class='container'>
    <?php
   echo  form_open('Admin/AjouterUneTaille');
   echo  form_label('La Taille', 'lblTaille');
   
  echo form_input(array('name'=>'txtTaille', 'value'=>'','pattern'=>'[a-zA-Z]*','required'=>'required'));
  
  echo form_submit('BtnAjouter', 'Ajouter',array('class'=>"btn btn-primary"));
  
echo form_close();

      ?>
    </div>
</body>
</html>