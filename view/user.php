<?php $titre = 'Utilisateur';


?>

            
         
<div id='container' class="container inter_admin">

    <div class=" row menuheader ">
    <img class="w-25 rounded-circle" src="<?= !empty($avatar) ? $avatar:"./publics/images/img-bg.jpg"?>" alt="">

       <p class="adminquizz  text-xl-center col-7 col-xl-6 ">TESTER VOTRE NIVEAU DE CONNAISSANE</p>
       <div class="deconadmin col-1 col-xl-1">
          <?php
              echo "<a onclick=\"return confirm('Vous souhaitez quitter votre session ?');\" 
                  href='index.php?status=logout'> Deconnexion</a>"; ?>
       </div>
    </div> 
    
   
    <div class="row" >
      <div  id="partiadmin" class="partiadmin col-10 col-sm-4 col-md-4" > 
         <div class="row" id="tableau" > 
            <table class="table  table-inverse table-responsive" id="users">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Score</th>
                </tr>
                </thead>
                <tbody id="bd_users">              
                </tbody>
            </table>
         </div>
        </div>
    </div>
    <div class="zone_affichage col-12 col-sm-7 col-md-7 " id="affichage">  
        <div class="row">
         <div class="col" id="charger">
           
          </div>
        </div>
    </div>
 </div>
 
</div>
<script>
 

</script>