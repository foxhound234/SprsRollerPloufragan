<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
<div>
<?php
echo form_open('Visiteur/');
echo "<div class='input-group'>";
echo "<span class='input-group-addon'><i class='glyphicon glyphicon-user'></i></span>";
echo form_input(array('name'=>'txtEmail', 'value'=>'','class'=>'form-control','type'=>'email'));
echo "</div>";
echo "<div class='input-group'>";
echo "<span class='input-group-addon'><i class='glyphicon glyphicon-lock'></i></span>";
echo form_password(array('name'=>'txtMdp', 'value'=>'','class'=>'form-control','pattern'=>'.{6,}','title'=>'six caractère ou plus'));
echo "</div>";
echo form_submit('BtnConnexion', 'connexion');
echo form_close();
?>
</div>
</div>
</body>
</html>