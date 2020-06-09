<?php 
  session_start();
 /* unset( $_SESSION['page']);
  require_once "./src/partials/_utiles.php";
  $_SESSION['url']= getUrl();
  
  $chemin=$_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI'];
  $_SESSION['chemin']=$chemin; 

  //affiche_tab($_SERVER);*/
 
?>

    <div id="div">
    </div>
<?php

//require_once('view/connexion.php');

// require_once('view/template.php');

    //connection de l'utilisateur
    $(document).ready(function () {
      $("#submit").on('click', function () {
          const login = $("#login").val();
          const pwd = $("#pwd").val();
          console.log(pwd);
          if (login == "" || pwd == "") {
              alert("veuillez remplir les champs!!");
          } else {
              $.ajax(
                  {
                      url: 'index.php',
                      method: 'POST',
                      data: {
                          connexion: 1,
                          login: login,
                          password: password
                      },
                      success: function (response) {
                          console.log(response);
                          if (response.indexOf('success') >=0) {
                              window.location = 'index.php?page=./src/pages/admin/admin'
                          }
                          
                      },
                      dataType: 'text'
                  }
              );
          }
          
      });
  });
  //to back to the login page
  content.on('click','#_login',function(e){
    fileLoad(content,connexion);
    e.preventDefault();
});
$('#form-control').submit(function(e) {
    e.preventDefault();
    const prenom = $('#prenom').val();
    var nom = $('#nom').val();
    var login = $('#login').val();
    var pwd = $('#pwd').val();
    var cfpwd = $('#cfpwd').val();
    var avatar= $('#avatar').val();
    
    $(".erreur").remove();

    if (prenom.length < 1) {
      $('#prenom').after('<span class="erreur">This field is required</span>');
    }
    if (nom.length < 1) {
      $('#nom').after('<span class="erreur">This field is required</span>');
    }
    if (login.length < 1) {
      $('#login').after('<span class="erreur">This field is required</span>');
    } else {
      var regEx = /^[A-Z0-9][A-Z0-9._%+-]{0,63}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/;
      var validEmail = regEx.test(email);
      if (!validEmail) {
        $('#login').after('<span class="erreur">Enter a valid email</span>');
      }
    }
    if (pwd.length < 8) {
      $('#pwd').after('<span class="erreur">Password must be at least 8 characters long</span>');
    }
    if (cfpwd !== pwd) {
      $('#cfpwd').after('<span class="erreur">Password must be at least 8 characters long</span>');
    }
  });

 
  $('form[id="form-control"]').val({
    rules: {
      prenom: 'Obligatoire',
      nom: 'obligatoire',
      login: {
        required: true,
        login: true,
      },
      pwd: {
        required: true,
        minlength: 8,
      }
    },
    messages: {
      prenom: 'Ce champ est obligatoire',
      nom: 'Ce champ est obligatoire',
      login: 'Le login existe dèjà',
      pwd: {
        minlength: 'Le mot de passe être superieur à 8 caractéres'
      }
    },
    submitHandler: function(form) {
      form.submit();
    }
});



// function fileLoa(target,chemin){
//     target.load(`view/${chemin}`, function(reponse,status,detail){
    
//       reponse.preventDefault();
//       if(status =='error'){
//            $('#content').html('<span>error</span>');
//       }
//     });
// }
$(document).on('change','#photo',function(){
    var property = document.getElementById('photo').files[0];
    var image_name = property.name;
    var image_extension = image_name.split('.').pop().toLowerCase();

    if(jQuery.inArray(image_extension,['gif','jpg','jpeg','']) == -1){
      alert("Invalid image file");
    }

    var form_data = new FormData();
    form_data.append("file",property);
    $.ajax({
      url:'upload.php',
      method:'POST',
      data:form_data,
      contentType:false,
      cache:false,
      processData:false,
      beforeSend:function(){
        $('#msg').html('Loading......');
      },
      success:function(data){
        console.log(data);
        $('#msg').html(data);
      }
    });
  });
});
</script>
const upDonneesImg = (data) =>{
    $.ajax({
        method:"POST",
        url: "./src/page/setUpdate.php",
        data:data,
        contentType:false,
        processData:false
    })
    .done(data =>{
        //console.log(data);
        const d=JSON.parse(data);
        const img=`<img class="img-thumbnail" src="${d.path}" alt="thumbnail"/>`;
        objEnCours.html(img);
    })
}
function getPath($new){
	$rep =$_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['SCRIPT_NAME']);
	$old="src/page";	
  $p= str_replace( $old, $new, $rep);
  return $p;
}

function getUrl(){
  $url = "http://".$_SERVER['HTTP_HOST'];
  $url .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
	return $url;
}

/* -------------------------------------------------------
-------------- Sauvegarder une image-----------
-------------------------------------------------------*/

  function uploadFile($file,$rep, $img_name){
    $new="asset/img/";       
    $path = getPath($new);
    $path .=$rep;
    $status = 1;
    $type=explode("/", $file['type']);        
    $image = $path.$file['name'];
    if(move_uploaded_file($file['tmp_name'], $image)){ //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
    $info = getimagesize($image);
    $mime = $info['mime'];
      foreach ($img_name as $nom => $taille){
        $new_image = $path.$nom.".".$type[1];
        rasizeImg($new_image,$image,$mime,$taille);
      }  
    }
    else{ //Sinon (la fonction renvoie FALSE).
      $status = 0;
    }
   return $status;    
  }
  if(isset($_FILES['file'])){ 
    $info = getimagesize($_FILES['file']['tmp_name']);        
    if(($info['mime'] =='image/jpeg') || ($info['mime'] =='image/png') ||($info['mime'] =='image/gif') ){
        
        $img_name= array("thumbnail"=>48,"medium"=>72,"large"=>128);
        
        $file = $_FILES['file'];
        $type=explode("/", $file['type']);  
        if($file['error']===0){
            $new="asset/img/".$_POST['id']."/";       
            $path = getPath($new);
            $data['table'] = $_POST['table'];
            $data['champ'] ="path";
            if(!is_dir($path)){
                mkdir($path,0700);
            }

            $rep =$_POST['id']."/";
            $status = uploadFile($file,$rep,$img_name);
            
            if($status != 0){
                $r=[];
                foreach ($img_name as $nom => $taille) {
                    $data['val'] =$new.$nom.".".$type[1];
                    if($nom == "thumbnail"){
                        $fichier=$data['val'];
                    }
                    $prepUser=getPrepUp($data,"user",array("type"));
                    $r['id'] =$_POST['id'];
                    $r['type'] =$nom;
                    $id_user=setReq($con,$prepUser,$r);
                }  
            }
        }        
    }else{
        $status = 0;
        $message = "Erreur de fichier";
    }   
}else{