<?php $titre = 'Utilisateur';

   
    // is_connect(); if(empty($_SESSION['user'])){header('location: index.php');}

//   $nom = $_SESSION['user']['nom'];
//   $prenom = $_SESSION['user']['prenom'];
//   $login = $_SESSION['user']['login'];
//  // $avatar  = $_SESSION['user']['image'];
?>
            
            <span class="prenom-user">user</span>
            <span class="nom-user">user</span>
        
            <?php
                echo "<a onclick=\"return confirm('Vous souhaitez quitter votre session ?');\" 
                        href='index.php?status=logout'> Deconnexion</a>"; 
            ?>
  