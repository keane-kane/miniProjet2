<?php 
 $titre = 'Inscription';
?>
<div class="container">
    <div class="row  ">
        <div class="col-11 col-sm-8 col-md-6  col-lg-4 contentgeneral">
            <div class="entete">
                <p><img  src="./publics/images/fond.jpg" class="" alt=""  width="60" height="60" ></p>
                <h2 class="titre">S'inscrire</h2> 
                <hr col-7 col-sm-6 col-md-5 >
                <span id="niveau" class="text-md-center text-sm-justify">Pour tester votre niveau de culture générale</span>    
            </div>
            <form class="form" id="form-control" method="post" action="">
            
                <div class="form-group divinput">
                    <label for="">Prenom</label>
                    <input type="text" class="form-control"  id="prenom" name="prenom" value="">  
                </div>
                
                <div class="form-group divinput">
                    <label for="">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="">
                    
                </div>
                
                <div class="form-group divinput">
                    <label for="">Login</label>
                    <input type="text" class="form-control"  id="login" name="login" value=""> 
                </div>
                
                <div class="form-group divinput">
                    <label for="">Password</label>
                    <input type="password" class="form-control"   id="pwd" name="pwd" value="">
                </div>
                
                <div class="form-group divinput">
                    <label for="">Confirmer le mort de passe</label>
                    <input type="password" class="form-control"  id="cfpwd" name="cfpwd" value="">
                </div>
                
                <div class="form-group b ">
                    <label for="">Avatar</label>
                    <input type="file" class="form-control"  id="avatar" name="avatar" value="">  
                </div>
                
                <input type="submit" class="btn btn1 btn-default" id="submit_1" name="submit_1" value ="Créer un compte">
                <button  class="inscrire inscr1"  id="_login" >Dèjà un compte Login</button>

            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
</script>