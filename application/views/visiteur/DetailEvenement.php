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
<div class='container text-center'>

<?php echo'<h3> <img width="25%" src="'.img_url($Evenement->NOMIMAGE).'"></H3>'?>
<?php echo '<p>'.$Evenement->DETAILEVENEMENT.'</p>'?>
<?php if($Evenement->LIEN===null):?>

<?php else:?>
<a href=<?php echo $Evenement->LIEN?>> Cliquez Pour acceder à l'article ou La Vidéo</a>
<?php endif;?>
</div>
</body>
</html>