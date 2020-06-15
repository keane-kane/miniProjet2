
<style>
#charger{
    max-height:400px;
    height:400px;
    overflow-y: scroll;
    overflow-x: hidden;
    width: 100%;
}
     
</style>


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
        <div class="admin-avatar text-center">
            <img class="ml-0" src="<?= !empty($avatar) ? $avatar:"./publics/images/img-bg.jpg"?>" alt="">
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
    <div class="zone_affichage col-12 col-sm-8 col-md-8  " id="affichage">  
        <div class="row">
         <div class="col  " id="charger">
           
          </div>
        </div>
    </div>
 </div>
 
</div>
<script>
     
 
    $(document).ready(function(){
        $("#charger").on( 'click, #creeradmin',function (e) {

      e.preventDefault();
      alert('ok')
      if ($('#col').hasClass('col-10')) {
      //  $('#col').addClass('col-10 col-md-5 col-lg-4 mt-3 col-sm-9')')
      alert('ok')
       }
      })

    //   $('#col').attr('class ','col')
   }); 

    
     
//   });
 
//   //creer admin
 

    
    

//   });
//   //lister les joueurs modifier suprimer afficher score
//   content.on('click',"#l_joueurs", function (e) {
//       e.preventDefault();
//       fileLoad(charger,'view/Ljoueur.php'); 
          
//   });
//   content.on('click',"#tableaudebord", function (e) {
//       e.preventDefault();
//       fileLoad(charger,'view/t_deBord.php'); 

</script>