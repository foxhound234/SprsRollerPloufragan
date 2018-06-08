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
<div class='container'>
 <div class='form-group'>
<?php
echo form_open('Admin/AjouterUneLigue');

echo form_input(array('name'=>'txtNomLigue', 'value'=>'','required'=>'required','pattern'=>'[a-zA-Z0-9]+'));

echo form_submit('BtnAjouter', 'ajouter');

echo form_close();
?>
</div>
</div>
</body>
</html>