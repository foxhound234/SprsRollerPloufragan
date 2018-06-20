<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo css_url('Table')?>">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class='container'>
<?php echo form_open('Visiteur/RechercheProduit');?>
<?php echo form_input(array('name'=>'txtlibelle', 'value'=>'','class'=>'form-control','placeholder'=>'Recherché'));?>
<?php echo form_submit(array('name'=>'btnrecherche','value'=>'Recherché','class'=>'btn btn-primary'));?>
<?php echo form_close();?>
<div class="table-responsive">
<table class="table table-hover">
<thead>
<tr>
 <th> Image Du Produit </th>
 <th> Libellé </th>
 <th> prixHT </th>
 <th>quantitéenstock</th>
</tr>
</thead>
<tbody>
<?php foreach ($LesProduits as $unProduit) :
echo'<tr>
     <td><img width="25%" src="'.img_url($unProduit->NOMIMAGE).'"></td>
     <td>' .anchor('Visiteur/AfficheLeProduit/'.$unProduit->NOPRODUIT,$unProduit->LIBELLE).'</td>
     <td>'. $unProduit->PRIXHT.'</td>
     <td>'.$unProduit->QUANTITEENSTOCK.'</td>
     </tr>';
 endforeach ?>
</tbody>
</table>
</div>
<p> pour voir un produit clique sur le nom du produit </p>
<p><?php echo $LiensPagination?></p>
</div>
</body>
</html>