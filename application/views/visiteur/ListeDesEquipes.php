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
<div class="table-responsive">
<table class="table table-hover">
<thead>
<tr>
 <th> Image De L'equipe </th>
 <th> Nom equipe </th>
 <th> Effectif </th>
 <th> Les Evenement </th>
</tr>
</thead>
<tbody>
<?php foreach($LesEquipes as $UneEquipe)
echo'<tr>
<td><img width="40%" src="'.img_url($UneEquipe->IMAGE).'"></td>
<td>'. $UneEquipe->NOMEQUIPE.'</td>
<td>'.anchor('Visiteur/AfficherEffectif/'.$UneEquipe->NOEQUIPE,form_submit('btnEffectif', 'Voir l effectif',array('class'=>'btn btn-primary'))).'</td>
<td>'.anchor('Visiteur/AfficherLesEvenement/'.$UneEquipe->NOEQUIPE,form_submit('btnEvenement', 'Voir les evenements',array('class'=>'btn btn-primary'))). '</td>
</tr>';
?>
</tbody>
</body>
</html>