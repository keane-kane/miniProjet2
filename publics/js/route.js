
$(document).ready(function(event) {
     
/*==================chargement pages connexion or inscription=============*/   



/*===================script form valid======================================*/

    $('#submit').click(function(even){
          even.preventDefault(); 
          const pwd   =  $('#pwd').val() ; 
          const login =  $('#login').val();
          const remb  =  $('#remb').val();
          
          //on vérifie que les variables ne sont pas vides
          verifier($('#pwd'));
          verifier($('#login'));
          if(pwd != "" && login != ""){ // on vérifie que les variables ne sont pas vides
                    
              $.ajax({
                  type : "POST", 
                  url : "http://localhost/miniProjet2/data/dbRequetes.php",
                  data : {pwd:pwd,login:login,remb:remb},
                  
                  success: function(reponse){
                      if(reponse){
                        
                          if (reponse.role ==admin){ fileLoad(content,admin); }
    
                          else if(reponse.role ==user) { fileLoad(content,user); }
                        }
                  },
                  error: function (reponse) {

                      if(data == false) $('#error').css('display','block');
                
                  }
                
              })
          }
       
    });
    
    /*==========================script for loadind page subscribe and validation======================== */
            
   

     $('#inscri').click(function(e){
          e.preventDefault();
          fileLoad(content,inscription);
         
         //form vlidation
         content.on('click','#submit_1',function(e){
              e.preventDefault();
              var  err = 1;
              const prenom = $('#prenom').val();
              const nom = $('#nom').val();
              const login = $('#login').val();
              const pwd = $('#pwd').val();
              const cfpwd = $('#cfpwd').val();
              const avatar= $('#avatar').val();
              
             $(".erreur").remove();

              if (prenom.length < 1)
              {
                  verifier($('#prenom'),text);  err = 0;
              }
              if (nom.length < 1) 
              {
                 verifier($('#nom'),text); err = 0;
              }
              if (login.length < 1) 
              {
                 verifier($('#login'),text); err = 0;
              } 
              if(pwd < 1)
              {
                verifier($('#pwd'),text); err = 0;
              }
              else if (pwd.length < 8) 
              {
                $('#pwd').after('<span class="erreur">Le mot de passe être superieur à 8 caractéres</span>');
                err = 0;
              }
              if(cfpwd < 1)
              {
                verifier($('#cfpwd'),text); err = 0;
              }
              else if (cfpwd !== pwd)
              {
                $('#cfpwd').after('<span class="erreur">Les mots de passe doit être identiques</span>');
                err = 0;
              }
              if (avatar == '') 
              {
                $('#avatar').after('<span class="erreur" style="top:2.2em" >Vous ne voulez pas televerser une image</span>');
              }
            
        });

    });
});



 
 


