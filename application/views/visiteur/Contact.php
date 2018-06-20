<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <link rel="stylesheet" href="<?php echo css_url('Accueil')?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class='container'>
<h3 class="text-center">Contact</h3>
<?php
echo form_open('Visiteur/Contact');
echo '<div class="form-group">';
echo form_input(array('name'=>'txtEmail','type'=>'email','value'=>'','class'=>'form-control','placeholder'=>'Email','required'=>'required'));
echo form_textarea(array('name'=>'txtContenu', 'value'=>'','pattern'=>'[a-zA-Z0-9]+','required'=>'required','class'=>'form-control','placeholder'=>'Contenu'));
echo form_submit('BtnContact','Contacté',array('class'=>'btn btn-primary'));
echo form_close();
echo '</div>';
?>
</div>
</body>
</html>