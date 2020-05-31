<?php 


function connexion($pwd,$login, $ligne){
  
        if($login===$ligne['login'] && $pwd===$ligne['password1']){
            $_SESSION['user']= $ligne;
              if($ligne['role']==='admin'){
                  return "admin";
              } else{
                  return "user";
              }
        }
    return "error";
}

function bdRequete($conn,$requete){
    $reponse = $conn->query($requete);
    return $reponse = $reponse->fetch();
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    return $data = htmlspecialchars($data);
    
  }
  function is_connect(){
    if(isset($_SESSION['status'])){
         header('location: index.php');
    }
}
 function deconnexion(){
    unset($_SESSION['user']);
    unset($_SESSION['status']);
    session_destroy();
 }