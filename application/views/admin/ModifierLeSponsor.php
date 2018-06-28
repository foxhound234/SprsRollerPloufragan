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
<div class='container'>
     <div class='form-group'>
      <?php
     echo form_open('Admin/ModifierLeSponsor/'.$LeSponsor->NOSPONSOR);

     echo  form_label('Nom du sponsor', 'Lblsponsor');
    
     echo form_input(array('name'=>'txtNomSponso', 'value'=>"".$LeSponsor->NOMSPONSOR."",'required'=>'required','pattern'=>'[a-zA-Z0-9\s]+','class'=>'form-control'));
     echo form_label('Logo du sponsor','Lblogosponsor');
     echo form_input(array('name'=>'txtLogo', 'value'=>"".$LeSponsor->IMAGE."",'required'=>'required','type'=>'file'));
        
     echo form_label('Email','LblEmail');

     echo form_input(array('name'=>'txtEmail', 'value'=>"".$LeSponsor->EMAIL."",'required'=>'required','type'=>'email','class'=>'form-control'));

     echo form_label('Site web', 'Lblsiteweb');

     echo form_input(array('name'=>'txtSite', 'value'=>"".$LeSponsor->SITEWEB."",'pattern'=>"https?://.+",'class'=>'form-control'));
     
    echo form_submit('BtnModifier', 'Modifier');
    
    echo form_close();  
     ?>
    </div>
    </div>
</body>
</html>