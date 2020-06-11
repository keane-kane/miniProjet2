$(document).ready(function (event) {
  /*==================chargement pages connexion or inscription=============*/

  /*==================script login valid======================================*/

  $("#submit").click(function (even) {
    even.preventDefault();
    const pwd = $("#pwd").val();
    const login = $("#login").val();
    const remb = $("#remb").val();
    const statut = 1;
    //on vérifie que les variables ne sont pas vides
    verifier($("#pwd", text));
    verifier($("#login", text));
    if (pwd != "" && login != "") {
      // on vérifie que les variables ne sont pas vides

      $.ajax({
        type: "POST",
        url: "http://localhost/miniProjet2/data/dbRequetes.php",
        data: { pwd: pwd, login: login, remb: remb, statut: statut },
        success: function (data) {
          if (data != false) {
            console.log(data);

            if (data.role == "admin") {
              fileLoad(content, admin);
            } else if (data.role == "user") {
              fileLoad(content, user);
            }
          } else {
            $("#error").css("display", "block");
          }
        },
      });
    }
  });

  /*===================script for loadind page subscribe and validation========= */

  //  $('#inscri').click(function(e){
  //       e.preventDefault();
  //       fileLoad(content,inscription);

  //form vlidation
  content.on("click", "#submit_1", function (e) {
    e.preventDefault();
    var err = 1;
    let prenom = $("#prenom").val();
    let nom = $("#nom").val();
    let login = $("#login").val();
    let pwd = $("#pwd").val();
    let cfpwd = $("#cfpwd").val();
    //let role = $('#role').val();
    let avatar = $("#avatar").val();
    var form = $("form")[0]; // You need to use standard javascript object here
    var formData = new FormData(form);

    $(".erreur").remove();

    if (prenom.length < 1) {
      verifier($("#prenom"), text);
      err = 0;
    }
    if (nom.length < 1) {
      verifier($("#nom"), text);
      err = 0;
    }
    if (login.length < 1) {
      verifier($("#login"), text);
      err = 0;
    }
    if (pwd < 1) {
      verifier($("#pwd"), text);
      err = 0;
    } else if (pwd.length < 8) {
      $("#pwd").after(
        '<span class="erreur">Le mot de passe être superieur à 8 caractéres</span>'
      );
      err = 0;
    }
    if (cfpwd < 1) {
      verifier($("#cfpwd"), text);
      err = 0;
    } else if (cfpwd !== pwd) {
      $("#cfpwd").after(
        '<span class="erreur">Les mots de passe doit être identiques</span>'
      );
      err = 0;
    }
    if (avatar == "") {
      $("#avatar").after(
        '<span class="erreur" style="top:2.2em" >Vous ne voulez pas televerser une image</span>'
      );
    }
    // else if(jQuery.inArray(image_extension,['gif','jpg','jpeg','']) == -1){
    //   $('#avatar').after('<span class="erreur" style="top:2.2em" >Seul les fichier .jpg ou .png sont permis</span>');
    //   err = 0;
    // }
    if (err == 1) {
      // on vérifie que les variables ne sont pas vides

      $.ajax({
        type: "POST",
        url: "http://localhost/miniProjet2/data/dbRequetes.php",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
          console.log(data);
        },
      });
    }
    //   });
  });

  /*===================script for loadind menu and validation admin============== */
   
    // content.on('mouseovery',"#container", function (e) {
    //       e.preventDefault();
    //         //lister les questions
    content.on('click',"#l_question", function (e) {
        e.preventDefault();
        fileLoad(charger,'view/l_question.php'); 
        


    });
    //creer question
    content.on('click',"#creerquest", function (e) {
        e.preventDefault();
        fileLoad(charger,'view/creer_quest.php'); 
    
    });
    //creer admin
    content.on('click',"#creeradmin", function (e) {
        e.preventDefault();
        fileLoad(charger,inscription); 

       $("col").removeClass("col-11 col-sm-8 col-md-6  col-lg-4");
      

    });
    //lister les joueurs modifier suprimer afficher score
    content.on('click',"#l_joueurs", function (e) {
        e.preventDefault();
        fileLoad(charger,'view/Ljoueur.php'); 
            
    });
    content.on('click',"#tableaudebord", function (e) {
        e.preventDefault();
        fileLoad(charger,'view/t_deBord.php'); 
 
    });
    content.on('click',"#_login", function (e) {
      
        fileLoad(content,connexion); 
 
    });
    /*====================script for user page=============== */

      loadUser(); //This function will load all data on web page when page load
      function loadUser() // This function will load data from table and display under <div id="result">
      {
          var action = "score";
          $.ajax({
              url : "http://localhost/miniProjet2/data/dbRequetes.php", //Request send to "action.php page"
              method:"POST", //Using of Post method for send data
              data:{action:action}, //action variable data has been send to server
              success:function(data){
                  console.log(data);
                  $('#bd_users').html(data); //It will display data under div tag with id result
              }
          });
      }

});
