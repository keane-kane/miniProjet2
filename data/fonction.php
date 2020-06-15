<?php 

function getPrepIns($table){
  $prep['scoreuser']="INSERT INTO `scoreuser` (`nom`,`prenom`,`score`) VALUES (?, ?,?);";
  $prep['images']="INSERT INTO `".DB_NAME."`.`images` VALUES ( NULL,?, ?, ?);";
  return $prep[$table];	
}

function setReq($con,$prepa,$data){
  try {
      $stmt = $con->prepare($prepa);
      try {
         $a=array_values($data);
         $stmt->execute($a);
          return $con->lastInsertId();			
      } catch(PDOException $e) {
          print "Error!: " . $e->getMessage() . "</br>";
          return 0;
      }
  } catch(PDOException $e) {
      print "Error!: " . $e->getMessage() . "</br>";
      return 0;
  }	
} 

 function select($requete,$con,$cond=[]){	
  $stmt= $con->prepare($requete);
  $stmt->execute($cond); 
  $data=[];
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $data[]=$row;
  }
  return $data;
} 
function getUrl(){
    $url = "http://".$_SERVER['HTTP_HOST'];
  return  $url .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
      
  }  

  function uploadFile($file, $new){ 
    $status = 1;  
    if(move_uploaded_file($file['tmp_name'], $new)){ //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
 
    }
    else{ //Sinon (la fonction renvoie FALSE).
      $status = 0;
    }
   return $status;    
  }

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
function getPath($login,$old){
	$rep = 'image/';
    $p= str_replace( $rep,$login.".",$old);
    return $p;
}
function bdRequetes($conn,$login){
    
    $reponse = $conn->prepare($login);
    $reponse =$reponse-> execute(array($reponse));
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