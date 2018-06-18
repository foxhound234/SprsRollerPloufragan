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
<div class="table-responsive">
<table class="table table-hover">
<tbody>
   <thead>
   <tr>
    <th> IMAGE </th>
    <th> Modifier L'équipe </th>
    <th> Ajouter Des joueurs</th>
    <th> Supprimer Des joueurs </th>
   </tr>
  </thead>
</tbody>
<?php foreach ($LesEquipes as $UneEquipe):
 echo'<tr>
 <td><img width="50%" src="'.img_url($UneEquipe->IMAGE).'"></td>
 <td>' .anchor('Admin/ModifierUneEquipe/'.$UneEquipe->NOEQUIPE,$UneEquipe->NOMEQUIPE).'</td>
 <td>' .anchor('Admin/listerLesjoueuraAjouter/'.$UneEquipe->NOEQUIPE,'Ajouter Des joueurs').'</td>
 <td>' .anchor('Admin/listerLesjoueuraEnlever/'.$UneEquipe->NOEQUIPE,'Enlever Des joueurs').'</td>
 </tr>';
endforeach ?>
</table>
</div>
</div>
</body>
</html>