<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
 <th> Nom evenement </th>
 <th> Image de L'evenement </th>
 <th> date Evenement </th>
</tr>
</thead>
<tbody>
<?php foreach ($LesEvenement as $unEvenement) :
echo'<tr>
    <td>'. $unEvenement->NOMEVENEMENT.'</td>
     <td>'.anchor('Visiteur/AfficheLeProduit/'.$unEvenement->NOEVENEMENT,'<img width="25%" src="'.img_url($unEvenement->NOMIMAGE).">")'</td>
     <td>'. $unEvenement->DATEEVENEMENT .'</td>
     </tr>';
 endforeach ?>
</tbody>
</table>
</div>
<p> pour voir un produit clique sur le nom du produit </p>
<p><?php echo $LiensPagination?></p>
</div>
</section> 
</body>
</html>