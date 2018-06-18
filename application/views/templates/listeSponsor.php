<!DOCTYPE html>
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
<div class='container-fluid'>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
<div class="carousel-inner" role="listbox">
      <?php 
       $i=0;
        $indicators = ''; 
        foreach ($LesPartenaires as $UnPartenaire): 
             $i++;
        if($i === 1) 
        { 
            $class='active'; 
        }
        else
        {
          $class='';  
        }
        ?> 
        <?php 
            $indicators = '<li data-target="#myCarousel" data-slide-to="' . $i . '" class="' . $class . '"></li>' ;?><br> 
            <div class="item <?php echo $class; ?>"> 
            <center><a href="<?php echo $UnPartenaire->SITEWEB ?>"><img src=<?php echo img_url($UnPartenaire->IMAGE)?> width100%></a></center> 
            </div>
        <ol class="carousel-indicators"> 
            <?php $indicators; ?> 
        </ol>
        <?php endforeach;?> 
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
    </div>
    </div>
    </body>
</html>