<?php 
  session_start();

  require_once "./data/fonction.php";
  $_SESSION['url']= getUrl();
  $chemin=$_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI'];
  $_SESSION['chemin']=$chemin; 
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

     <link rel="stylesheet" href="./publics/styles/admin_css.css" media="screen">
     <link rel="stylesheet" href="./publics/styles/inscription.css" media="screen">
     <link rel="stylesheet" href="./publics/styles/connexion.css" media="screen">
    
     
     <title><?= isset($titre) ? $titre : "index"  ?></title>
</head>

  <body>
    
<!--header-->

      <div class=" plaisir">
          <p class=" navbar-brand imageH" ></p>
          <h1 class="text jouer">Le plaisir de jouer</h1>
      </div>

<!--fin-header-->

<!--contenaire-->
      <div id="content">
          <?php


          require_once('view/connexion.php');

            //require_once('view/Inscription.php');
          //   require_once('view/admin.php');
           //require_once('view/user.php');
          ?>
         
      </div>
      
     

<!--fin-contenaire-->

<!--footer-->
      <footer class="f"><h3 class="footer">ODC SA</h3></footer>
<!--fin-footer--> 



      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpTHedqa4Y_YCg1cBIuUMTuckKRs8uaLg"></script>
      <!-- <script type="text/javascript" src="./asset/js/jquery.googlemap.js"></script> -->

      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

      <script src="./publics/js/route.js"></script>
      <script src="./publics/js/script.js"></script>
     

      
    </body>
</html>