<?php  
// Nouvelle fonction qui nous permet d'éviter de répéter du code

/* require_once('traitement/fonction.php'); */
 require_once('../dbConn/dbConnexion.php'); 
 
 global $conn;

 $login =$_POST['login'];
 $pwd = $_POST['pwd'];
 

    $requete = 'SELECT * FROM `donneesuser` WHERE login =:login AND password1 =:pwd';

    $reponse = $conn->prepare($requete);
    $reponse-> execute(array('login'=>$login, 'pwd'=>$pwd));
    $reponse = $reponse->fetch(2);

    echo json_encode($reponse);

  //==========================
  
  $tesLogin = 'SELECT login FROM `donneesuser`';

  $_login = $conn->query( $tesLogin);
  $_login = $_login->fetch(2);

  echo json_encode($_login);

//Insertion des donnees du nouve au inscrit dans la tables donneesuser

//    $r_insert = 'INSERT INTO donneesuser(nom, prenom, login, passorwd1, passorwd2, role, image) 
//                  VALUES(?, ?, ?, ?, ?, ?, ?, NOW())'

//   $donneesuser = $conn->prepare($r_insert);
//    $affectedLines = $donneesuser->execute(array($nom, $prenom,$login,$password1,$password2,$role, $image));
  



      
// // fonction
// function Test_login(array $data, $login){
//   foreach($data as  $value){
//       if($value === $login)
//       {
//         return true;
//       }
//   }
// }
