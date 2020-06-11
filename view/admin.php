
<?php $titre = 'Administrateur';

?>
            
         
<div id='container' class="container inter_admin">

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
            <div id="l_question" class="l question"><a href="">Liste Questions<img alt="" src="./publics/images/ic-liste.png"/></a> </div>
            <div id="creeradmin" class="l creerAdmin"><a href="">Créer Admin<img alt="" src="./publics/images/ic-ajout.png"/></a></div>
            <div id="l_joueurs" class="l joueurs" ><a href="">Listes joueurs<img alt="" src="./publics/images/ic-liste.png"/></a></div>
            <div id="creerquest" class="l creerquestions"><a href="">Créer Questions <img alt="" src="./publics/images/ic-ajout.png"/></a></div>
            <div id="tableaudebord" class="l tableaudebord"><a href="">Tableau de Bord <img alt="" src="./publics/images/ic-liste.png"/></a></div> 
        </div>
    </div>
    <div class="zone_affichage col-12 col-sm-8 col-md-8 " id="affichage">  
        <div class="row">
         <div class="col" id="charger">
           
          </div>
        </div>
    </div>
 </div>
 
</div>
<script>
    
</script>