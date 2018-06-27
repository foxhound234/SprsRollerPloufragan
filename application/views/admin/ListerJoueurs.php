<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <link rel="stylesheet" href="<?php echo css_url('Table')?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="table-responsive">
<table class="table table-hover">
<thead>
<tr>
 <th> image du Joueur </th>
 <th> nom du joueur </th>
 <th> Modifier </th>
</tr>
</thead>
<tbody>
<?php foreach ($LesJoueurs as $unJoueur) :
echo'<tr>
     <td><img width="25%" src="'.img_url($unJoueur->IMAGEJOUEUR).'"></td>
     <td>'.$unJoueur->NOM,$unJoueur->PRENOM.'</td>
     <td>' .anchor('Admin/Modifierunjoueur/'.$unJoueur->NOJOUEUR,form_submit('btnEvenement', 'Voir les evenements',array('class'=>'btn btn-primary'))).'</td>
     </tr>';
 endforeach ?>
</tbody>
</table>
</div> 
</body>
</html>