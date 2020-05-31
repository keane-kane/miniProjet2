
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link rel="stylesheet" href="styles/connexion.css">
     <title>index</title>
</head>

  <body>
    <div class="imgfond">
<!--header-->

      <div class=" plaisir">
        <p class=" navbar-brand imageH" ></p>
        <h1 class="text jouer">Le plaisir de jouer</h1>
      </div>
      <div class="background fond">

<!--fin-header-->

<!--contenaire-->
      <?php
      session_start();
       require_once('traitement/fonction.php');
             
      //  require_once('traitement/dbConnexion.php');
      
      if(isset($_GET['page'])){
        if($_GET['page']=='admin'){
            require_once('admin.php');
        }elseif($_GET['page']=='user'){
            require_once('user.php');
        }
      }else{
        if(isset($_GET['status']) && $_GET['status']==="logout"){
            deconnexion();
        }
        if(isset($_GET['lien']) && $_GET['lien']==="inscri"){
          require_once('traitement/Inscription.php');
        }else{
             require_once('connexion.php');
        }
      }
       
       

        
    
         
      
      ?>
<!--fin-contenaire-->

<!--footer-->
       <footer class="f"><h3 class="footer">ODC SA</h3></footer>
<!--fin-footer--> 
    </div>
    <script src="js/scriptjs.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
  </body>
</html>