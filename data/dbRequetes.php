
<?php  
// Nouvelle fonction qui nous permet d'éviter de répéter du code

/* require_once('traitement/fonction.php'); */

 require_once('../dbConn/dbConnexion.php'); 
 require_once('fonction.php'); 
 $_SESSION['url']= getUrl();
 $chemin=$_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI'];
 $_SESSION['chemin']=$chemin; 
 
 global $conn;
 //echo json_encode( $_POST['statut']);
 
//  $prepUser = getPrepIns('scoreuser'); 
//  foreach ($_POST as $usr) {
//   //$imgs = array_pop($usr);
//   $id_user=setReq($conn,$prepUser,$usr); 
  
//  }
//   echo json_encode($id_user);
  //echo $statut;
  
  $statut = 0;
if(isset($_POST['statut']))
{
  $statut = $_POST['statut'];
  
  if($statut == 1)
  {
    
  
    $login =$_POST['login'];
    $pwd = $_POST['pwd'];
        $requete = 'SELECT * FROM `donuser` WHERE login =:login AND password1 =:pwd';

        $reponse = $conn->prepare($requete);
        $reponse-> execute(array('login'=>$login, 'pwd'=>$pwd));
        $reponse = $reponse->fetch(2);

         echo json_encode($reponse);
  
        if($reponse)
        {
          unset( $_SESSION['connec']);
          $_SESSION['connec']= $_POST;
        }
  }

  //subscribe page and data
  if($statut == 2)
  {
        $prenom =$_POST['prenom'];
        $nom =$_POST['nom'];
        $login =$_POST['login'];
        $password1 = $_POST['pwd'];
        $password2 = $_POST['cfpwd'];
        $role = $_POST['role'];
        $avatar = $_FILES['avatar'];
        $imag ='';
       // echo json_encode($avatar);
        if(isset($avatar)){ 
    
              $info = getimagesize($avatar['tmp_name']); 
              
              if(($info['mime'] =='image/jpeg') || ($info['mime'] =='image/png'))
              {
                
                  $type=explode("/", $avatar['type']);  
                  if($avatar['error']===0){
                      $new="../publics/images/load/";
                      $imag =  getPath($login, $info['mime']);

                      if(move_uploaded_file($avatar['tmp_name'],$new.$imag)){ //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
                        $status = 1;
                        echo json_encode($status);
                      }
    
                  }  
                 // echo json_encode( $imag)  ; 
              }      
        }
  
    $tesLogin = 'SELECT `login` FROM `donneesuser` WHERE login =:login';

        $_login = $conn->prepare( $tesLogin);
        $_login-> execute(array('login'=>$login));
        $_login = $_login->fetch(2);

        if($_login == 0)
        {

              //Insertion des donnees du nouveau inscrit dans la tables donneesuser

              $r_insert = $conn->prepare("INSERT INTO donneesuser(nom, prenom, login, password1, password2, role, image) 
                                         VALUES (:nom, :prenom, :login, :password1, :password2,:role, :imag)");
                                
              $r_insert->execute(array(
                                  ':nom' => $nom,
                                  ':prenom' => $prenom,
                                  ':login' => $login,
                                  ':password1' => $password1,
                                  ':password2' => $password2,
                                  ':role' => $role,
                                  ':imag' => $imag));
        
             if($r_insert)
             {
               unset( $_SESSION['connect']);
               $_SESSION['connect']= $_POST;
              // echo json_encode($r_insert);
             }
             
        }
  }

  //requete admin
  if($statut == 3)
  { 
    
        $offset =$_POST['offset'];
        $limit =$_POST['limit'];
      
        $sql = "
        SELECT *
        FROM `donneesuser`
        ORDER BY idUser DESC
        LIMIT {$limit} 
        OFFSET {$offset}
        ";
        
    
    $req = $conn->query($sql);
    $result = $req->fetch(2);

    echo json_encode($result);
  }

  if($statut == 4)
  {
        //echo json_encode($_POST);
        $quest =$_POST['quest'];
        $nb_point =$_POST['nb_point'];
        $type =$_POST['choix'];
        $reponse = $_POST['tab'];
        $choix=[];
        $exact= 0;
        $r_reponse ='';
        
        $r_insert = $conn->prepare("INSERT INTO question(libellee, score,type) 
                                 VALUES (:quest, :nb_point, :choix)");
                                
              $r_insert->execute(array(
                                  ':quest' => $quest,
                                  ':nb_point' => $nb_point,
                                  ':choix' => $type
                                ));
             $idquest = $conn->lastInsertId();
             echo json_encode($idquest);
        
        
        if($idquest > 0)
        {
            foreach($reponse as $keys =>$value)
            {
                if(isset($value))
                {
                   if(isset($_POST['rep'])){
                     $correcte = $_POST['rep'];
                    foreach($correcte as $key =>$val)
                      {
                          if($keys == $key){
                            $exact = 1;
                          }
                      }
                  }
                    $r_reponse = $conn->prepare("INSERT INTO reponse(l_reponse, idQ, correcte) 
                                                 VALUES (:lrep, :idq, :exact)");    
                     $r_reponse->execute(array(
                      ':lrep' => $value,
                      ':idq' => $idquest,
                      ':exact' => $exact,
                    ));
                  //  $choix= array_push("$key"=>$vlaue)
                    
                }
            }
                
        }
        echo json_encode($r_reponse);
  } 

  if($statut == 5)
  {
    $nb = $_POST["nb"];
    $offset= $_POST["offset"];
    $tab= [];
   // $quest = " SELECT *FROM `question`, `reponse` ORDER BY question.idQ LIMIT 3  OFFSET {$offset} ";
    //$quest = " SELECT reponse.idQ, l_reponse, correcte FROM `reponse`,`question` where  3 =reponse.idQ";

    $r ="SELECT * FROM question,reponse WHERE question.idQ = reponse.idQ";
  
    $req = $conn->query($r);
    $tab = $req->fetch(PDO::FETCH_ASSOC);
    
    
    echo json_encode($tab);
   

     
  }
}
/*===================================================================== */
///recuparation des question et lister





if(isset($_POST["action"])) //Check value of $_POST["action"] variable value is set to not
{
  $user= 'user';
  $output=  '';
   //For Load All Data
   if($_POST["action"] == "Load") 
   {
      $limit = $_POST['limit'];
      $offset = $_POST['offset'];

      $stmt = $conn->prepare("SELECT * FROM `donuser` WHERE role=:user LIMIT :limite, :offset");
      $stmt->bindValue('user', $user, PDO::PARAM_STR);
      $stmt->bindValue('limite', $limit, PDO::PARAM_INT);
       $stmt->bindValue('offset', $offset, PDO::PARAM_INT);
      
      $stmt->execute();
      
       $result = $stmt->fetchAll(2);
       echo json_encode($result);
      if($result > 0)
      {
        foreach($result as $row)
        {
          $output .= '
          <tr class=""> 
          <td>'.$row["idUser"].'</td>
          <td>'.$row["nom"].'</td>
          <td>'.$row["prenom"].'</td>
          <td><button type="button" id="'.$row["idUser"].'" class="btn btn-warning btn-xs  text-sm mt-0 update"><span class="fa fa-binoculars"></span></button></td>
          <td><button type="button" id="'.$row["idUser"].'" class="btn btn-danger btn-xs mt-0  delete"><span class="fa fa-archive"></span></button></td>
          </tr>
          ';
        }
      }
      else
      {
        $output .= '
          <tr>
          <td align="center">Data not Found</td>
          </tr>
        ';
      }
      $output .= '</table>';
      echo $output;
   }

   if($_POST["action"] == "Select")
   {
    $output = array();
    $statement = $conn->prepare(
     "SELECT * FROM donuser
     WHERE idUser = '".$_POST["id"]."' 
     LIMIT 1"
    );
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
     $output["first_name"] = $row["nom"];
     $output["last_name"] = $row["prenom"];
    }
    echo json_encode($output);
   }
   if($_POST["action"] == "Update")
   {
      $statement = $conn->prepare(
      "UPDATE donuser 
      SET nom = :first_name, prenom= :last_name 
      WHERE idUser = :id
      "
      );
      $result = $statement->execute(
      array(
        ':first_name' => $_POST["firstName"],
        ':last_name' => $_POST["lastName"],
        ':id'   => $_POST["id"]
      )
      );
      if(!empty($result))
      {
      echo json_encode($result);
      }
    }

    if($_POST["action"] == "Delete")
    {
      $statement = $conn->prepare(
     //  "DELETE FROM donuser WHERE idUser = :id"
       "UPDATE `donuser` SET `status` =:id  WHERE `idUser` =:idu"
      );
      $result = $statement->execute(
      array(
        ':id' =>0,
        ':idu' =>$_POST["id"]
         
      )
      );
      if(!empty($result))
      {
      echo 'Data Deleted';
      }
    }

 //===============user parte===========
  //For Load All Data
  if($_POST["action"] == "score") 
  {
     $statement = $conn->prepare("SELECT * FROM `scoreuser` ORDER BY `scoreuser`.`score` DESC LIMIT 5");
     $statement->execute();
     $result = $statement->fetchAll(2);
     $output = '';

     if($statement->rowCount() > 0)
     {
       foreach($result as $row)
       {
         $output .= '
         <tr> 
         <td>'.$row["idScore"].'</td>
         <td>'.$row["nom"].'</td>
         <td>'.$row["prenom"].'</td>
         <td>'.$row["score"].'</td>
         </tr>
         ';
       }
     }
     else
     {
      echo  $output .= '
         <tr>
         <td align="center">Data not Found</td>
         </tr>
       ';
     }
     $output .= '</table>';
      echo $output;
  }
}