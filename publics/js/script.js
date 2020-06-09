var content= $('#content');
var connexion = 'view/connexion.php';
var inscription = 'view/Inscription.php';
var admin = 'view/admin.php';
var user = 'view/user.php';
var text = 'Ce champ est obligatoire';
/*========================================================= */

//verification content value function
function verifier(champ,text){
    if(champ.val() == ""){ 
        champ.after(`<span class="erreur">${text}</span>`)
        champ.css('border','1px solid red');
    }
     champ.keyup(function (e) { 
        champ.next().remove();
        champ.css('border','none' );
     });
}

//load file function
function fileLoad(target,chemin){
    target.load(chemin , function(response, status, xhr) {
        var msg= '';
        if (status == "error") 
        {
            msg = "Sorry but there was an error: ";
            target.html(msg + xhr.status + " " + xhr.statusText);
        } 
        
  
    });
}


  