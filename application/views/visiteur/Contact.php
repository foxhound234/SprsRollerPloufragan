<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
</head>
<body>
<div class='container'>
<h3 class="text-center">Contact</h3>
<div class="row">
<?php
echo form_open('Visiteur/Contact');
echo '<div class="col-sm-6 form-group">';
echo form_input(array('name'=>'txtEmail','type'=>'email','value'=>'','class'=>'form-control','placeholder'=>'Email','required'=>'required'));
echo '</div>';
echo '<div class="col-sm-6 form-group">';
echo form_textarea(array('name'=>'txtContenu', 'value'=>'','pattern'=>'[a-zA-Z0-9]+','required'=>'required','plcaholder'=>'Contenu'));
echo '</div>';
echo form_submit('BtnContact','Contacté');
?>
</div>
</div>
</body>
</html>