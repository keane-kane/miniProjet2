
<?php $titre = 'Administrateur';

?>
            
         
<div class="container inter_admin">

    <div class=" row menuheader ">
       <p class="adminquizz  text-xl-center col-9 col-xl-9 ">CR&#201;ER ET PARAM&#201;TRE VOS QUIZZ</p>
       <div class="deconadmin col-1 col-xl-2">
          <?php
              echo "<a onclick=\"return confirm('Vous souhaitez quitter votre session ?');\" 
                  href='index.php?status=logout'> Deconnexion</a>"; ?>
       </div>
    </div> 
    
    <div class="row">
    <div class="partiadmin col-10 col-sm-3 col-md-3">
        <div class="admin-avatar">
            <img src="<?= !empty($avatar) ? $avatar:"./publics/images/img-bg.jpg"?>" alt="">
            <div class="nom-prenom-Admin">
                <p class="prenomAdmin"></p>
                <p class="nomAdmin"></p>
            </div>
        </div>
        <div class="tableau-bord-Admin" >
            <div class="liste question"><a href="index.php?page=admin&menu=listequestion">Liste Questions<img src="./publics/images/ic-liste.png"/></a> </div>
            <div class="liste creerAdmin"><a href="index.php?page=admin&menu=creeradmin">Créer Admin<img src="./publics/images/ic-ajout.png"/></a></div>
            <div class="liste joueurs" ><a href="index.php?page=admin&menu=listejoueur">Listes joueurs<img src="./publics/images/ic-liste.png"/></a></div>
            <div class="liste creerquestions"><a href="index.php?page=admin&menu=creerquestion">Créer Questions <img src="./publics/images/ic-ajout.png"/></a></div>
            <div class="liste tableaudebord"><a href="index.php?page=admin&menu=tableaudebord">Tableau de Bord <img src="./publics/images/ic-liste.png"/></a></div> 
        </div>
    </div>
    <div class="zone_affichage col-12 col-sm-8 col-md-8 " id="affichage">  
        <div class="row">
         <div class="col-12">
           <?php 
             if(isset($_GET['menu']) && $_GET['menu']== 'creeradmin') 
             {
                  require('Inscription.php');
             }
           ?>
          </div>
        </div>
    </div>
 </div>
 
</div>
<script>
$(document).ready(function(e){
     alert('contentgeneral');
})     
</script>