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
<div class="container">
  <h3 class="text-center">Contact</h3>
  <p class="text-center"><em>Une Réclamation,Questions,Envoyé Un mail </em></p>
  <div class="row test">
    <div class="col-md-4">
    </div>
    <div class="col-md-8">
      <div class="row">
      <?php
        echo '<div class="col-sm-6 form-group">';
         echo form_input(array('name'=>'txtNom','id'=>'name','value'=>'','class'=>'form-control','placeholder'=>"Name",'required'=>'required'));
       echo '</div>';
        echo '<div class="col-sm-6 form-group">';
        echo  form_input(array('name'=>'txtEmail','type'=>'email','value'=>'','id'=>'email','class'=>'form-control','placeholder'=>'Email','required'=>'required'));
       echo '</div>';
      echo '</div>';
      echo form_textarea(array('class'=>"form-control",'id'=>"comments",'name'=>"txtContenu",'placeholder'=>"Contenu",'rows'=>"5"));
      echo '<div class="row">';
       echo '<div class="col-md-12 form-group">';
       echo form_submit(array('name'=>'BtnContact', 'value'=>'','class'=>'btn pull-right'));
       ?>
        </div>
      </div>
    </div>
  </div>
</div> 
<p><em>&copy; Site du Sprs by Morgan Le BERRE(Email:Morganlb@protonmail.com)</em></p>
  </div>
    </div>
    </div>
  </div>
  </div>
</body>
</html>