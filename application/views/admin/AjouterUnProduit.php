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
    <?php
    echo form_open('Admin/AjouterUnProduit');
    
    echo form_label('Nom du produit','LblLibelle');

    echo form_input(array('name'=>'txtLibelle','required'=>'required','value'=>'','pattern'=>'[a-zA-Z0-9]+','title'=>'le nom du produit doit commencer par une lettre'));
    
    echo form_label('Détail du produit','Lbldetail');

    echo form_textarea(array('name'=>'txtDetail','value'=>'','required'=>'required','pattern'=>'[a-zA-Z0-9]+','title'=>'le Detail du produit doit commence par une lettre'));
    
    echo  form_label('PrixHT', 'LblPrixht');

    echo form_input(array('name'=>'txtPrixHT','value'=>'','required'=>'required','pattern'=>'.{0,}','title'=>'Le Prix ht doit etre uniquement composer de chiffre'));
    
    
    ?>
</body>
</html>