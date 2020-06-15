<?php 
$titre = 'Connexion';
// var_dump($_POST);

?>

<div class="container-fluid ">
    
    <div class=" form-control div-form-con"> 
        <h2 class="login">Login Form</h2>
         <span id=error  style="display: none;">Votre login ou mot de passe et incorrecte !</span> 
        
        <form id="control-form"  method="post" action="">
            
            <div class="form-group div1 ">
                <input type="text" class="form-control"  error="error-1" placeholder="Enter login"id="login" name="login" value="<?php if(isset($_COOKIE['cookiemail'])) { echo $_COOKIE['cookiemail']; } ?>">
                <span class="erreur" id="error-1"></span>
            </div>
            <div class="form-group div2 ">
                <input type="password" class="form-control"  error="error-2" placeholder="Enter password" id="pwd" name="pwd" value="<?php if(isset($_COOKIE['cookiepass'])) { echo $_COOKIE['cookiepass']; } ?>">
                <span class="erreur" id="error-2"></span>
            </div>
            <div class="checkbox">
                <input type="checkbox" name="remember" id="remb"  <?php if(isset($_COOKIE['cookiemail']) && ($_COOKIE['cookiemail']!="")) {echo "checked";} ?>><span>Se souvenir de moi</span>
            </div>
            <input type="submit" class="btn btn-default" id="submit" name="submit" value ="Connexion">
            <button type="button" class="inscrire" id="inscri" >S'inscrire pour jouer?</button>

        </form>
    </div>
</div>
  
  
<script type="text/javascript">


</script>