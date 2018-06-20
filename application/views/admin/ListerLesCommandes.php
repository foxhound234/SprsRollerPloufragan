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
<th> Le numéro de la commande</th>
<th> Datedecommande</th>
</tr>
</thead>
<tbody>
<?php foreach ($LesCommandes as $LaCommande) :
echo '<tr>
<td>'.$LaCommande->NOCOMMANDE.'</td>
<td>'.$LaCommande->DATECOMMANDE.'</td> 
<td>' .anchor('Admin/DetaildeLaCommande/'.$LaCommande->NOCOMMANDE,'Voir Le Detail de la commande').'</td>
</tr>';
endforeach?>
</tbody>
</table>
</div>
</div>
</body>
</html>