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
<br/>
<div class='container'>
<?php
echo form_open('Visiteur/Connexion');
echo "<div class='input-group'>";
echo "<span class='input-group-addon'><i class='glyphicon glyphicon-user'></i></span>";
echo form_input(array('name'=>'txtEmail', 'value'=>'','class'=>'form-control','placeholder'=>'Email','type'=>'email'));
echo "</div>";
echo "<div class='input-group'>";
echo "<span class='input-group-addon'><i class='glyphicon glyphicon-lock'></i></span>";
echo form_password(array('name'=>'txtMdp', 'value'=>'','class'=>'form-control','placeholder'=>'Mot De Passe','title'=>'six caractère ou plus'));
echo "</div>";
echo form_submit('BtnConnexion', 'connexion');
echo form_close();
?>
</div>
</body>
</html>