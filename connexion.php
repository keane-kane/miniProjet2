<?php 
$errorMes=[];
$result='';

//verification des champ et sorti des erreurs

    if(!empty($_POST['submit']) ) {
        var_dump($_POST);
        
        $login = test_input($_POST['login']);
        $pwd = test_input($_POST['pwd']);
        
        require_once('traitement/dbConnexion.php');
     
        if($login != "" && $pwd != "" ) {
            if($ligne!=null){
            $result = connexion($pwd,$login,$ligne);
           echo $result;
           }
        }else {
            $errorMes['incorrecte']= 'Tous champsles sont obligatoires';
        }
        
        if($ligne == null || $result == 'error'){
                 $errorMes['incorrecte'] = "Votre mot de passe ou identifiants est incorrectes  
                                            !<br>Si vous êtes nouveau inscrivez-vous";
        }else{
            echo 'je suis la';
              header("location: index.php?page=".$result);
              }
         
        
    }
    $conn=null;
?>

        <div class="container-fluid ">
         
            <div class=" form-control div-form-con"> 
                <h2 class="login">Login Form</h2>
                <?= isset($errorMes['incorrecte']) ? "<span class=error>".$errorMes['incorrecte']."</span>" : "" ?> 
                
                <form id="control-form"  method="post" action="">
                    <div class="form-group div2 ">
                        <input type="text" class="form-control"  error="error-1" placeholder="Enter email" name="login">
                        <span class="erreur" id="error-1"></span>
                    </div>
                    <div class="form-group div2 ">
                        <input type="password" class="form-control"  error="error-2" placeholder="Enter password" name="pwd">
                        <span class="erreur" id="error-2"></span>
                    </div>
                    <div class="checkbox">
                        <input type="checkbox" name="remember"><span>Se souvenir de moi</span>
                    </div>
                    <input type="submit" class="btn btn-default" name="submit" value ="Connexion">
                    <p class="inscrire"><a href="index.php?lien=inscri">S'inscrire pour jouer?</a></p>

                </form>
            </div>
        </div>
                
