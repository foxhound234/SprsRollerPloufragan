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
<div class="table-responsive">

<table class="table table-hover">

<thead>
<tr>
 <th> image Du sponsor </th>
 <th> Libellé </th>
</tr>
</thead>
<tbody>
<?php foreach ($LesPartenaires as $unSponsor) :
echo'<tr>
     <td><img width="25%" src="'.img_url($unSponsor->IMAGE).'"></td>
     <td>' .anchor('Admin/ModifierLeSponsor/'.$unSponsor->NOSPONSOR,$unSponsor->NOMSPONSOR).'</td>
     </tr>';
 endforeach ?>
</tbody>
</table>
</div> 
</body>
</html>